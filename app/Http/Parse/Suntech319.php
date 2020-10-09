<?php
namespace App\Http\Parse;

class Suntech319
{
    private $header;
    private $deviceId;
    private $model;
    private $date;
    private $lat;
    private $lon;

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

    public function toArray()
    {
        return [
            'header' => $this->header,
            'deviceId' => $this->deviceId,
        ];

    }

    public function toString()
    {
        return "$this->header;$this->deviceId";

    }

}
