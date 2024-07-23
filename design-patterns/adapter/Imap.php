<?php

interface Imap
{
    public function getPosition($lat, $lon);
    public function searchByCity($city);
}