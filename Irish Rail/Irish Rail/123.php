
<!DOCTYPE html>
<html>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transportation";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}







	

$sql1 = "DELETE FROM dtrain WHERE trainttatus='N'";
$conn->query($sql1) ;
$sql1 = "DELETE FROM dtrain WHERE trainttatus='T'";
$conn->query($sql1) ;
$sql1 = "DELETE FROM dtrain WHERE trainttatus='R'";
$conn->query($sql1) ;








$xml=simplexml_load_file("http://api.irishrail.ie/realtime/realtime.asmx/getCurrentTrainsXML") or die("Error: Cannot create object");

$count=$xml->count();

foreach ($xml as $person) {

$iTrainStatus=$person->TrainStatus;
$iTrainLatitude=$person->TrainLatitude;
$iTrainLongitude=$person->TrainLongitude;
$iTrainDate=$person->TrainDate;
$iTrainCode=$person->TrainCode;
$iPublicMessage=$person->PublicMessage;
$iDirection=$person->Direction;

$sql = "INSERT INTO dtrain (trainttatus,trainlatitude,trainlongitude,traindate,traincode,publicmessage,direction) VALUES ('$iTrainStatus','$iTrainLatitude','$iTrainLongitude','$iTrainDate','$iTrainCode','$iPublicMessage','$iDirection')";
if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}

echo $count;


?>

</body>
</html>

