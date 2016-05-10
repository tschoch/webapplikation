        
<?php
    $offer = $_POST['search'];
    $place = $_POST['place'];
    $range = $_POST['range'];

    if (!($place == NULL) OR !($offer == NULL)):
    $results = mysql_query("SELECT * FROM Users WHERE (Offer_1 LIKE '%{$offer}%' OR Offer_2 LIKE '%{$offer}%' OR Offer_3 LIKE '%{$offer}%') AND (PLZ LIKE '%{$place}%' OR City LIKE '%{$place}%')");
  
    else:
    $results = NULL;  
    endif;

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
        
        
        $.ajax({
            type: 'HEAD',
            url: $pfad,
            success: function(){
                $("#pic").attr('src',$pfad); 
            },
            error: function(){
                $("#pic").attr('src','uploads/10_1'); 
              
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

</script>

<?php } ?>