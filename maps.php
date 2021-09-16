<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Google Map</title>
</head>
<body>
    <div id="map"></div>
    <button onclick="showMarkers()">Show existing markers</button>
    <button onclick="clearMarkers()">Hide markers fro the map</button>
    <button onclick="deleteMarkers()">remove existing markers</button>




    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4_LsJvZBRBfivjk_f4T2OVHK8cONoX0Y&callback=initMap">
</script>

<script src=./map.js></script>
    
</body>
</html>