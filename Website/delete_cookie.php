<?php 
session_start();

unset($_COOKIE['offer']);
unset($_COOKIE['place']);
unset($_COOKIE['range']);
setcookie("offer", "", time()-3600);
setcookie("place", "", time()-3600);
setcookie("range", "", time()-3600);

header("Location:search_list.php");        
?>
