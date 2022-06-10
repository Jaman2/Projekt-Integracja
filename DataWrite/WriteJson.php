<?php
class WriteJson
{
    public function write($data)
    {
        $filePath = "./files/Data" . $data[0]["Name"] . ".json";
        $json = json_encode($data[0]);
        file_put_contents($filePath, $json);
    }
}