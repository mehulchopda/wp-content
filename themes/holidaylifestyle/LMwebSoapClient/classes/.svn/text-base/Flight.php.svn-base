<?php

class Flight {
    
    private $back;
    private $bday;
    private $date;
    private $days;
    private $departure;
    private $destination;
    private $price;
    private $ref;
    private $region;
    private $source;
    private $tlca;
    private $tlcz;
    private $to;
    private $tourOperator;
    private $gPrice;

    function __construct() {
        
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

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function getSource() {
        return $this->source;
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function getTlca() {
        return $this->tlca;
    }

    public function setTlca($tlca) {
        $this->tlca = $tlca;
    }

    public function getTlcz() {
        return $this->tlcz;
    }

    public function setTlcz($tlcz) {
        $this->tlcz = $tlcz;
    }

    public function getTo() {
        return $this->to;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function getTourOperator() {
        return $this->tourOperator;
    }

    public function setTourOperator($tourOperator) {
        $this->tourOperator = $tourOperator;
    }

    public function getGPrice() {
        return $this->gPrice;
    }

    public function setGPrice($gPrice) {
        $this->gPrice = $gPrice;
    }

    public function setParamsByArray($flights) {
        foreach ($flights as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}

?>
