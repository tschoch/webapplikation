<?php
session_start(); 
require '../phplogin/dbconfig.php';


$Ffname_dienstleister    = $_POST['anbieter_bewert_h'];
$Ffname_Kunde            = $_SESSION['FULLNAME'];
$Fuid_dienstleister      = $_POST['anbieter_id_bewert_h'];
$Fuid_Kunde              = $_SESSION['FBID'];
$Offer                   = "angebot_1";
$bewertung               = $_POST['range'];;


$query = "INSERT INTO bewertung (Bewertung,Ffname_dienstleister,Ffname_Kunde,Fuid_dienstleister,Fuid_Kunde,Offer) 
VALUES ('$bewertung','$Ffname_dienstleister','$Ffname_Kunde','$Fuid_dienstleister','$Fuid_Kunde','$Offer')

";   
mysql_query($query);
       
header("Location: search_list.php");

?>