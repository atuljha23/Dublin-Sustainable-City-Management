<!DOCTYPE html>
 <html>
   <head>
     <title>Dublin-Bikes Dashboard</title>
   <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
   <meta charset="utf-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <!-- <script  type="text/javascript" src="heatmap.js"></script> -->
   <!-- <script  type="text/javascript" src="leaflet-heatmap.js"></script> -->
   <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />
   <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
   <script src="http://leaflet.github.io/Leaflet.heat/dist/leaflet-heat.js"></script>
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link href="https://google-developers.appspot.com/maps/documentation/javascript/examples/default.css" rel="stylesheet">
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript" src="DublinBUS.js"></script>
   <script type="text/javascript" src="css/tomtom1.js"></script>
   <script type="text/javascript" src="css/tomtom2.js"></script>
   <script type="text/javascript" src="css/tomtom3.js"></script>
   <script type="text/javascript" src="css/tomtom4.js"></script>
   <link rel="stylesheet" href="css/tomtomindex.css">
    <link rel="stylesheet" href="css/tomtommaps.css">
    <link rel="stylesheet" href="css/traffic.css">

   <link rel = "stylesheet"
    type = "text/css"
    href = "MainCSS.css" />
 </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
   <nav class="navbar navbar-default navbar-fixed-top">
   <div class="container" >
     <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <div class="header">
     <img src="images/dublin.png" alt="logo" />
     <a  class="navbar-brand">Irish Rail Dashboard</a>
   </div>
     </div>
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
         <div id="mySidenav" class="sidenav">
           <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
           <h2 href="#">Statistics</h2>
           <div style="margin: auto;">
           	<table id="bikeStationTable"></table>
           </div>
           <div id="chart_div" style="height: 300px; width: 100%;"></div>
         </div>
          <li><a onclick="location.href='index.html'">Home</a></li>
           <li><a onclick="location.href='DublinBikes.html'">DUBLIN BIKES</a></li>
                      <li><a onclick="location.href='DublinBus.html'">Dublin Bus</a></li>
                      <li><a onclick="location.href='traffic.html'">Dublin Traffic Stats</a></li>
       </ul>
     </div>
   </div>
 </nav>
 <div id="about" class="container-fluid">
   <div class="row">
     <div class="col-sm-8">
       <br>


       <!-- <br><button class="btn btn-default btn-lg">Get in Touch</button> -->
     </div>

   </div>
 </div>
 </a>
 <style>
 .container {
   position: relative;
   text-align: center;
   color: black;
 }

 #map {
   height: 100%;
 }
 html, body {
   height: 100%;
   margin: 0;
   padding: 0;
 }

 .bottom-left {
   position: absolute;
   bottom: 8px;
   left: 16px;
 }

 .w3-tangerine {
   font-family: "Tangerine", serif;
 }

 .top-left {
   position: absolute;
   top: 8px;
   left: 16px;
 }

 .top-right {
   position: absolute;
   top: 8px;
   right: 16px;
 }

 .header img {
   float: left;
   width: 140px;
   height: 50px;

 }

 .header h1 {
   position: relative;
   top: 18px;
   left: 10px;
 }

 .hidden {
   display: none;
 }

 .bottom-right {
   position: absolute;
   bottom: 8px;
   right: 16px;
 }

 .centered {
   position: absolute;
   top: 50%;
   left: 50%;
   transform: translate(-50%, -50%);
 }

    }

 </style>


   <img src="images/irishrail.jpg" alt="Snow"  width="1900" height="700">


 <div id="routes" class="container-fluid text-center bg-grey" >
    <br><h2>Real Time Irish Rail Information</h2><br>
 </div>
 <?php include 'PHP/index.php';?>

       <span class="glyphicon glyphicon-chevron-up"></span>
     </a>
      <p>Sustainable City Management Project - Team 5</p>
   </footer>
     </body>


 </html>
