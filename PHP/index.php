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


// Creating a Reset button

if(isset($_POST['reset']))
{
  $query = "SELECT * FROM `dtrain`";
  $search_result = filterTable($query);

}

// End of Script

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
    background-color: #fff;

}
#centering{
    position: relative;
}
#map{
    height:100%;
    width:100%;


}

table, th, td {
  border: 1px solid black;
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button2 {
  background-color: #ff0000; /* Red */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button5:hover {
  background-color: #555555;
  color: white;
}

#allData{
display:none;
}

</style>

</head>

<body>
</body>
<div id="container">
<div style="text-align:center;border:1px solid blue;">
        <form action="irishrail.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Enter The Train Code Here......."><br><br>
            <input type="submit" name="search" class="button button5" value="Filter"><br><br>



        </form>
</div>
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
<div style="text-align:center">
  <form action="irishrail.php" method="post">
<input type="submit" name="reset" class="button2 button5" value="Reset"><br><br>
</form>
<div>
<br>
</div>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzvm4okef5qU3vTXt-HVtLNeMxQvFhl6M&callback=initMap">
    </script>
</html>
