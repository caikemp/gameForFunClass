<?php

namespace App\Http\Services;

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
        $array2 = array(['gender' => 'Macho', 'name' => 'Caike', 'age' => 36]);

        return [
            "array1" => $array1,
            "array2" => $array2,
            "siteName1" => $siteName1,
            "siteName2" => $siteName2,
            'test' => $text,
        ];
    }
}
