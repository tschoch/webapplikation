
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: 46.8209, lng: 8.4078}
    });
}


$(document).ready(function(){
    $(".table_row").click(function() {
      
        var row_count = $(this).attr('id');

        $.ajax({
             type: "POST",
             url: "ajax.php",
             data: { row_count : row_count },
             success:function(data){
                     alert(data);
              }
           });

        console.log(row_count);
            
    });
});


// $(this).css('background', '#aaa')  
    