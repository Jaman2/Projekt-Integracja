<?php
include_once './dataRead/ReadDB.php';
include_once './dataRead/ReadJson.php';
include_once './dataRead/ReadXML.php';
include_once './dataRead/ReadAPI.php';
include_once './dataWrite/WriteXML.php';
include_once './dataWrite/WriteJson.php';
include_once './dataWrite/WriteDB.php';


$json = new ReadJson();
$data2 = $json -> ReadData();
echo"<br/> data from json <br/>";
var_dump($data2);
$Wdb = new WriteDB();
$Wdb -> Write($data2[0]);
$db = new ReadDataDB();
$data = $db -> ReadData();
echo "<br/>";
echo "<br/>";
echo "<br/>";
var_dump($data);
echo "<br/>";
echo "<br/>";
echo "<br/>";