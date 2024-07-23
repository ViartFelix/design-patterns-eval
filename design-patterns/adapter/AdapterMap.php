<?php

require_once "./ExternalMap.php";
require_once "./Imap.php";

class AdapterMap implements Imap
{
    private ExternalMap $externalMap;

    public function __construct($externalMap)
    {
        $this->externalMap = $externalMap;
    }

    public function getPosition($lat, $lon)
    {
        $pos = new stdClass();
        $pos->lat = $lat;
        $pos->lon = $lon;

        return $this->externalMap->getLocation($pos);
        // TODO: Implement getPosition() method.
    }

    public function searchByCity($city)
    {
        // TODO: Implement searchByCity() method.
    }
}