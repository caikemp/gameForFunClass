<?php
namespace App\Http\Parse;

use App\Http\Parse\Suntech390Parse;

class Suntech310Parse extends Suntech390Parse
{

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
        $map['speed'] = $sttSplited[8];
        $map['course'] = $sttSplited[9]; #Course on the ground in degree
        $sat['satt'] = $sttSplited[10];
        $sat['fixGps'] = $sttSplited[11];
        $sat['distance'] = $sttSplited[12];
        $map['voltage'] = $sttSplited[13];
        $map['inputOutput'] = $sttSplited[14];
        $map['mode'] = $sttSplited[15];
        $map['msgNum'] = $sttSplited[16];
        $map['hourMeter'] = $sttSplited[17];
        $map['battery'] = $sttSplited;

        return $map;
    }

}
