<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Geocoding Info API</title>
</head>
<body>
<div id="map"></div>
<input type="text" placeholder="Address" id="address">
    <button onclick="geocodeAddress()">Calculate Route</button>
    <div id="output"></div>
    

    <script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4_LsJvZBRBfivjk_f4T2OVHK8cONoX0Y&callback=initMap">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

//define marker variable
var marker;

//goecode function
function geocodeAddress() {
    var url = "https://maps.googleapis.com/maps/api/geocode/json?address="+document.getElementById("address").value+"&key=AIzaSyD4_LsJvZBRBfivjk_f4T2OVHK8cONoX0Y";
   //window.open(url);

    $.getJSON(url, function(data) {
        if(data.status == "OK") {
            var formattedAddress = data.results[0].formatted_address;
            var latitude = data.results[0].geometry.location.lat;
            var longitude = data.results[0].geometry.location.lng;
            var postcode;
            //get the postcode
            $.each(data.results[0].address_components, function(index, element) {
                if(element.types == "postal_code") {
                    postcode = element.long_name;
                  
                   return false;  //stop the loop
                }
            });
            $("#output").html("<b>Formatted Address</b>:" + formattedAddress + ". <br/><b>Coordinates</b>: (lat: " + latitude + ", lng: " + longitude + ").<br/><b>Postcode</b>: " + postcode + ".");

            //center maap
            myMap.setCenter({lat: latitude, lng: longitude});
            //change the zoom
            myMap.setZoom(20);

            //if marker is there delete it
            if(marker != undefined) {
                marker.setMyMap(null);
            }

            //create a marker
            var marker = new google.maps.Marker({
                map: myMap,
                position: {lat: latitude, lng: longitude},
                animaion: google.maps.Animation.DROP
            });
        }else {
            $("#output").html("request unsuccessful");
        }
    });

}






</script>
