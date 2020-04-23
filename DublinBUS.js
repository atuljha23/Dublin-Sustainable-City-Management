var map;
var marker;

var table;
var row;
var cell1;
var cell2;
var cell3;
var cell4;
var cell5;

showJson();
//showAirQuality();

function populateTable(markerName, markerAvailabele, markerTotal) {

  console.log(markerAvailabele);
  cell1.innerHTML = " Total Bikes Available ";
  cell2.innerHTML = " " + markerAvailabele + " ";
  cell3.innerHTML = " Total Bikes Stands ";
  cell4.innerHTML = " " + markerTotal + " ";
  cell5.innerHTML = " " + markerName + " ";
}


function openNav(markerName, markerAvailabele, markerTotal) {

  populateTable(markerName, markerAvailabele, markerTotal);

  document.getElementById("mySidenav").style.display = "block";

  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawBasic(markerName));
}

function closeNav() {
  document.getElementById("mySidenav").style.display = "none";
}

function drawBasic(markerName) {
  var data = new google.visualization.DataTable();

  var options = {
    title: markerName,
    hAxis: {
      title: 'Time of Day',
      format: 'h:mm a',
      viewWindow: {
        min: [7, 30, 0],
        max: [17, 30, 0]
      }
    },
    vAxis: {
      title: 'Rating (scale of 1-10)'
    }
  };

  var chart = new google.visualization.ColumnChart(
    document.getElementById('chart_div'));

  chart.draw(data, options);
}

function initialize() {
  table = document.getElementById("bikeStationTable");
  row = table.insertRow(0);
  cell1 = row.insertCell(0);
  cell2 = row.insertCell(1);
  row = table.insertRow(0);
  cell3 = row.insertCell(0);
  cell4 = row.insertCell(1);
  row = table.insertRow(0);
  cell5 = row.insertCell(0);

  var mapOptions = {
    zoom:14,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: {lat: 53.343584, lng: -6.261495}
  }

  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(map);

  var  waqiMapOverlay  =  new  google.maps.ImageMapType({
    getTileUrl:  function(coord,  zoom)  {
      return  'https://tiles.waqi.info/tiles/usepa-aqi/'  +  zoom  +  "/"  +  coord.x  +  "/"  +  coord.y  +  ".png?token=_TOKEN_ID_";
    },
    name:  "Air  Quality",
  });

  map.overlayMapTypes.insertAt(0,waqiMapOverlay);

}

//var reddata = [];




function showAirQuality()
{

 request = new XMLHttpRequest();
 request.open('GET', ' http://erc.epa.ie/real-time-air/www/aqindex/aqih_json.php', true);
 var data = JSON.parse(request.responseText);
 console.log(data);
}




function showJson()
{

  request = new XMLHttpRequest();
  request.open('GET', 'https://api.jcdecaux.com/vls/v1/stations?contract=dublin&apiKey=2b0b28f9e8359ef196ac5cb0ce5b1b64593469c0', true);
  var array = [];
  var redarray ;
  var redder = [[]];
  var totalav = 0;
  var low = 0;
  var heatpoints = [];
  window.stationname = [];
  request.onload = function() {
    if (request.status >= 200 && request.status < 400){
    // Success!
    var data = JSON.parse(request.responseText);
    select = document.getElementById('myList');
    // console.log(data);
    for(var i = 0; i < data.length; i++) {

      (function(datas){

        var obj = datas.position;

    // console.log(obj);
    //console.log(obj[0]);
    //var start = {lat: parseFloat(obj['lat']), lng: parseFloat(obj['lng'])};
    var available = parseFloat(datas.available_bikes);

    //console.log(available)
    var total = parseFloat(datas.bike_stands);
    // console.log(total)
    var availability = available / total
    totalav = totalav + availability

    //console.log(totalav);
    // console.log(availability)
    var standn = datas.number
    //console.log(start);
    var markers = []


    var opt = document.createElement('option');
    opt.value = datas.name;
    opt.innerHTML = datas.name;
    select.appendChild(opt);


    var content = ';<div id="iw-container">' +'<div class="iw-title"> <b> '+datas.name+"</b> </div>" +'<div class="iw-content">'+ " Total Bikes Available " + datas.available_bikes + " <br>Total Bikes Stands " + datas.bike_stands +"</br></div></div>";

    if(availability>=0.75)
    {
      marker = new google.maps.Marker({
        icon: new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/green-dot.png"),
        position: new google.maps.LatLng(obj.lat, obj.lng),
        map: map,
        content:  content
      });

      var infoWindow = new google.maps.InfoWindow({
        content: ''
      });

      google.maps.event.addListener(marker, 'click', function () {
        openNav(datas.name, datas.available_bikes, datas.bike_stands);
                //infoWindow.setContent(this.content + '<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>');
                //infoWindow.open(this.getMap(), this);

              });
      array.push([parseFloat(obj.lat), parseFloat(obj.lng),parseFloat(((1-availability)))]);

    }
    else if(availability>=0.25 && availability<0.75)
    {
      if (availability>=low) {

        redarray = datas.name;
        redder.push([datas.name,(availability*100)]);
          //console.log(redder);

        }
        marker = new google.maps.Marker({
          icon: new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"),
          position: new google.maps.LatLng(obj.lat, obj.lng),
          map: map,
          content: content
        });

        var infoWindow = new google.maps.InfoWindow({
          content: ''
        });

        google.maps.event.addListener(marker, 'click', function () {
          openNav(datas.name, datas.available_bikes, datas.bike_stands);

        });
        array.push([parseFloat(obj.lat), parseFloat(obj.lng),parseFloat(((1-availability)))]);

      }

      else
      {
       if (availability>=low) {

        redarray = datas.name;
        redder.push([datas.name,(availability*100)]);
           //console.log(redder);

         }
         marker = new google.maps.Marker({
          icon: new google.maps.MarkerImage("http://maps.google.com/mapfiles/ms/icons/red-dot.png"),
          position: new google.maps.LatLng(obj.lat, obj.lng),
          map: map,
          content:  content
        });

         var infoWindow = new google.maps.InfoWindow({
          content: ''
        });

         google.maps.event.addListener(marker, 'click', function () {
          openNav(datas.name, datas.available_bikes, datas.bike_stands);

        });

         array.push([parseFloat(obj.lat), parseFloat(obj.lng),parseFloat(((1-availability)))]);



       }
     } )(data[i]);

    // }
  }
document.getElementById("callme").innerHTML = redarray;
//console.log(totalav);
document.getElementById("Availability").innerHTML = "Bikes Availability: " + totalav.toFixed(2) +"%";
//console.log(redarray);
document.getElementById("Busy_Station").innerHTML;
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,

  data: [{
    type: "doughnut",
    startAngle: 240,
    yValueFormatString: "##0.00\"%\"",
    indexLabel: "{label} {y}",
    dataPoints: [
    {y: totalav, label: "Bikes Available"},
    {y: (100-totalav), label: " Bikes Not Available"},

    ]
  }]
});

redder.sort(function(a,b) {
  return a[1]-b[1]
});
makeTable(redder);

chart.render();
} else {
    // We reached our target server, but it returned an error
    console.log("Server returned error")

  }
};

request.onerror = function() {
  // There was a connection error of some sort
};

request.send();
  //console.log(mydata);
  // alert(mydata[0].location);


}

google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawTrendlines);

function drawTrendlines() {
  var data = new google.visualization.DataTable();


  var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Availability'
    },
    colors: ['#AB0D06', '#007329'],
    trendlines: {
      0: {type: 'exponential', color: '#333', opacity: 1},
      1: {type: 'linear', color: '#111', opacity: .3}
    }
  };

  var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

  chart.draw(data, options);
}


function makeTable(redder) {
  var table = document.getElementById('table');


  for (var i = -1; i < 10; i++) {
    var row = document.createElement('tr');
    for (var j = 0; j < 2; j++) {
      if(i==-1)
      {
        if(j == 0)
        {
          var cell = document.createElement('td');
          cell.textContent = 'Station';
          row.appendChild(cell);
          cell.style.width = '100px';
          cell.style.fontWeight = 'bold'
        }
        else
        {
          var cell = document.createElement('td');
          cell.textContent = 'Availability';
          row.appendChild(cell);
          cell.style.width = '100px';
          cell.style.fontWeight = 'bold'
        }

      }
      else
      {
        var cell = document.createElement('td');
        cell.textContent = redder[i][j];
        row.appendChild(cell);
        cell.style.width = '100px';
           // console.log("Eroor"+redder)
         }
       }

     table.appendChild(row);
}
   return table;
 }

 function logout()
{
  window.location = "Login.html";
}
