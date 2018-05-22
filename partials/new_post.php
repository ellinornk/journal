<?php
require_once 'session_start.php';
require_once 'database.php';

//sends user back to index
header('Location: ../index.php');

//gets date for when post was made
$createdAt = date('Y-m-d H:i:s');

//checks which user is making the post aka which user that is logged in
$userID = $_SESSION["userID"];

$addPost = $db->prepare(
    "INSERT INTO entries (title, content, userID, createdAt) VALUES (:title, :content, :userID, :createdAt)"
);

$addPost->execute([
    ":title"     => $_POST["title"],
    ":content"   => $_POST["content"],
    ":userID"    => $userID,
    ":createdAt" => $createdAt
]);
?>

<form class="" action="partials/logout.php" method="get">
  <input type="submit" value="Log out">
</form>

<h1>Hello <?php echo $_SESSION["username"]?>!</h1>
<!--Form to create new post-->
<article class="newPost">
  <h3>Tell your journal something:</h3>
   <form class="newPostForm" action="partials/new_post.php" method="POST">
     <label for="title"></label>
     <input type="text" name="title" placeholder="Title"></br>
     <label for="content"></label>
     <textarea name="content" class="content" cols="60" rows="10" placeholder="Write your heart out"></textarea>
     <input type="submit" name="submit" value="Post">
   </form>
</article>
<?php
require 'partials/get_posts.php';
?>
