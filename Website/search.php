        
<?php
    $offer   = "%{$_POST['search']}%";
    $place_i = "%{$_POST['place']}%";
    $place_s = "%{$_POST['place']}%";
    $range   = $_POST['range'];


if (($place_i != NULL) || ($place_s != NULL) || ($offer != NULL)){

        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if($stmt = $mysqli->prepare("SELECT Ffname, PLZ, City, Offer_1, Offer_2, Offer_3, Fuid, lat, lng FROM Users WHERE (Offer_1 LIKE ? OR Offer_2 LIKE ? OR Offer_3 LIKE ? ) AND (PLZ LIKE ? OR City LIKE ?)")){

              $stmt->bind_param("sssis", $offer, $offer,$offer,$place_i,$place_s); 

              $stmt->execute();
            
              $stmt->bind_result($out_Ffname, $out_PLZ, $out_City, $out_Offer_1, $out_Offer_2, $out_Offer_3, $out_Fuid, $out_lat, $out_lng);

              $results = array();
              while ($stmt->fetch()) {
                $results [] = array('Ffname' => $out_Ffname, 'PLZ' => $out_PLZ, 'City' => $out_City, 'Offer_1' => $out_Offer_1, 'Offer_2' => $out_Offer_2, 'Offer_3' => $out_Offer_3, 'Fuid' => $out_Fuid, 'lat' => $out_lat, 'lng' => $out_lng);
              }
            
            $stmt->close();

            $mysqli->close(); 

        }
    
    }else{
    $results = NULL;  
    }

    if($results != NULL){
 ?>

<script>

//set elements of first advise
$(document).ready(function(){
        var $row_count = 1;
        var $plz = $("#1").find("#plz_list").html();
        var $ort = $("#1").find("#ort_list").html();
		var $name = $("#1").find("#name_list").html();
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
        localStorage.setItem('fid_anbieter',$file_id);
    
        //set bewert_drpdwn
        var $shw_bewert = $offer;   
    
        if($shw_bewert == null){
            var $shw_bewert = "Angebot_1, Angebot_2, Angebot_3";
        }
        var $offer_bewert = $shw_bewert.split(",");
            
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