//var latlng= new google.maps.LatLng(45.75722, 4.89888);
//
//var options={
//
//    center: latlng,
//    zoom:19,
//    mapTypeId: google.maps.MapTypeId.ROADMAP
//
//};
//
//var carte = new google.maps.Map(document.getElementById("maps"),options);
//
////création du marqueur
//var marqueur = new google.maps.Marker({
//    position:latlng,
//    map: carte
//
//});
//
///****************Nouveau code****************/
//
//google.maps.event.addListener(marqueur, 'click', function() {
//    alert("Le marqueur a été cliqué.");//message d'alerte
//});

//var locations = [];
//
//locations.push(document.getElementsByTagName(""))



var map = new google.maps.Map(document.getElementById('maps'), {
    zoom: 10,
    center: new google.maps.LatLng(0, 0),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});






$(document).ready(function(){
    var geocoder = new google.maps.Geocoder();

    $( "#items li" ).each(function( index ) {
        //console.log(  $( this ).data("title") );
        var address = $( this ).text();
        var title=$( this).data('title');
        var sceances=$(this).data('sceances')
        var marker='';

        geocoder.geocode({'address': address}, function(results, status) {

            if (status === google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);

                marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location,
                    title: title

                });
                var infowindow = new google.maps.InfoWindow();
                infowindow.setContent('<div class="stat-row"><div class="stat-cell bg-success darker"><span class="text-bg">'+ title +'</span><br><span class="text-sm">' + address + '</span><br><span class="text-sm pull-right"><strong> '+ sceances +'  Sceances disponibles </strong> </span></div></div>' );



                prev_infowindow = false;
                marker.addListener('click', function() {
                    console.log('bananas');
                    if( prev_infowindow ) {
                        prev_infowindow.close();
                    }

                    prev_infowindow = infowindow;
                    infowindow.open(map, marker);
                });

            }
            // else {
            //    alert('Geocode was not successful for the following reason: ' + status);
            //}

    });



    });


});

       //
    //google.maps.event.addListener(marker, 'click', (function(marker, i) {
    //    return function() {
    //        infowindow.setContent(locations[i][0]);
    //        infowindow.open(map, marker);
    //    }
    //})(marker, i));
