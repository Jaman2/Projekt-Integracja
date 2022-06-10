<?php
class WriteXML
{
    function getXMLFromObjectsList($array, $rootElement = null, $xml = null)
    {
        $_xml = $xml;

        if ($_xml === null) {
            $_xml = new SimpleXMLElement($rootElement !== null ? $rootElement : "<data/>");
        }
        foreach ($array as $k => $v) {
            $ks = "a".$k."";
            if (is_array($v)) {
                (new WriteXML)->getXMLFromObjectsList($v, $ks, $_xml->addChild($ks));
            } else {
                $_xml->addChild($ks, $v);
            }
        }
        return $_xml->asXML();
    }
    function write($data)
    {
        $filePath = "./files/Data" . $data[0]["Name"] . ".xml";

        if ($data != null) {
            $xml = (new WriteXML)->getXMLFromObjectsList($data[0], "<data/>");
            file_put_contents($filePath, $xml);
        }
    }
}
