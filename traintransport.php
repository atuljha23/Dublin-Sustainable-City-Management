<?php


class train
{

private $id;
private $trainttatus;
private $trainlatitude;
private $trainlongitude;
private $traindate;
private $publicmessage;
private $direction;
private $conn;
private $tableName="dtrain";

function setId($id) { $this->id = $id; }
function getId() { return $this->id; }
function setTrainttatus($trainttatus) { $this->trainttatus = $trainttatus; }
function getTrainttatus() { return $this->trainttatus; }
function setTrainlatitude($trainlatitude) { $this->trainlatitude = $trainlatitude; }
function getTrainlatitude() { return $this->trainlatitude; }
function setTrainlongitude($trainlongitude) { $this->trainlongitude = $trainlongitude; }
function getTrainlongitude() { return $this->trainlongitude; }
function setTraindate($traindate) { $this->traindate = $traindate; }
function getTraindate() { return $this->traindate; }
function setPublicmessage($publicmessage) { $this->publicmessage = $publicmessage; }
function getPublicmessage() { return $this->publicmessage; }
function setDirection($direction) { $this->direction = $direction; }
function getDirection() { return $this->direction; }


public function __construct() {
			require_once('db/DbConnect.php');
			$conn = new DbConnect;
			$this->conn = $conn->connect();

		}







public function getTrainLatLng() {
			$sql = "SELECT * FROM $this->tableName";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);

		}






}



?>
