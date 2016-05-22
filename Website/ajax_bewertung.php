<?php

$offer=$_GET["offer"];
$fid=$_GET["fid"];

require '../phplogin/dbconfig.php';

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if (!($stmt = $mysqli->prepare("SELECT Bewertung_schnitt, Anzahl FROM bewertung_schnitt 
    WHERE Offer = ? && Fuid_dienstleister = ? "))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
if (!$stmt->bind_param("si", $offer, $fid)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}
if (!$stmt->bind_result($out_Bewertung_schnitt, $out_Anzahl)) {
    echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

$bewertung = array();

while ($stmt->fetch()) {
	$bewertung  = array('Bewertung_schnitt' => $out_Bewertung_schnitt, 'Anzahl' => $out_Anzahl);
}

$stmt->close();

$mysqli->close();

echo json_encode($bewertung); 

?>