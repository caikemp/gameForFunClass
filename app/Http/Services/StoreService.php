<?php

namespace App\Http\Services;

use App\Http\Parse\Suntech319;

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
            //  1
            $array1["key_$i"] = "value_$i";
            // array_push($array1, "value_$i");
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
            $store->sttSplited = self::sttMapObject($stt);
        }

        return $stores;
    }

    public static function sttArrayMap($string)
    {
        $sttSplited = explode(';', $string);
        $map = [];
        $map['header'] = $sttSplited[0];
        $map['deviceId'] = $sttSplited[1];
        $map['model'] = $sttSplited[2];
        $map['date'] = $sttSplited[3] . " " . $sttSplited[4];
        $map['cell'] = $sttSplited[5];
        $map['lat'] = $sttSplited[6];
        $map['lon'] = $sttSplited[7];
        $map['speed'] = $sttSplited [8];
        $map['course'] = $sttSplited [9];    #Course on the ground in degree
        $sat['satt'] = $sttSplited [10];
        $sat['fixGps'] = $sttSplited [11];
        $sat['distance']= $sttSplited[12];
        $map['voltage'] = $sttSplited[13]; 
        $map['inputOutput'] = $sttSplited[14];
        $map['mode'] = $sttSplited[15];
        $map['msgNum'] = $sttSplited[16];
        $map['hourMeter'] = $sttSplited [17];
        $map['battery'] = $sttSplited;

        return $map;
    }

    public static function sttMapObject($string)
    {
        $sttSplited = explode(';', $string);

        $map = new Suntech319();
        $map->setHeader($sttSplited[0]);
        $map->setDeviceId($sttSplited[1]);
        $date = \DateTime::createFromFormat(
            'Y-m-d H:i:s', self::getDate($sttSplited[3]) . " " . $sttSplited[4]
        );
        $date->setTimezone(new \DateTimeZone('america/sao_paulo'));
        $date->sub(new \DateInterval('PT2H'));
        $map->setDate($date);

        return $map->toArray();
    }

    public static function getDate($str)
    {
        $date = substr($str, 0, 4);
        $date .= '-' . substr($str, 4, 2);
        $date .= '-' . substr($str, 6, 2);
        return $date;
    }
}
