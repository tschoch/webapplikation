<?php
session_start(); 
require '../phplogin/dbconfig.php';

$offer1 = $_POST['offer1'];
$offer2 = $_POST['offer2'];
$offer3 = $_POST['offer3'];
$str    = $_POST['str'];
$nr     = $_POST['nr'];   
$plz    = $_POST['plz'];
$place  = $_POST['place'];
$fuid   = $_SESSION['FBID'];
    

$check = mysql_query("SELECT OFFER_1 FROM Users WHERE Fuid='$fuid'");
$check = mysql_num_rows($check);
if (empty($check)) {
$query = "INSERT INTO Users (Offer_1, Offer_2, Street, Offer_3, Nr, PLZ, City);
VALUES ('$offer1', '$offer2', '$str', '$offer3', '$nr', '$plz', '$place')where Fuid='$fuid'";   
mysql_query($query);
} else {
$query= "UPDATE Users SET Offer_1='$offer1', Offer_2='$offer2', Street='$str', Offer_3='$offer3', Nr='$nr', PLZ='$plz', City='$place' WHERE Fuid='$fuid'";  
mysql_query($query);    
}
             
header("Location: http://localhost/projekt_web/Website/edit.php");

?>

