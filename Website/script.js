var $fid;

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 46.8209, lng: 8.4078}
    });
}

$(document).ready(function(){
    $(".table_row").click(function() {
      
        var $row_count = $(this).attr('id');
        var $plz = $(this).find("#plz_list").html();
        var $ort = $(this).find("#ort_list").html();
        var $offer = $(this).find("#offer_list").html();   
        var $file_id = $(this).find("#fid_list").html(); 
        var $pfad = "uploads/"+ $file_id +"_1";
        
        var $place = $plz + " " + $ort;
        var $angebot = "spezialisiert auf " + $offer;
        var $anbieter = "Anbieter " + $row_count;
        
        $("#anb_visit").html($anbieter);
        $("#ort_visit").html($place);
        $("#offer_visit").html($angebot);  
        $("#test").html($file_id); 
        $("#pic").attr('src',$pfad);
        $("#img_label").html("klick für mehr bilder"); 
        
    }); 
});

var $pic = 2;  
$(document).ready(function(){
    $("#pic").click(function(){  
        var $file_id = $("#test").html();
        var $pfad = "uploads/"+ $file_id +"_"+$pic;
            $pic++;
            if($pic>3){
                $pic = 1;   
            } 
        $(this).attr('src',$pfad);  
        
    });
});





// $(this).css('background', '#aaa')  
    