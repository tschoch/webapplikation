var $check = 2;
var map;
var marker;
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 46.8209, lng: 8.4078}
    });
	
	$('#hiddntble > tbody > tr').each(function() {
		var $lat = $(this).find("#lat").html();
		var $lng = $(this).find("#lng").html();
		var $name = $(this).find("#name_list").html();
		var $id = $(this).find("#fid_list").html();
		var $latlng = new google.maps.LatLng(parseFloat($lat),parseFloat($lng));
		marker = new google.maps.Marker({
			position: $latlng,
			title: $name,
			id: $id,
			map: map
		});
		 google.maps.event.addListener(marker, 'click', function (element) { 
        alert(this.id) });

	});

}

//colorchange of avtive row
$(document).ready(function(){
    $(".table_row").click(function(){
        $(".table_row").not(this).removeClass('selectRow');
        $(".table_row").not(this).removeClass('selectRow_odd');
        $(this).addClass('selectRow'); 
        $(this).addClass('selectRow_odd');
    });
});
  
//set elements of advise
$(document).ready(function(){
    $(".table_row").click(function() {
      
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
