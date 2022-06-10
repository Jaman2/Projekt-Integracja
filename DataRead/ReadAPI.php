<?php

class ReadAPI
{
    //Takes short country names like PL, DE, IT etc.
    public function ReadData($shortenCountry)
    {
        $ch = curl_init();
        $url = "https://ec.europa.eu/eurostat/api/dissemination/sdmx/2.1/data/PRC_HICP_MIDX/M.I15.CP041.".$shortenCountry."/?format=JSON&lang=en&startPeriod=2019-03&endPeriod=2021-03";
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        $array = json_decode($result, true);
        $name = array_values([$array["dimension"]["geo"]["category"]["label"]][0])[0];
        $data = array_values($array["value"]);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = strval($data[$i]);
        }
        $temp = [
            "Name" => $name,
            "Data" => $data
        ];
        $output = array($temp);
        return $output;
    }
}
