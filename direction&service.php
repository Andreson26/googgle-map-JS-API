<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Direction & Service</title>
</head>
<body>
<div id="map"></div>
    <button onclick="calcRoute()">Calculate Route</button>
    

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
    mapTypeId: google.maps.MapTypeId.SATELLITE
};
//create map
myMap = new google.maps.Map(document.getElementById('map'), mapOptions);

//setting the mapTypeId upon construction
myMap.setMapTypeId(google.maps.MapTypeId.ROADMAP);

//create a directionService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create  a DirectionsRenderer object which we will use to display route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRender to the map
directionsDisplay.setMap(myMap);

//define calcroute function
function calcRoute() {
    var request = {
        origin: "Massachusetts",
        destination: "North Carolina",
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.METRIC
    }
    //pass the request to the route method
    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
          console.log(result);
          //Get distance and time
          window.alert("the traveling distance is " + result.routes[0].legs[0].distance.text + ".<br />The traveling time is: " + result.routes[0].legs[0].duration.text + ".");
          
          //display route
          directionsDisplay.setDirections(result);
          console.log( directionsDisplay.setDirections(result))
      }
    });
}
</script>


    
</body>
</html>