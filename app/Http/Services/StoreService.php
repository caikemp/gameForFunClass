<?php

namespace App\Http\Services;

use App\Http\Parse\Suntech390Parse;
use App\Http\Parse\Suntech310Parse;
use App\Http\Parse\SuntechParse;


class StoreService
{
    public static function index()
    {

        $url = "www.gamesforfun.com.br";
        $siteName1 = "$url Games for fun!";
        $siteName2 = 'Games for fun!';
        $text = <<<STRING
         {
            "siteName1": "www.gamesforfun.com.br Games for fun's!",
            "siteName2": "$url",
            "stores": {
              "current_page": 1,
              "data": [],
            }
          }
        STRING;

        $array1 = ['gender' => 'Macho', 'name' => 'Caike', 'age' => 36];
        $array2 = array(['gender' => 'Mui Macho', 'name' => 'El loco', 'age' => 36]);

        for ($i = 0; $i < 10; $i++) {
            $array1["key_$i"] = "value_$i";
        }

        $result = array_merge($array1, $array2);

        return [
            "array1" => $array1,
            "array2" => $array2,
            "result" => $result,
            "siteName1" => $siteName1,
            "siteName2" => $siteName2,
        ];
    }

    public static function fillEmptyDates($stores)
    {
        $stt = 'SA200STT;403307;313F;20201102;10:02:57;dbc15;-20.729172;-048.057617;030.132;037.62;10;1;13960610;14.03;100000;2;4455;027081;4.2;1';

        foreach ($stores as $key => $store) {
            $store->name = strtoupper($store->name);
            $store->now = (new \Datetime())->format("Y-m-d H:i:s");
            $store->stt = $stt;
            $store->sttSplited = self::validateModel($stt);
        }
        return $stores;
    }


    public static function validateModel($stt){

        $model = SuntechParse::getModel($stt);

        switch ($model) {
            case '319':
                return Suntech390Parse::sttMapObject($stt);
               

            case '3080':
                return Suntech310Parse::sttMapObject($stt);
                
            default:
                return "Modelo não implementado! ";               
        }
        return $stt;
    }
}




    

 
