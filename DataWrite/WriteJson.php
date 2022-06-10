<?php
class WriteJson
{
    public function write($data)
    {
        $filePath = "./files/Data" . $data["Name"] . ".json";
        $json = json_encode($data);
        file_put_contents($filePath, $json);
    }
}