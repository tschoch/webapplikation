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
    

$check_offer1 = mysql_query("SELECT OFFER_1 FROM Users WHERE Fuid='$fuid'");
$check_offer1 = mysql_num_rows($check_offer1);
if (empty($check_offer1)) {
$query_offer1 = "INSERT INTO Users (Offer_1) VALUES ('$offer1')where Fuid='$fuid'";   
mysql_query($query_offer1);
} else {
$query_offer1= "UPDATE Users SET Offer_1='$offer1' WHERE Fuid='$fuid'";  
mysql_query($query_offer1);    
}

$check_offer2 = mysql_query("SELECT OFFER_2 FROM Users WHERE Fuid='$fuid'");
$check_offer2 = mysql_num_rows($check_offer2);
if (empty($check_offer2)) {
$query_offer2 = "INSERT INTO Users (Offer_2) VALUES ('$offer2')where Fuid='$fuid'";   
mysql_query($query_offer2);
} else {
$query_offer2= "UPDATE Users SET Offer_2='$offer2' WHERE Fuid='$fuid'";  
mysql_query($query_offer2);    
}

$check_offer3 = mysql_query("SELECT OFFER_3 FROM Users WHERE Fuid='$fuid'");
$check_offer3 = mysql_num_rows($check_offer3);
if (empty($check_offer3)) {
$query_offer3 = "INSERT INTO Users (Offer_3) VALUES ('$offer3')where Fuid='$fuid'";   
mysql_query($query_offer3);
} else {
$query_offer3= "UPDATE Users SET  Offer_3='$offer3' WHERE Fuid='$fuid'";  
mysql_query($query_offer3);    
}

$check_str = mysql_query("SELECT Street FROM Users WHERE Fuid='$fuid'");
$check_str = mysql_num_rows($check_str);
if (empty($check_str)) {
$query_str = "INSERT INTO Users (Street) VALUES ('$str')where Fuid='$fuid'";   
mysql_query($query_str);
} else {
$query_str= "UPDATE Users SET Street='$str' WHERE Fuid='$fuid'";  
mysql_query($query_str);    
}

$check_nr = mysql_query("SELECT Nr FROM Users WHERE Fuid='$fuid'");
$check_nr = mysql_num_rows($check_nr);
if (empty($check_nr)) {
$query_nr = "INSERT INTO Users (Nr) VALUES ('$nr')where Fuid='$fuid'";   
mysql_query($query_nr);
} else {
$query_nr= "UPDATE Users SET Nr='$nr' WHERE Fuid='$fuid'";  
mysql_query($query_nr);    
}

$check_plz = mysql_query("SELECT PLZ FROM Users WHERE Fuid='$fuid'");
$check_plz = mysql_num_rows($check_plz);
if (empty($check_plz)) {
$query_plz = "INSERT INTO Users (PLZ) VALUES ('$plz')where Fuid='$fuid'";   
mysql_query($query_plz);
} else {
$query_plz= "UPDATE Users SET PLZ='$plz' WHERE Fuid='$fuid'";  
mysql_query($query_plz);    
}

$check_place = mysql_query("SELECT City FROM Users WHERE Fuid='$fuid'");
$check_place = mysql_num_rows($check_place);
if (empty($check_place)) {
$query_place = "INSERT INTO Users (City) VALUES ('$place')where Fuid='$fuid'";   
mysql_query($query_place);
} else {
$query_place= "UPDATE Users SET City='$place' WHERE Fuid='$fuid'";  
mysql_query($query_place);    
}


             
header("Location: http://localhost/projekt_web/Website/edit.php");

?>

