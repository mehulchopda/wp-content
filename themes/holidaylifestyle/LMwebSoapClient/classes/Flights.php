<?php

class Flights {

    private $flights;
    private $flightList;
    private $mw;
    private $offerBegin;
    private $offerEnd;
    private $offers;
    private $page;
    private $sf;

    function __construct() {
        
    }

    public function getFlights() {
        return $this->flights;
    }

    public function setFlights($flights) {
        $this->flights = $flights;
    }

    public function getFlightList() {
        return $this->flightList;
    }

    public function setFlightList($flightList) {
        $this->flightList = $flightList;
    }

    public function getMw() {
        return $this->mw;
    }

    public function setMw($mw) {
        $this->mw = $mw;
    }

    public function getOfferBegin() {
        return $this->offerBegin;
    }

    public function setOfferBegin($offerBegin) {
        $this->offerBegin = $offerBegin;
    }

    public function getOfferEnd() {
        return $this->offerEnd;
    }

    public function setOfferEnd($offerEnd) {
        $this->offerEnd = $offerEnd;
    }

    public function getOffers() {
        return $this->offers;
    }

    public function setOffers($offers) {
        $this->offers = $offers;
    }

    public function getPage() {
        return $this->page;
    }

    public function setPage($page) {
        $this->page = $page;
    }

    public function getSf() {
        return $this->sf;
    }

    public function setSf($sf) {
        $this->sf = $sf;
    }

    public function setParamsByArray($flights) {
        foreach ($flights as $key => $value) {
            if (property_exists($this, $key) && $key != 'flightList') {
                $this->$key = $value;
            }
        }
    }

}

?>
