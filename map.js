//set map options
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

//create marker 1
var marker1Options = {
    position: myLatlng,
    map: myMap,
    title: "This Is Charlotte",
    draggable: true,
    Animation: google.maps.Animation.DROP
}
var marker1 = new google.maps.Marker(marker1Options);

//create info window
var contentString = "<div>This is an info window</div>";
var infowindow = new google.maps.InfoWindow({
    content: contentString,
    maxWidth: 100
});
//add event listener to the marker to show infowindo
marker1.addListener("click", function() {
   infowindow.open(map, marker1);
})


//create marker2
var marker2Options = {
    position: { lat: 35.7721, lng: -78.63861},
    title: "This is Raleigh." 
}
var marker2 = new google.maps.Marker(marker2Options);

marker2.setAnimation(google.maps.Animation.BOUNCE);
   marker2.setMap(myMap);

   //Show, Hide, Delete markers

   //remove markers
   marker1.setMap(null);
   marker2.setMap(null);

//create array where we store markers
var markers = [];
//create marker once we click ona point on the map
myMap.addListener("click", function(event) {
    var markerOptions = {
        position: event.latLng,
       // map: myMap
    }
    var marker = new google.maps.Marker(markerOptions);
    //store markers inarray
    markers.push(marker);
});

//show markers store in that array 
function showMarkers() {
    for (var i=0; i<markers.length; i++) {
       // markers[i].setMap(myMap);
       //add markers with delay
       addMarkerWithDelay(i)
    }
};
function addMarkerWithDelay(i) {
    setTimeout(function() {
        markers[i].setMap(myMap);
        markers[i].setAnimation(google.maps.Animation.DOPP);
    }, 200 * i);
}
//hide markers from the map (they are still in the array)

function clearMarkers() {
    for (var i=0; i<markers.length; i++) {
        markers[i].setMap(null);
    }
}

//delete markers from the array

function deleteMarkers() {
    clearMarkers();
    markers =[];
}


