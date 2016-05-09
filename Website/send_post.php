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
$address= $str.",".$nr.",".$place;

     // function to geocode address, it will return false if unable to geocode address
    function geocode($address){

        // url encode the address
        $address = urlencode($address);

        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";

        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);

        // response status will be 'OK', if able to geocode given address 
        if($resp['status']='OK'){

            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];

            // verify if data is complete
            if($lati && $longi && $formatted_address){

                // put the data in the array
                $data_arr = array();            

                array_push(
                    $data_arr, 
                        $lati, 
                        $longi, 
                        $formatted_address
                    );

                return $data_arr;

            }else{
                return false;
            }

        }else{
            return false;
        }
    }

$data_arr = geocode($address);

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

$check_lat = mysql_query("SELECT lat FROM Users WHERE Fuid='$fuid'");
$check_lat = mysql_num_rows($check_lat);
if (empty($check_lat)) {
$query_lat = "INSERT INTO Users (lat) VALUES ('$data_arr[0]')where Fuid='$fuid'";   
mysql_query($query_lat);
} else {
$query_lat= "UPDATE Users SET lat='$data_arr[0]' WHERE Fuid='$fuid'";  
mysql_query($query_lat);    
}

$check_lng = mysql_query("SELECT lng FROM Users WHERE Fuid='$fuid'");
$check_lng = mysql_num_rows($check_lng);
if (empty($check_lng)) {
$query_lng = "INSERT INTO Users (lng) VALUES ('$data_arr[1]')where Fuid='$fuid'";   
mysql_query($query_lng);
} else {
$query_lng= "UPDATE Users SET lng='$data_arr[1]' WHERE Fuid='$fuid'";  
mysql_query($query_lng);    
}

$count=1;
$pic_type = 0;
$pic_size = 0;
$big_pic  = 0;
$pic_ok    = 0;


foreach ($_FILES["pictures"]["error"] as $key => $error) { 
if($count > 3){
    $count=1;
}
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["pictures"]["name"][$key]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pictures"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["pictures"]["size"][$key] > 500000) {
    echo "Sorry, your file is too large.";
    $big_pic++;
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
    $pic_type++;
}
    
if ($_FILES["pictures"]["size"][$key] == 0) {
    $pic_size++;
}
      
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
    $name = $_FILES["pictures"]["name"][$key];
    
    if (move_uploaded_file($tmp_name, "uploads/$fuid"."_"."$count")) {
        echo "The file has been uploaded.";
        $pic_ok = 1;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
    $count++;
    $_SESSION['pic_type'] = $pic_type;
    $_SESSION['pic_size'] = $pic_size;
    $_SESSION['big_pic']  = $big_pic;
    $_SESSION['pic_ok'] =   $pic_ok;
}
             
header("Location: edit.php");

?>