<?php

class Destination {

    private $airTemp;
    private $cityGiataList;
    private $flightTime;
    private $gprice;
    private $name;
    private $price;
    private $ref;
    private $regionGiataList;
    private $src;
    private $waterTemp;

    function __construct() {
        
    }

    public function getAirTemp() {
        return $this->airTemp;
    }

    public function setAirTemp($airTemp) {
        $this->airTemp = $airTemp;
    }

    public function getCityGiataList() {
        return $this->cityGiataList;
    }

    public function setCityGiataList($cityGiataList) {
        $this->cityGiataList = $cityGiataList;
    }

    public function getFlightTime() {
        return $this->flightTime;
    }

    public function setFlightTime($flightTime) {
        $this->flightTime = $flightTime;
    }

    public function getGprice() {
        return $this->gprice;
    }

    public function setGprice($gprice) {
        $this->gprice = $gprice;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getRef() {
        return $this->ref;
    }

    public function setRef($ref) {
        $this->ref = $ref;
    }

    public function getRegionGiataList() {
        return $this->regionGiataList;
    }

    public function setRegionGiataList($regionGiataList) {
        $this->regionGiataList = $regionGiataList;
    }

    public function getSrc() {
        return $this->src;
    }

    public function setSrc($src) {
        $this->src = $src;
    }

    public function getWaterTemp() {
        return $this->waterTemp;
    }

    public function setWaterTemp($waterTemp) {
        $this->waterTemp = $waterTemp;
    }

    public function setParamsByArray($array) {
        foreach ($array as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function getParamsAsArray() {
        $array = array();

        if ($this->existParam('airTemp'))
            $array['airTemp'] = $this->airTemp;
        if ($this->existParam('cityGiataList'))
            $array['cityGiataList'] = $this->cityGiataList;
        if ($this->existParam('flightTime'))
            $array['flightTime'] = $this->flightTime;
        if ($this->existParam('gprice'))
            $array['gprice'] = $this->gprice;
        if ($this->existParam('name'))
            $array['name'] = $this->name;
        if ($this->existParam('price'))
            $array['price'] = $this->price;
        if ($this->existParam('ref'))
            $array['ref'] = $this->ref;
        if ($this->existParam('regionGiataList'))
            $array['regionGiataList'] = $this->regionGiataList;
        if ($this->existParam('src'))
            $array['src'] = $this->src;
        if ($this->existParam('waterTemp'))
            $array['waterTemp'] = $this->waterTemp;

        return $array;
    }

    public function existParam($name) {
        if (!is_array($this->$name)) {
            $existParam = $this->$name != null || $this->$name != '';
        } else {
            $existParam = false;
            foreach ($this->$name as $value) {
                $existParam = $existParam || $value != null || $value != '';
            }
        }
        return $existParam;
    }

}

?>
