<?php
//Created files are different than those created by eurostat api, saves them as: "Data*country full name*.Json"
class WriteJson
{
    public function write($data)
    {
        $filePath = "./files/Data" . $data["Name"] . ".json";
        $json = json_encode($data);
        file_put_contents($filePath, $json);
    }
}