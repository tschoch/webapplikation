var map;
var addresse;
function initMap() {
     map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 46.8209, lng: 8.4078}
    });
                       
}

function refresh() {

	addresse = "Arbon";	
	console.log(addresse);

	
 
        $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresse+'&sensor=false', null, function (data) {
            var p = data.results[0].geometry.location
            var latlng = new google.maps.LatLng(p.lat, p.lng);
            new google.maps.Marker({
                position: latlng,
                map: map
            });

    });
}


