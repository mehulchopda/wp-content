<?php

include_once 'Destination.php';

class Region {

    private $cityGiataList;
    private $gprice;
    private $name;
    private $price;
    private $ref;
    private $regionGiataList;
    private $src;
    private $dstList;
    private $regionCode;

    function __construct() {
        
    }

    public function getCityGiataList() {
        return $this->cityGiataList;
    }

    public function setCityGiataList($cityGiataList) {
        $this->cityGiataList = $cityGiataList;
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

    public function getDstList() {
        return $this->dstList;
    }

    public function setDstList($dstList) {
        $this->dstList = $dstList;
    }

    public function getRegionCode() {
        return $this->regionCode;
    }

    public function setRegionCode($regionCode) {
        $this->regionCode = $regionCode;
    }

    public function setParamsByArray($array) {
        foreach ($array as $regionKey => $regionValue) {
            if (property_exists($this, $regionKey)) {
                if (in_array($regionKey, array('ref', 'regionGiataList', 'dstList'))) {
                    if ($regionKey == 'dstList') {
                        $this->$regionKey = array();
                        if (is_array($regionValue)) {
                            foreach ($regionValue as $dstValue) {
                                $dst = new Destination();
                                $dst->setParamsByArray($dstValue);
                                array_push($this->$regionKey, $dst);
                            }
                        } else {
                            $dst = new Destination();
                            $dst->setParamsByArray($regionValue);
                            array_push($this->$regionKey, $dst);
                        }
                    } else {
                        $this->$regionKey = explode(' ', $regionValue);
                    }
                } else {
                    $this->$regionKey = $regionValue;
                }
            }
        }
    }

    public function getParamsAsArray() {
        $array = array();

        if ($this->existParam('cityGiataList'))
            $array['cityGiataList'] = $this->cityGiataList;
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
        if ($this->existParam('dstList'))
            $array['dstList'] = $this->dstList;
        if ($this->existParam('regionCode'))
            $array['regionCode'] = $this->regionCode;

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
