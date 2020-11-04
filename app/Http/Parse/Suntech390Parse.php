<?php
namespace App\Http\Parse;

use App\Models\Position;

class Suntech390Parse
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

    public static function sttMapObject($string)
    {
        $sttSplited = explode(';', $string);

        $map = new Position();
        $map->setHeader($sttSplited[0]);
        $map->setDeviceId($sttSplited[1]);
        $map->setModel($sttSplited[2]);
        $date = \DateTime::createFromFormat(
            'Y-m-d H:i:s', self::getDate($sttSplited[3]) . " " . $sttSplited[4]
        );
        $date->setTimezone(new \DateTimeZone('america/sao_paulo'));
        $date->sub(new \DateInterval('PT2H'));
        $map->setDate($date);
        $map->setCell($sttSplited[5]);
        $map->setLat($sttSplited[6]);
        $map->setLon($sttSplited[7]);
        $map->setSpeed($sttSplited[8]);
        $map->setCourse($sttSplited[9]);
        $map->setSatt($sttSplited[10]);
        $map->setFixGps($sttSplited[11]);
        $map->setDistance($sttSplited[12]);
        $map->setVoltage($sttSplited[13]);
        $map->setInputOutput($sttSplited[14]);
        $map->setMode($sttSplited[15]);
        $map->setMsgNum($sttSplited[16]);
        $map->setHourMeter($sttSplited[17]);
        $map->setBattery($sttSplited[18]);

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
