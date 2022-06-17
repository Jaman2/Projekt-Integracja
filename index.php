<html>
<head>
<script src=
    "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
        </script>
</head>
<body>
<?php
include_once './dataRead/ReadDB.php';
include_once './dataRead/ReadJson.php';
include_once './dataRead/ReadXML.php';
include_once './dataRead/ReadAPI.php';
include_once './dataWrite/WriteXML.php';
include_once './dataWrite/WriteJson.php';
include_once './dataWrite/WriteDB.php';
?>
<h1> Miesięczny indeks wartości czynszu przed i w trakcie pandemii Covid-19 w wybranych państwach Europy </h1>
Wczytanie z bazy danych:
<?php
$db = new ReadDataDB();
//var_dump($db->ReadData());
$fromDB = $db->ReadData();
?>
<br>
<?php
$dates = array('2019-03','2019-04','2019-05','2019-06','2019-07','2019-08','2019-09','2019-10','2019-11','2019-12','2020-01','2020-02','2020-03','2020-04','2020-05','2020-06','2020-07','2020-08','2020-09','2020-10','2020-11','2020-12','2021-01','2021-02','2021-03');
foreach($dates as $key=>$value){
    echo "<input type='button' value='".$value."' onclick='(setMonth($key))'/>" ;
}
?>
<br>

<?php 
foreach($fromDB as $key => $value){
echo "Dane dla kraju <span id='country" .($key)."'> </span> dla miesiąca <span id='month".($key)."'></span>: <span id='price".($key)."'> </span>";
echo "<br>";
} 

$json = new ReadJson();
$dataJsonIT = $json->ReadData("DataItaly.json");

//var_dump($dataJson);
?>
<br>
Wczytanie z pliku JSON:
<br>
<?php
echo "<input type='button' value='Wczytaj dane JSON' onclick='LoadJSON()'/>";
?>
<br>
Dane z każdego miesiąca dla państwa <span id="JSONCountryName"></span>

<?php
echo "<br>| ";
foreach($dates as $key => $value){
    echo $value.": <span id='dataJSON".$key."'></span> | ";
    if($value == "2019-12" || $value == "2020-12" ){
    echo "<br>| ";
    }
}
?>
<br>
<br>
Wczytanie z API:
<br>
<?php
echo "<input type='button' value='Wczytaj dane z API' onclick='LoadAPI()'/>";
?>
<br>
<?php
$api = new ReadAPI();
$APIData = $api->ReadData("PL");
//var_dump($api->ReadData("FR"));
?>
Dane z każdego miesiąca dla państwa <span id="APICountryName"></span>

<?php
echo "<br>| ";
foreach($dates as $key => $value){
    echo $value.": <span id='dataAPI".$key."'></span> | ";
    if($value == "2019-12" || $value == "2020-12" ){
    echo "<br>| ";
    }
}
?>

<br>
<br>
Wczytanie z XML:
<br>
<?php
echo "<input type='button' value='Wczytaj dane z XMLa' onclick='LoadXML()'/>";
?>
<br>
<?php
$xml2 = new ReadXML();
$XMLData = $xml2->ReadData();
//var_dump($xml2->ReadData("DataItaly.xml"));
?>
Dane z każdego miesiąca dla państwa <span id="XMLCountryName"></span>

<?php
echo "<br>| ";
foreach($dates as $key => $value){
    echo $value.": <span id='dataXML".$key."'></span> | ";
    if($value == "2019-12" || $value == "2020-12" ){
    echo "<br>| ";
    }
}
// ?>
// <br>
// <br>
// Zapis do JSON:
// <?php
// $json2 = new WriteJson();
// $json2->write($APIData[0]);
// ?>
// <br>
// <br>
// Zapis do XML:
// <?php
// $xml = new WriteXML();
// $xml->write($APIData[0]);
// ?>
// <br>
// <br>
// Zapis do bazy danych:
// <?php
// $db2 = new WriteDB();
// $db2->write($APIData[0]);
// ?>


<script>
var DbData = <?php echo json_encode($fromDB) ?>;
var Months = <?php echo json_encode($dates) ?>

for(var i = 0; i< DbData.length;i++){
document.getElementById("country"+i).innerHTML = DbData[i]['Name'];
document.getElementById("month"+i).innerHTML = Months[0];
document.getElementById("price"+i).innerHTML = DbData[i]['Data'][0];
}

function setMonth(num){
    
    for(var i = 0; i<DbData.length;i++){
    document.getElementById("price"+i).innerHTML = DbData[i]['Data'][num];
    document.getElementById("month"+i).innerHTML = Months[num];
    }
}


var JSONDataIT = <?php echo json_encode($dataJsonIT)?>;
function LoadJSON(){
    document.getElementById("JSONCountryName").innerHTML= JSONDataIT[0]['Name'];
    for(var i = 0; i<JSONDataIT[0]['Data'].length;i++){
        document.getElementById("dataJSON"+i).innerHTML=JSONDataIT[0]['Data'][i];
    }
}

var APIData = <?php echo json_encode($APIData); ?>;
function LoadAPI(){
    document.getElementById("APICountryName").innerHTML=APIData[0]['Name'];
    for(var i = 0; i<APIData[0]['Data'].length;i++){
        document.getElementById("dataAPI"+i).innerHTML=APIData[0]['Data'][i];
    }
}

var XMLData = <?php echo json_encode($XMLData);?>;
function LoadXML(){
    document.getElementById("XMLCountryName").innerHTML=XMLData[0]['Name'];
    for(var i = 0; i<XMLData[0]['Data'].length;i++){
        document.getElementById("dataXML"+i).innerHTML=XMLData[0]['Data'][i];
    }
}

</script>


</body>

</html>