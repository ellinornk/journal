<?php
require_once 'database.php';
require_once 'session_start.php';

header('Location: get_posts.php');

if(isset($_GET["entryID"])){
 $entryID = $_GET["entryID"];
}

$deletePost = $db->prepare(
  "DELETE FROM entries WHERE entryID = :entryID");

$deletePost->execute([
  ":entryID" => $entryID
]);

//sends user back to index
header('Location: ../index.php');

?>
