<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Geocoding APIhio</title>
</head>
<body>
<div id="map"></div>
<input type="text" placeholder="Address" id="address">
    <button onclick="geocodeAddress()">Calculate Route</button>
    

    <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4_LsJvZBRBfivjk_f4T2OVHK8cONoX0Y&callback=initMap">
</script>
<script type="text/javascript">

//function initialize() {
  //  var latlng = new google.maps.LatLng(35.227085, -80.843124);
    //var myOptions = {
      //  center: latlng,
        //zoom: 7,
        
        //mapTypeId: google.maps.MapTypeId.ROADMAP
    //};
    //var map = new google.maps.Map(document.getElementById('map'),
      //      myOptions);
//}
///google.maps.event.addDomListener(window, "load", initialize);

 var myLatlng = {lat: 35.227085, lng: -80.843124};

var mapOptions = {
    center: myLatlng,
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};
//create map
myMap = new google.maps.Map(document.getElementById('map'), mapOptions);

//create a geocoder object to use the geocode methode
var geocoder = new google.maps.Geocoder();

//create a geocode function
function geocodeAddress() {
    geocoder.geocode({"address": document.getElementById("address").value},
       function(results, status) {
           if(status == google.maps.GeocoderStatus.OK) {
               console.log(results)
               window.alert("address coordinates: " + results[0].geometry.location);
               myMap.setCenter(results[0].geometry.location);
               var marker = new google.maps.Marker({
                   map: myMap,
                   position: results[0].geometry.location
               });
           } else {
              window.alert("Geoceode not successsful: " + status);
           }
       }
    )
}
</script>