<?php

class Date {

    private $aptd;
    private $back;
    private $bday;
    private $date;
    private $days;
    private $depFlight;
    private $departure;
    private $price;
    private $ref;
    private $refFlight;
    private $rq;
    private $source;
    private $to;
    private $gPrice;

    function __construct() {
        
    }

    public function getAptd() {
        return $this->aptd;
    }

    public function setAptd($aptd) {
        $this->aptd = $aptd;
    }

    public function getBack() {
        return $this->back;
    }

    public function setBack($back) {
        $this->back = $back;
    }

    public function getBday() {
        return $this->bday;
    }

    public function setBday($bday) {
        $this->bday = $bday;
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

    public function getDepFlight() {
        return $this->depFlight;
    }

    public function setDepFlight($depFlight) {
        $this->depFlight = $depFlight;
    }

    public function getDeparture() {
        return $this->departure;
    }

    public function setDeparture($departure) {
        $this->departure = $departure;
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

    public function getRefFlight() {
        return $this->refFlight;
    }

    public function setRefFlight($retFlight) {
        $this->refFlight = $retFlight;
    }

    public function getRq() {
        return $this->rq;
    }

    public function setRq($rq) {
        $this->rq = $rq;
    }

    public function getSource() {
        return $this->source;
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function getGPrice() {
        return $this->gPrice;
    }

    public function setGPrice($gPrice) {
        $this->gPrice = $gPrice;
    }

    public function setParamsByArray($dates) {
        foreach ($dates as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>
