var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    center: new google.maps.LatLng(53.34918806,-6.255253889),
    mapTypeId: 'terrain'
  });

  // Create a <script> tag and set the USGS URL as the source.
  var script = document.createElement('script');
  // This example uses a local copy of the GeoJSON stored at
  // http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
  script.src = 'dbs_stops.js';
  document.getElementsByTagName('head')[0].appendChild(script);
}

// Loop through the results array and place a marker for each
// set of coordinates.
window.eqfeed_callback = function(results) {
  for (var i = 0; i < results.features.length; i++) {
  //  var coords = results.features[i].geometry.coordinates;
    var latLng = new google.maps.LatLng(results.features[i].lat,results.features[i].lng);
    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
      title: results.features[i].stopname,
      stopid: results.features[i].stopid,
      routes: results.features[i].routes
    });
    window.google.maps.event.addListener(marker, 'click', function () {
        // do stuff
            alert("Bus Stop Name: " + marker.title + "\n" +
            "Bus Stop Number: " + marker.stopid + "\n" +
            "Bus Routes: " + marker.routes);
            console.log(marker.title)
        }
    );
  }
      }
