localStorage.setItem('check',2);//ob bildvorhanden
var map;
var marker;
localStorage.setItem('bewert_check',0); //ob anbierter ausgewählt

(function($){  
var s = document.createElement("script");
s.type = "text/javascript";
s.src  = "https://maps.googleapis.com/maps/api/js?key=AIzaSyDAG3EVkm45lkKfYQwQ3c471LzIm1Ifzj4&signed_in=true&callback=initMap";
$("head").append(s);   
 window.initMap = function () {
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
			var $id= this.id;                 
			$('#hiddntble > tbody > tr > td ').each(function(element) {
				var $bla = $(this).html();
				if($id == $bla){
					var $tblerow = this.parentNode; 
					//console.log($tblerow);
					//console.log($tblerow.childNodes[9].innerHTML);
					var $row_count = $tblerow.id;
					var $plz = $tblerow.childNodes[3].innerHTML;
					var $name = $tblerow.childNodes[1].innerHTML;
                    var $email = $tblerow.childNodes[15].innerHTML;
					var $ort = $tblerow.childNodes[5].innerHTML;
					var $offer = $tblerow.childNodes[7].innerHTML;  
						$file_id = $tblerow.childNodes[9].innerHTML;  
					var $pfad = "uploads/"+ $file_id +"_1";
					var $pfad_nxt = "uploads/"+ $file_id +"_2";
					
					var $place = $plz + " " + $ort;
					var $angebot = "spezialisiert auf " + $offer;
					
                    console.log($email);
                    
                    //check ob dienstleister angewählt
                    localStorage.setItem('bewert_check',1);
        
                    //set angaben von karte
					$("#anb_visit").html($name);
					$("#ort_visit").html($place);
					$("#offer_visit").html($angebot);  
					$("#test").html($file_id); 
					$("#pic").attr('src',$pfad);
                    $("#fid_dienstleister_card").html($file_id);
                    $("#email_senden").attr("href", "mailto:" + $email);
					
                    //set localstorage für bewertung.php
                    localStorage.setItem('offer',$offer);
                    localStorage.setItem('name',$name);
                    localStorage.setItem('fid_anbieter',$file_id);

                    //set bewert_drpdwn
                    var $shw_bewert = $offer;   

                    if($shw_bewert == null){
                        var $shw_bewert = "Angebot_1, Angebot_2, Angebot_3";
                    }
                    var $offer_bewert = $shw_bewert.split(",");

                    $("#show_rate").html('Bewertung '+'<span class="caret"></span>');
                    $(".anz_bewert").empty(); 
                    $(".show_stars").starRating('setRating',0);
                    $(".show_stars_offer").empty();
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
				}
						});
					});
				});
			}
}(jQuery));

//bewertung
$(document).ready(function(){
    
        var $name = localStorage.getItem('name');
        var $offer_bewert = localStorage.getItem('offer');   
        var $fid_anbieter = localStorage.getItem('fid_anbieter');
    
        if($offer_bewert == null){
            var $offer_bewert = "Angebot__1, Angebot_2, Angebot_3";
        }
        var $res = $offer_bewert.split(",");
            
        $("#anbieter_bewert").html("Anbieter: " + $name);
        $("#anbieter_bewert_h").val($name);
        $("#anbieter_id_bewert_h").val($fid_anbieter);
        $("#drdwn_o_1").html($res[0]);
        $("#drdwn_o_2").html($res[1]);
        $("#drdwn_o_3").html($res[2]);

});

//star-rating
$(document).ready(function($) {
     $(".rate_stars").starRating({
         totalStars: 5,
         starSize: 30,
         emptyColor: 'lightgray',
         hoverColor: 'salmon',
         activeColor: 'cornflowerblue',
         strokeWidth: 0,
         useGradient: false,
         disableAfterRate: false, 
         callback: function(currentRating){
            $("#range").val(currentRating);
         }
  });  
});


//star-rating-show
$(document).ready(function($) {
    $(".show_stars").starRating({
        totalStars: 5, 
        starSize: 30, 
        emptyColor: 'lightgray', 
        initialRating: 0, 
        strokeWidth: 0, 
        readOnly: true});  
});

//bewertung dropdown
$(document).ready(function(){
    $(".dropdown-menu").on('click', 'li a', function(){
        $("#drpdwn").html($(this).text()+" "+'<span class="caret"></span>');
        $("#drpdwn").val($(this).text());
        $("#offer_bewert").val($(this).text());
   });

});

//show bewert dropdown
$(document).ready(function(){
    $(".drdwn_show_r").click(function(){
      $("#show_rate").html($(this).text()+" "+'<span class="caret"></span>');
   });
});

 //show_bewertung
(function($){
$(document).ready(function(){
    
    $(".drdwn_show_r").click(function(){
       $bewert_offer = $(this).text();
       $fid_card = $("#fid_dienstleister_card").html();
        $.getJSON('ajax_bewertung.php', { "offer": $bewert_offer, "fid": $fid_card},  function(data) {
            
            var $bewert_schnitt  = data.Bewertung_schnitt;
            var $anzahl_bewert = data.Anzahl;
            
            $bewert_schnitt =  Math.round($bewert_schnitt*2)/2;
            
            if($anzahl_bewert == null){
                $(".anz_bewert").html("keine bewertungen vorhanden");   
                $(".show_stars").starRating('setRating',0);
            }else{
                if($anzahl_bewert == 1){
                    $(".anz_bewert").html($anzahl_bewert + " Bewertung");               
                }else{
                    $(".anz_bewert").html($anzahl_bewert + " Bewertungen");                 
                }
                $(".show_stars").starRating('setRating',$bewert_schnitt);
            }
        });        
    });    
});
}(jQuery));

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
        
        //save variables from table
        var $row_count  = $(this).attr('id');
        var $plz        = $(this).find("#plz_list").html();
        var $ort        = $(this).find("#ort_list").html();
		var $name       = $(this).find("#name_list").html();
        var $email      = $(this).find("#email_list").html();
        var $offer      = $(this).find("#offer_list").html();   
            $file_id    = $(this).find("#fid_list").html(); 
        var $pfad       = "uploads/"+ $file_id +"_1";
        var $pfad_nxt   = "uploads/"+ $file_id +"_2";
        
        var $place = $plz + " " + $ort;
        var $angebot = "spezialisiert auf " + $offer;
        
        //check ob dienstleister angewählt
        localStorage.setItem('bewert_check',1);
        
        //set angaben von karte
        $("#anb_visit").html($name);
        $("#ort_visit").html($place);
        $("#offer_visit").html($angebot);  
        $("#test").html($file_id); 
        $("#pic").attr('src',$pfad);
        $("#fid_dienstleister_card").html($file_id); 
        $("#email_senden").attr("href", "mailto:" + $email);
        
        //set localstorage für bewertung.php
        localStorage.setItem('offer',$offer);
        localStorage.setItem('name',$name);
        localStorage.setItem('fid_anbieter',$file_id);
        
        //set bewert_drpdwn
        var $shw_bewert = $offer;   
    
        if($shw_bewert == null){
            var $shw_bewert = "Angebot_1, Angebot_2, Angebot_3";
        }
        var $offer_bewert = $shw_bewert.split(",");
          
        $("#show_rate").html('Bewertung '+'<span class="caret"></span>');
        $(".anz_bewert").empty(); 
        $(".show_stars").starRating('setRating',0);
        $(".show_stars_offer").empty();
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
    }); 
});

//picture gallerie
var $pic = 2;  
$(document).ready(function(){
    $("#pic").click(function(){  
        
        var $pfad = "uploads/"+ $file_id +"_"+$pic;
        var $pfad_bgn = "uploads/"+ $file_id +"_1";
        var $check =localStorage.getItem('check');
        
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










