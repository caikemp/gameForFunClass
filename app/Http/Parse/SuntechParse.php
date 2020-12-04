<?php 

namespace App\Http\Parse;

class SuntechParse{
    
    public static function splitString($stt){
        return explode(';', $stt);

    }

    public static function getModel($stt){
        $splitString = self::splitString($stt);
        return $splitString[2];

    }
};

