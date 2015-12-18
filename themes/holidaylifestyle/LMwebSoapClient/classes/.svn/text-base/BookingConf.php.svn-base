<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BookingConf
 *
 * @author daniela
 */
class BookingConf {

    private $apta;
    private $aptz;
    private $cat;
    private $city;
    private $date;
    private $days;
    private $departure;
    private $destination;
    private $giata;
    private $gprice;
    private $hotel;
    private $info;
    private $lc;
    private $lstg;
    private $mt;
    private $page;
    private $pic;
    private $sf;
    private $tourOpName;
    private $tourOperator;
    private $uc;
    private $vgnr;
    private $vvgnr;

    function __construct() {
        
    }

    public function getApta() {
        return $this->apta;
    }

    public function setApta($apta) {
        $this->apta = $apta;
    }

    public function getAptz() {
        return $this->aptz;
    }

    public function setAptz($aptz) {
        $this->aptz = $aptz;
    }

    public function getCat() {
        return $this->cat;
    }

    public function setCat($cat) {
        $this->cat = $cat;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getDays() {
        return $this->days;
    }

    public function setDays($days) {
        $this->days = $days;
    }

    public function getDeparture() {
        return $this->departure;
    }

    public function setDeparture($departure) {
        $this->departure = $departure;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function setDestination($destination) {
        $this->destination = $destination;
    }

    public function getGiata() {
        return $this->giata;
    }

    public function setGiata($giata) {
        $this->giata = $giata;
    }

    public function getGprice() {
        return $this->gprice;
    }

    public function setGprice($gprice) {
        $this->gprice = $gprice;
    }

    public function getHotel() {
        return $this->hotel;
    }

    public function setHotel($hotel) {
        $this->hotel = $hotel;
    }

    public function getInfo() {
        return $this->info;
    }

    public function setInfo($info) {
        $this->info = $info;
    }

    public function getLc() {
        return $this->lc;
    }

    public function setLc($lc) {
        $this->lc = $lc;
    }

    public function getLstg() {
        return $this->lstg;
    }

    public function setLstg($lstg) {
        $this->lstg = $lstg;
    }

    public function getMt() {
        return $this->mt;
    }

    public function setMt($mt) {
        $this->mt = $mt;
    }

    public function getPage() {
        return $this->page;
    }

    public function setPage($page) {
        $this->page = $page;
    }

    public function getPic() {
        return $this->pic;
    }

    public function setPic($pic) {
        $this->pic = $pic;
    }

    public function getSf() {
        return $this->sf;
    }

    public function setSf($sf) {
        $this->sf = $sf;
    }

    public function getTourOpName() {
        return $this->tourOpName;
    }

    public function setTourOpName($tourOpName) {
        $this->tourOpName = $tourOpName;
    }

    public function getTourOperator() {
        return $this->tourOperator;
    }

    public function setTourOperator($tourOperator) {
        $this->tourOperator = $tourOperator;
    }

    public function getUc() {
        return $this->uc;
    }

    public function setUc($uc) {
        $this->uc = $uc;
    }

    public function getVgnr() {
        return $this->vgnr;
    }

    public function setVgnr($vgnr) {
        $this->vgnr = $vgnr;
    }

    public function getVvgnr() {
        return $this->vvgnr;
    }

    public function setVvgnr($vvgnr) {
        $this->vvgnr = $vvgnr;
    }

    public function setParamsByArray($bookingConf) {
        foreach ($bookingConf as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function getParamsAsArray() {
        $array = get_class_vars("BookingConf");

        foreach ($array as $key => $value) {
            if ($this->existParam($key)) {
                $array[$key] = $this->$key;
            } else {
                unset($array[$key]);
            }
        }

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
