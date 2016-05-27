<?php 
session_start();

setcookie("offer", "", time()-3600);
setcookie("place", "", time()-3600);
setcookie("range", "", time()-3600);

header("Location:search_list.php");        
?>
