<?php
namespace MasjidApp\Helpers;

use DOMDocument;
use DOMXPath;

class DOMHelper {
    public static function domParser($string, $expression, $find){
        $doc = new DOMDocument();
        $doc->loadHTML($string);
        $selector = new DOMXPath($doc);
        $result = $selector->query($expression);
        $arr = array();
        foreach ($result as $node){
            $arr[] = $node->getAttribute($find);
        }

        //return array
        return $arr;
    }
}