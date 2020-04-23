<?php
require '123.php';
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function

      $query = "SELECT * FROM dtrain WHERE traincode=\"$valueToSearch\"";


    $search_result = filterTable($query);
 

   
}
 else {
    $query = "SELECT * FROM `dtrain`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "transportation");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>


<html>
<head>
<script type="text/javascript" src="js/googlemap.js"></script>
<style>
#container{
    height: 450px;
    background-color: #d5f4e6;
}
#map{
    height:95%;
    width:95%;
    border: 5px solid red;

}

table, th, td {
  border: 1px solid black;
}

#allData{
display:none;
}

</style>

</head>

<body>
</body>
<div id="container">

        <form action="index.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Enter The Train Code Here......."><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
            
        
        </form>

	<?php 
			require 'traintransport.php';
			$edu = new train;
			$coll = $edu->getTrainLatLng();




$allData = json_encode($coll, true);



echo'<div id="allData">' . $allData . '</div>';					


 ?>


<div id="map"></div>
<center>
<br>
<br>
<br>
         <u><h2>Notice Board</h2></u>
    <table>
                <tr>
                    <th>TRAIN CODE</th>

                    <th>MESSAGE</th>
                   
                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['traincode'];?></td>
                    <td><?php echo $row['publicmessage'];?></td>
              
                </tr>
                <?php endwhile;?>
            </table>
</center>
<br>
</div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzvm4okef5qU3vTXt-HVtLNeMxQvFhl6M&callback=initMap">
    </script>
</html>



