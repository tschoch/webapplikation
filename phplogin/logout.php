<?php 
session_start();
session_destroy();
header("Location: ../Website/search_list.php");        
?>
