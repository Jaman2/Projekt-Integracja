<?php

class ReadJson
{
    public function ReadData($fileName)
    {
        $filePath = "./files/" . $fileName;
        $file = file_get_contents($filePath) or die("Pliku nie znaleziono!");
        $array = json_decode($file, true);
        if ($array["Name"]) {
            $name = $array["Name"];
            $data = $array["Data"];
        } else {
            $name = array_values([$array["dimension"]["geo"]["category"]["label"]][0])[0];
            $data = array_values($array["value"]);
            for ($i = 0; $i < count($data); $i++) {
                $data[$i] = strval($data[$i]);
            }
        }
        $temp = [
            "Name" => $name,
            "Data" => $data
        ];
        $output = array($temp);
        return $output;
    }
}
