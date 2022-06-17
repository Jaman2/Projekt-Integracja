<?php
include_once './dataRead/ReadDB.php';
include_once './dataRead/ReadJson.php';
include_once './dataRead/ReadXML.php';
include_once './dataRead/ReadAPI.php';
include_once './dataWrite/WriteXML.php';
include_once './dataWrite/WriteJson.php';
include_once './dataWrite/WriteDB.php';

$api = new ReadAPI();
$data3 = $api->ReadData("IT");
var_dump($data3);
$xml = new ReadXML();
$data = $xml -> ReadData();
var_dump($data);
$Wjson = new WriteJson();
$Wjson -> write($data3);
$json = new ReadJson();
$data2 = $json -> ReadData();
echo"<br/> data from json <br/>";
var_dump($data2);