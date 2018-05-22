<?php
require_once 'partials/session_start.php';
require_once 'partials/database.php';
require_once 'partials/header.php';

//checks that someone is logged in
if (!isset($_SESSION["loggedIn"])){
  header('Location: index.php');
}
else{

  if(isset($_GET["entryID"])){
    $entryID = $_GET["entryID"];
  }

  $getPosts = $db->prepare(
    "SELECT * FROM entries WHERE entryID = :entryID"
  );

  $getPosts->execute([
    ":entryID" => $entryID
  ]);

  $post = $getPosts->fetch();
  ?>

<a href="index.php" class="backButton"> <button type="button" class="button">Back</button> </a>

<div class="editContainer">
<!--from for correcting-->
<article class="editPostForm">
  <h3>Mistakes can be fixed:</h3>
   <form class="newPostForm" action="partials/edit_post.php" method="POST">
     <input type="hidden" name="entryID" value="<?=$entryID?>">     <!--sends the id to edit_post.php-->
     <label for="title">Title:</label></br>
     <input type="text" name="title" value="<?=$post["title"]?>" class="inputFeild"></br>
     <label for="content">Content:</label></br>
     <div class="newPostInput">
       <textarea name="content" class="content" cols="60" rows="10" class="inputFeild"><?=$post["content"]?></textarea>
       <input type="submit" name="update" value="Update" class="button">
     </div>
   </form>
</article>

</div> <!--end of container div-->


<?php
require_once 'partials/footer.php';
}?>
