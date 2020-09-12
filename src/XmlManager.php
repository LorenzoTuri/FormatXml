<?php

namespace Lturi\FormatXml;

class XmlManager {
    /**
     * @param $xmlInput
     *
     * @return false|string
     */
    public function format($xmlInput) {
        $doc = new \DOMDocument('1.0');
        $doc->loadXML($xmlInput);
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;
        return $doc->saveXML();
    }
}