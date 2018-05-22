<?php
require_once 'partials/session_start.php';
require_once 'partials/header.php';
?>

<?php
  if (!isset($_SESSION["loggedIn"])){ ?>
<h1>Welcome this super cool journal!</h1>

<div class="loginContainer">
<!--Log in form -->
<article class="login">
  <h3>Log in:</h3>
  <form class="loginForm" action="partials/login.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" class="inputFeild">
    <label for="password">Password:</label>
    <input type="password" name="password" class="inputFeild">
    <input type="submit" class="button" name="submit" value="Log In">
  </form>
</article>

<!--Create new user form-->
<article class="newUser">
  <h3>or create a new account:</h3>
  <form class="newUserForm" action="partials/register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" class="inputFeild">
    <label for="password">Password:</label>
    <input type="password" name="password" class="inputFeild">
    <input type="submit" name="submit" class="button" value="Create Account">
  </form>
</article>

</div> <!--end content div-->
<?php }
else { ?>
<header>
  <form action="partials/logout.php" method="get">
    <input type="submit" class="button" value="Log out">
  </form>

  <h1>Hello <?php echo $_SESSION["username"]?>!</h1>
</header>
<!--Form to create new post-->
<div class="newPostContainer">
  <article class="newPost">
    <h2>Tell your journal something:</h2>
    <form class="newPostForm" action="partials/new_post.php" method="post">
      <input type="text" name="title"  class="inputFeild" placeholder="Title"></br>
      <div class="newPostInput">
        <textarea name="content" class="content" cols="60" rows="10" placeholder="Write your heart out"></textarea>
        <input type="submit" class="button" name="post" value="Post">
      </div>
    </form>
 </article>
</div>

<h2>Your earlier posts:</h2>
<div class="PostsContainer">
  <?php
    require 'partials/get_posts.php'; //gets older posts
  }?>
</div>

<?php require_once 'partials/footer.php';?>
