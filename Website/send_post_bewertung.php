<?php
session_start(); 
require '../phplogin/dbconfig.php';

$Ffname_dienstleister    = $_POST['anbieter_bewert_h'];
$Ffname_Kunde            = $_SESSION['FULLNAME'];
$Fuid_dienstleister      = $_POST['anbieter_id_bewert_h'];
$Fuid_Kunde              = $_SESSION['FBID'];
$Offer                   = $_POST['offer_bewert'];
$bewertung               = $_POST['range'];

$date_check ="SELECT * FROM bewertung 
                WHERE Fuid_dienstleister   = '$Fuid_dienstleister' && 
                                Fuid_Kunde = '$Fuid_Kunde'&&
                                    Offer = '$Offer' && 
                                RatingDate > UTC_TIMESTAMP() - INTERVAL 1 WEEK";
                //NOW()
$result_date_check = mysql_query($date_check);


if($Fuid_dienstleister == $Fuid_Kunde){
    $_SESSION['own_rate_check'] = 1;
    header("Location: bewerten.php"); 
}elseif(mysql_num_rows($result_date_check) != NULL){
    $_SESSION['date_check'] = 1;
    header("Location: bewerten.php"); 
}elseif(($Offer == 'offer_bewert') && ($bewertung == NULL)){
$_SESSION['rate_offer_check'] = 1;    
$_SESSION['rate_check'] = 1;  
    $_SESSION['date_check'] = 0;
header("Location: bewerten.php");   
}elseif($bewertung == NULL){
$_SESSION['rate_check'] = 1;  
$_SESSION['rate_offer_check'] = 0; 
    $_SESSION['date_check'] = 0;
header("Location: bewerten.php");    
}elseif($Offer == 'offer_bewert'){
$_SESSION['rate_offer_check'] = 1;   
$_SESSION['rate_check'] = 0;  
    $_SESSION['date_check'] = 0;
header("Location: bewerten.php");        
}else{
    $_SESSION['rate_check'] = 0;
    $_SESSION['rate_offer_check'] = 0;  
        $_SESSION['date_check'] = 0;
    $query_bewertung = "INSERT INTO bewertung( Bewertung,Ffname_dienstleister,Ffname_Kunde,Fuid_dienstleister,Fuid_Kunde,Offer) 
    VALUES ('$bewertung','$Ffname_dienstleister','$Ffname_Kunde','$Fuid_dienstleister','$Fuid_Kunde','$Offer')";   
    mysql_query($query_bewertung);

    $check_schnitt = mysql_query("SELECT ID FROM bewertung_schnitt 
    WHERE Fuid_dienstleister ='$Fuid_dienstleister' && Offer ='$Offer'"); 
    $check_schnitt = mysql_num_rows($check_schnitt);    
    if (empty($check_schnitt)) {      
        $query_schnitt = "INSERT INTO bewertung_schnitt(
        Fuid_dienstleister,Ffname_dienstleister,Offer,Bewertung_tot,Anzahl,Bewertung_schnitt)
        VALUES
        ('$Fuid_dienstleister','$Ffname_dienstleister','$Offer','$bewertung',1,'$bewertung')";    
        mysql_query($query_schnitt); 
    } else {
        $query_schnitt = "UPDATE bewertung_schnitt SET 
        Bewertung_tot=(Bewertung_tot+'$bewertung'), Anzahl = (Anzahl + 1),
        Bewertung_schnitt = Bewertung_tot/Anzahl
        WHERE Fuid_dienstleister ='$Fuid_dienstleister' && Offer ='$Offer'";  
        mysql_query($query_offer2);    
    }
    
    header("Location: search_list.php");
}
?>