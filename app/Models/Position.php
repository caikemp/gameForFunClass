<?php
namespace App\Models;

class Position
{
    private $header;
    private $deviceId;
    private $model;
    private $date;
    private $cell;
    private $lat;
    private $lon;
    private $speed;
    private $course;
    private $satt;
    private $fixGps;
    private $distance;
    private $voltage;
    private $inputOutput;
    private $mode;
    private $msgNum;
    private $hourMeter;
    private $battery;

    public function setHeader($header)
    {
        $this->header = $header;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setDeviceId($deviceId)
    {
        $this->deviceId = $deviceId;
    }

    public function getDeviceId()
    {
        return $this->deviceId;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getCell()
    {
        return $this->cell;
    }

    public function setCell($cell)
    {
        $this->cell = $cell;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    public function getLon()
    {
        return $this->lon;
    }
    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    public function getSpeed()
    {
        return $this->speed;
    }
    public function setSpeed($speed)
    {
        $this->speed = $speed;
    }

    public function getCourse()
    {
        return $this->course;
    }
    public function setCourse($course)
    {
        $this->course = $course;
    }

    public function getSatt()
    {
        return $this->satt;
    }
    public function setSatt($satt)
    {
        $this->satt = $satt;
    }

    public function getFixGps()
    {
        return $this->fixGps;
    }
    public function setFixGps($fixGps)
    {
        $this->fixGps = $fixGps;
    }

    public function getDistance()
    {
        return $this->distance;
    }
    public function setDistance($distance)
    {
        $this->distance = $distance;
    }

    public function getVoltage()
    {
        return $this->voltage;
    }
    public function setVoltage($voltage)
    {
        $this->voltage = $voltage;
    }

    public function getInputOutput()
    {
        return $this->inputOutput;
    }
    public function setInputOutput($inputOutput)
    {
        $this->inputOutput = $inputOutput;
    }

    public function getMode()
    {
        return $this->mode;
    }
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    public function getMsgNum()
    {
        return $this->msgNum;
    }
    public function setMsgNum($msgNum)
    {
        $this->msgNum = $msgNum;
    }

    public function getHourMeter()
    {
        return $this->hourMeter;
    }
    public function setHourMeter($hourMeter)
    {
        $this->hourMeter = $hourMeter;
    }

    public function getBatttery()
    {
        return $this->battery;
    }
    public function setBattery($battery)
    {
        $this->battery = $battery;
    }

    public function toArray()
    {
        return [
            'header' => $this->header,
            'model' => $this->model,
            'deviceId' => $this->deviceId,
            'date' => $this->date,
            'cell' => $this->cell,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'speed' => $this->speed,
            'course' => $this->course,
            'satt' => $this->satt,
            'fixGps' => $this->fixGps,
            'distance' => $this->distance,
            'voltage' => $this->voltage,
            'inputOutput' => $this->inputOutput,
            'mode' => $this->mode,
            'msgNum' => $this->msgNum,
            'hourMeter' => $this->hourMeter,
            'battery' => $this->battery,
        ];

    }
    public function toString()
    {
        return "$this->header;$this->deviceId";

    }

}
