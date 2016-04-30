
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 46.8209, lng: 8.4078}
    });
}

$( function() {
  $('tr').click( function() {
    $(this).css('background', '#aaa')
  } );
} );