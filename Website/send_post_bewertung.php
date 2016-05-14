<?php
session_start(); 
require '../phplogin/dbconfig.php';


$Ffname_dienstleister    = $_POST['anbieter_bewert_h'];
$Ffname_Kunde            = $_SESSION['FULLNAME'];
$Fuid_dienstleister      = 123456;
$Fuid_Kunde              = $_SESSION['FBID'];
$Offer                   = "angebot_1";
$bewertung               = 3;

$query = "INSERT INTO bewertung (Bewertung,Ffname_dienstleister,Ffname_Kunde,Fuid_dienstleister,Fuid_Kunde,Offer) VALUES ('$bewertung','$Ffname_dienstleister','$Ffname_Kunde','$Fuid_dienstleister','$Fuid_Kunde','$Offer')";   
mysql_query($query);




             
header("Location: search_list.php");

?>