<?php

namespace App\Http\Services;

use App\Http\Parse\Suntech390Parse;

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
        $stt = "SA200STT;076224;319G;20201002;17:00:53;1b8716;-26.933027;-049.137015;000.000;327.94;13;1;127918978;12.86;100000;2;4438;020292;4.1;1";

        foreach ($stores as $key => $store) {
            $store->name = strtoupper($store->name);
            $store->now = (new \Datetime())->format("Y-m-d H:i:s");
            $store->stt = $stt;
            $store->sttSplited = Suntech390Parse::sttMapObject($stt);
        }

        return $stores;
    }

}
