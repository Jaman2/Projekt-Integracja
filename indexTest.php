<?php
include_once './dataRead/ReadDB.php';
include_once './dataRead/ReadJson.php';
include_once './dataRead/ReadXML.php';
include_once './dataRead/ReadAPI.php';
include_once './dataWrite/WriteXML.php';
include_once './dataWrite/WriteJson.php';
include_once './dataWrite/WriteDB.php';


$xml = new ReadXML();
$data = $xml -> ReadData();
var_dump($data);
$Wxml = new WriteXML();
$Wxml -> write($data);
