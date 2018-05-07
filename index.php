<?php require_once 'partials/header.php';?>

<?php
  if (!isset($_SESSION["loggedIn"])){ ?>
<!--Create new user form-->
<h3>Create Account:</h3>
<form class="newUserForm" action="partials/register.php" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username">
  <label for="password">Password:</label>
  <input type="password" name="password">
  <input type="submit" name="submit" value="Create Account">
</form>

<!--Log in form -->
<h3>Log In:</h3>
<form class="loginForm" action="partials/signin.php" method="post">
  <label for="username">Username:</label>
  <input type="text" name="username" value="">
  <label for="password">Password:</label>
  <input type="password" name="password" value="">
  <input type="submit" name="submit" value="Log In">
</form>

<?php  }
else {
  ?>

<input type="button" name="logout" value="Log out">
<!--Form to create new post-->
<h3>Tell the world something:</h3>
 <form class="newPostForm" action="partials/handle_new_post.php" method="post">
   <label for="title"></label>
   <input type="text" name="title" placeholder="Title"></br>
   <label for="content"></label>
   <input type="textarea" name="content" value="" class="content" placeholder="Write your heart out">
 </form>

 <!--Write out all posts -->

<?php }; ?>

<?php require_once 'partials/footer.php';?>
