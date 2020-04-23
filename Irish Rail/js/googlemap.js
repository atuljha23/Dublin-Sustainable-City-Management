
function initMap() {
var places={lat:53.350140,lng:-6.266155};
  var map = new google.maps.Map(document.getElementById('map'), {
    center: places,
    zoom: 7
  });



var marker = new google.maps.Marker({
    position: places,
    map: map,
    title: 'Hello World!'
  });





  var allData = JSON.parse(document.getElementById('allData').innerHTML);

    showAllColleges(allData)

function showAllColleges(allData) {
	var infoWind = new google.maps.InfoWindow;
Array.prototype.forEach.call(allData, function(data){
console.log(data.id);





var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		strong.textContent = data.publicmessage;
		content.appendChild(strong);

	var marker = new google.maps.Marker({
	      position: new google.maps.LatLng(data.trainlatitude, data.trainlongitude),
	      map: map
	    });


   marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })

//trainlatitude
//trainlongitude
//publicmessage
})




}


}
 
