        
<?php
    $offer = $_POST['search'];
    $place = $_POST['place'];
    $range = $_POST['range'];

    if (!($place == NULL) OR !($offer == NULL)):
    $results = mysql_query("SELECT * FROM Users WHERE (Offer_1 LIKE '%{$offer}%' OR Offer_2 LIKE '%{$offer}%' OR Offer_3 LIKE '%{$offer}%') AND (PLZ LIKE '%{$place}%' OR City LIKE '%{$place}%')");
  
    else:
    $results = NULL;  
    endif;
 ?>

