<?php
//Takes filename with file extension like: "DataItaly.xml"
//!!!Handles only files created by WriteXML.php!!!
class ReadXML
{
    function ReadData($fileName)
    {
        $filePath = "./files/" . $fileName;
        $xml = simplexml_load_file($filePath);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        $result = array(array());
        $data = array();
        foreach($array["aData"] as $k => $v)
        {
            array_push($data, $v);
        }
        $result[0] = [
            "Name" => $array["aName"],
            "Data" => $data
        ];
        return $result;
    }
}
