var $check = 2;
var map;
var addresse;
function initMap() {
     map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 46.8209, lng: 8.4078}
    });
   var marker = new google.maps.Marker({
    position:  {lat: 47.5352428, lng: 9.440560899999999},
    map: map,
    title: 'Click to zoom'
  });

   
   marker.addListener('click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });   
}


//set elements of advise
$(document).ready(function(){
    $(".marker").click(function() {
      
        var $row_count = $(this).attr('id');
        var $plz = $(this).find("#plz_list").html();
        var $ort = $(this).find("#ort_list").html();
        var $offer = $(this).find("#offer_list").html();   
            $file_id = $(this).find("#fid_list").html(); 
        var $pfad = "uploads/"+ $file_id +"_1";
        var $pfad_nxt = "uploads/"+ $file_id +"_2";
        
        var $place = $plz + " " + $ort;
        var $angebot = "spezialisiert auf " + $offer;
        var $anbieter = "Anbieter " + $row_count;
        
        $("#anb_visit").html($anbieter);
        $("#ort_visit").html($place);
        $("#offer_visit").html($angebot);  
        $("#test").html($file_id); 
        $("#pic").attr('src',$pfad);
        
        
        $.ajax({
            type: 'HEAD',
            url: $pfad,
            success: function(){
                $("#pic").attr('src',$pfad); 
                $check = 2;
            },
            error: function(){
                $("#pic").attr('src','uploads/10_1');
                $check = 1;
   
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
    }); 
});

//picture gallerie
var $pic = 2;  
$(document).ready(function(){
    $("#pic").click(function(){  
        
        var $pfad = "uploads/"+ $file_id +"_"+$pic;
        var $pfad_bgn = "uploads/"+ $file_id +"_1";
        
        if($file_id > 10 && $check!=1){        
        $.ajax({
            type: 'HEAD',
            url: $pfad,
            success: function(){
                $pic++;
                if($pic>3){
                    $pic = 1;   
                } 
                $("#pic").attr('src',$pfad);     
                $("#img_label").html("klick für mehr bilder");  
            },
            error: function(){
                $pic = 2;
                $("#pic").attr('src',$pfad_bgn);
            }
        });
        }  
    });
});
