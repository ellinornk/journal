<?php require_once "header.php" ?>
<!--Form to create new post-->

<h3>Tell me something:</h3>
 <form class="newPostForm" action="partials/handle_new_post.php" method="post">
   <label for="title">Title</label>
   <input type="text" name="title"></br>
   <label for="content">Content</label>
   <input type="textarea" name="content" value="" class="content" placeholder="Write your heart out">
 </form>

<?php require_once footer.php ?>
