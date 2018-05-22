<?php
require_once 'database.php';
require_once 'session_start.php';

//sends user back to index
header('Location: ../index.php');

$updatePost = $db->prepare(
  "UPDATE entries SET title = :title, content = :content WHERE entryID = :entryID"
);
$updatePost->execute([
    ":title"     => $_POST["title"],
    ":content"   => $_POST["content"],
    ":entryID"   => $_POST["entryID"]
]);

?>
