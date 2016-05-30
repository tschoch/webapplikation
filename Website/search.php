<?php
    $offer   = "%{$_POST['search']}%";
    $place   = $_POST['place'];
    $range_1 = $_POST['range'];
	 if (empty($place)) {
            $range = 200;
        }
     if (!empty($range_1)) {
            $range = $range_1 + 5;  
        }
    if (empty($range)) {
        $range = 5;
    }


    if(($offer == "%%")&&($place == NULL)&&($range == 200)){
        if(isset($_COOKIE["offer"])){
            $offer = $_COOKIE["offer"];
            $place = $_COOKIE["place"];
            $range = $_COOKIE["range"];
        }
    }

        setcookie("offer", $offer, time() + 86400);
        setcookie("place", $place, time() + 86400);
        setcookie("range", $range, time() + 86400);
        


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


    $data_arr = geocode($place . ",CH"); 
    $lat = $data_arr[0];
    $lng = $data_arr[1];

    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    
    
   // "SELECT Ffname, PLZ, City, Offer_1, Offer_2, Offer_3, Fuid, lat, lng FROM Users WHERE (Offer_1 LIKE ? OR Offer_2 LIKE ? OR Offer_3 LIKE ? ) AND (City LIKE ? OR PLZ = ?)"
    
   // "ssssi",$offer, $offer,$offer,$place_s,$place_i
    
    if (!($stmt = $mysqli->prepare("SELECT Ffname, Femail, PLZ, City, Offer_1, Offer_2, Offer_3, Fuid, lat, lng, ( 6371  * acos( cos( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin( radians(?) ) * sin( radians( lat ) ) ) ) AS distance FROM Users 
    WHERE ( ((Offer_1  <>  '') || (Offer_2  <>  '') || (Offer_3  <>  '') ) 
    AND(Offer_1 LIKE ? OR Offer_2 LIKE ? OR Offer_3 LIKE ?) ) HAVING distance < ?  ORDER BY distance"))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
    }
    if (!$stmt->bind_param("dddsssd", $lat, $lng, $lat, $offer, $offer, $offer, $range)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!$stmt->bind_result($out_Ffname, $out_Femail, $out_PLZ, $out_City, $out_Offer_1, $out_Offer_2, $out_Offer_3, $out_Fuid, $out_lat, $out_lng,$out_distance )) {
        echo "Binding output parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
    
    $results = array();
    while ($stmt->fetch()) {
        $results [] = array('Ffname' => $out_Ffname, 'Femail' => $out_Femail, 'PLZ' => $out_PLZ, 'City' => $out_City, 'Offer_1' => $out_Offer_1, 'Offer_2' => $out_Offer_2, 'Offer_3' => $out_Offer_3, 'Fuid' => $out_Fuid, 'lat' => $out_lat, 'lng' => $out_lng, 'distance' => $out_distance );
    }
    
    $stmt->close();

    $mysqli->close(); 

    if($results != NULL){
 ?>

<script>

var $email;    
    
//set elements of first advise
$(document).ready(function(){
        var $row_count = 1;
        var $plz = $("#1").find("#plz_list").html();
        var $ort = $("#1").find("#ort_list").html();
		var $name = $("#1").find("#name_list").html();
            $email = $(this).find("#email_list").html();
        var $offer = $("#1").find("#offer_list").html();   
            $file_id = $("#1").find("#fid_list").html(); 
        var $pfad = "uploads/"+ $file_id +"_1";
        var $pfad_nxt = "uploads/"+ $file_id +"_2";
        
        var $place = $plz + " " + $ort;
        var $angebot = "spezialisiert auf " + $offer;
        var $anbieter = "Anbieter " + $row_count;
        
        $("#anb_visit").html($name);
        $("#ort_visit").html($place);
        $("#offer_visit").html($angebot);  
        $("#test").html($file_id); 
        $("#pic").attr('src',$pfad);
        $("#fid_dienstleister_card").html($file_id); 
    
        localStorage.setItem('offer',$offer);
        localStorage.setItem('name',$name);
        localStorage.setItem('bewert_check',1);
        localStorage.setItem('email_check',1);
        localStorage.setItem('fid_anbieter',$file_id);
    
        //set bewert_drpdwn
        var $shw_bewert = $offer;   
    
        if($shw_bewert == null){
            var $shw_bewert = "Angebot_1, Angebot_2, Angebot_3";
        }
        var $offer_bewert = $shw_bewert.split(",");
    
        $("#drdwn_show_rate_1").empty();
        $("#drdwn_show_rate_2").empty();
        $("#drdwn_show_rate_3").empty();
            
        $("#drdwn_show_rate_1").html($offer_bewert[0]);
        $("#drdwn_show_rate_2").html($offer_bewert[1]);
        $("#drdwn_show_rate_3").html($offer_bewert[2]);
        
        
        //check if picture exist    
    
        
        $.ajax({
            type: 'HEAD',
            url: $pfad,
            success: function(){
                $("#pic").attr('src',$pfad); 
                localStorage.setItem('check',2);
            },
            error: function(){
                $("#pic").attr('src','uploads/10_1'); 
                localStorage.setItem('check',1);
            }
        }); 

        $.ajax({
            type: 'HEAD',
            url: $pfad_nxt,
            success: function(){
                $("#img_label").html("klick für mehr bilder"); 
            },
            error: function(){
                $("#img_label").html(" "); 
            }
        });  
    
    
    $("#1").addClass('selectRow'); 
    $("#1").addClass('selectRow_odd');
});

//set email
$(document).ready(function(){
    $("#email_senden").click(function() {
        
        if(localStorage.getItem('email_check') == 0){
            alert("Zuerst ein Anbieter anwählen");
        }else{
            $(this).attr("href", "mailto:" + $email);
        }
    });
});    
    
//bewertung
$(document).ready(function(){
    
        var $name = localStorage.getItem('name');
        var $offer = localStorage.getItem('offer');    
        var $res = $offer.split(",");
        var $fid_anbieter = localStorage.getItem('fid_anbieter');
            
        //bewertung
        $("#anbieter_bewert").html("Anbieter: " + $name);
        $("#anbieter_bewert_h").val($name);
        $("#anbieter_id_bewert_h").val($fid_anbieter);
        $("#drdwn_o_1").html($res[0]);
        $("#drdwn_o_2").html($res[1]);
        $("#drdwn_o_3").html($res[2]);

});    
    
    
</script>

<?php } ?>