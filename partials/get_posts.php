<?php
require_once 'session_start.php';
require_once 'database.php';

$getPosts = $db->prepare(
  "SELECT * FROM entries WHERE userID = :userID ORDER BY createdAt DESC"
);
$getPosts->execute([
    "userID" => $_SESSION["userID"]
]);
$posts = $getPosts->fetchAll();

//writes out all entries posted
foreach ($posts as $post){ ?>
  <article class="post">
    <h3 class="postTitle"><?= $post["title"] ?></h3>
    <p class="postTime"><i><?=$post["createdAt"]?></i></p>
    <p class"postContent"><?= $post["content"]; ?></p>
    <!--Edit button-->
    <input type="hidden" name="createdBy" value="<?=$post["createdBy"]?>">
    <a class="editButton" href="edit_post_view.php?entryID=<?= $post["entryID"] ?>"> <button type="button" class="button">Edit</button> </a>
    <!--Delete button-->
    <a class="deleteButton" href="partials/delete_post.php?entryID=<?= $post["entryID"] ?>"> <button type="button" class="button">Delete</button> </a>
  </article>

<?php
 } //ENDS writing out all entries posted
?>
