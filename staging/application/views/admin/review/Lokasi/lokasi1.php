<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Display Multiple Marker in GMAP V3 using Code Igniter</title>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

    //create an array to store lat n lon
    var lat= [];
    var lon= [];

    var x=0;    //to store index for looping
    var map = null; //create a map and define it's value to null
    var markerArray = []; //create a global array to store markers
    var infowindow; //create infowindow to show marker information

    //looping for getting value from database using php
    <?php foreach($latlong as $row): ?>
        lat.push(<?php echo $row['lat']; ?>);
        lon.push(<?php echo $row['long']; ?>);
        x++;
    <?php endforeach; ?>


        function initialize() {
            //set center from the map
            var myOptions = {
                zoom: 10,
                center: new google.maps.LatLng(lat[0], lon[0]),
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            //make a new map
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            //define value and size for infowindow
            infowindow = new google.maps.InfoWindow({
                size: new google.maps.Size(150, 50)
            });

            //add eventlistener click to the map
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });

            // Add markers to the map
            // Set up markers based on the number of elements within the array from database
            for (var i = 0; i < x; i++) {
                createMarker(new google.maps.LatLng(lat[i], lon[i]));
            }

        }

        //create a function that will open infowindow when a marker is clicked
        var onMarkerClick = function() {
          var marker = this;
          var latLng = marker.getPosition();
          infowindow.setContent('<h3>Marker position is:</h3>' + latLng.lat() + ', ' + latLng.lng());
          infowindow.open(map, marker);
        };

    function createMarker(latlng){
        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });
        google.maps.event.addListener(marker, 'click', onMarkerClick);
        markerArray.push(marker); //push local var marker into global array
    }

    window.onload = initialize;

</script>
<style type="text/css">
  html, body {
      margin: 0;
      padding: 0;
    }
  #map_canvas {
    width: 500px;
    height: 500px;
    }
}
</style>
</head>
<body>
  <div id="map_canvas"></div>
</body>
</html>