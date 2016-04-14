<?php
session_start(); 
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Login with Facebook</title>
 </head>
  <body>
       <!--  After user login  -->
  <?php if ($_SESSION['FBID']): ?>     
<div>
  <h1>Hello <?php echo $_SESSION['FULLNAME']; ?></h1>
<br>    
    Image:
<img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture">
<br>
Facebook ID: <?php echo  $_SESSION['FBID']; ?>
<br>
Name: <?php echo $_SESSION['FULLNAME']; ?>     
<br>
mail: <?php echo $_SESSION['EMAIL']; ?>
<br>    
<a href="logout.php">Logout</a>
</div>
    <?php else: ?>   
       <!-- Before login --> 
<div class="container">
<h1>Login with Facebook</h1>
           Not Connected
<div>
      <a href="fbconfig.php">Login with Facebook</a></div>
      </div>
    <?php endif ?>
  </body>
</html>
