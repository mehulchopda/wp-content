<?php

class Offer {
    private $cat;
    private $city;
    private $days;
    private $dlc;
    private $giata;
    private $gid;
    private $gprice;
    private $hcid;
    private $hgroup;
    private $hotel;  
    private $hotelCity;
    private $hotelDst;
    private $hotelRegion;
    private $lc;
    private $lstg;
    private $mw;
    private $picref;
    private $price;
    private $rating;
    private $ratingAmt;
    private $recommendationRate;
    private $ref;
    private $source;
    private $tlcab;
    private $tourOperator;
    private $uc;
    private $vt;
    private $zt;

    
    function __construct() {
        
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

    public function getDays() {
        return $this->days;
    }

    public function setDays($days) {
        $this->days = $days;
    }

    public function getDlc() {
        return $this->dlc;
    }

    public function setDlc($dlc) {
        $this->dlc = $dlc;
    }

    public function getGiata() {
        return $this->giata;
    }

    public function setGiata($giata) {
        $this->giata = $giata;
    }

    public function getGid() {
        return $this->gid;
    }

    public function setGid($gid) {
        $this->gid = $gid;
    }

    public function getGprice() {
        return $this->gprice;
    }

    public function setGprice($gprice) {
        $this->gprice = $gprice;
    }

    public function getHcid() {
        return $this->hcid;
    }

    public function setHcid($hcid) {
        $this->hcid = $hcid;
    }

    public function getHgroup() {
        return $this->hgroup;
    }

    public function setHgroup($hgroup) {
        $this->hgroup = $hgroup;
    }

    public function getHotel() {
        return $this->hotel;
    }

    public function setHotel($hotel) {
        $this->hotel = $hotel;
    }

    public function getHotelCity() {
        return $this->hotelCity;
    }

    public function setHotelCity($hotelCity) {
        $this->hotelCity = $hotelCity;
    }

    public function getHotelDst() {
        return $this->hotelDst;
    }

    public function setHotelDst($hotelDst) {
        $this->hotelDst = $hotelDst;
    }

    public function getHotelRegion() {
        return $this->hotelRegion;
    }

    public function setHotelRegion($hotelRegion) {
        $this->hotelRegion = $hotelRegion;
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

    public function getMw() {
        return $this->mw;
    }

    public function setMw($mw) {
        $this->mw = $mw;
    }

    public function getPicref() {
        return $this->picref;
    }

    public function setPicref($picref) {
        $this->picref = $picref;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getRating() {
        return $this->rating;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function getRatingAmt() {
        return $this->ratingAmt;
    }

    public function setRatingAmt($ratingAmt) {
        $this->ratingAmt = $ratingAmt;
    }

    public function getRecommendationRate() {
        return $this->recommendationRate;
    }

    public function setRecommendationRate($recommendationRate) {
        $this->recommendationRate = $recommendationRate;
    }

    public function getRef() {
        return $this->ref;
    }

    public function setRef($ref) {
        $this->ref = $ref;
    }

    public function getSource() {
        return $this->source;
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function getTlcab() {
        return $this->tlcab;
    }

    public function setTlcab($tlcab) {
        $this->tlcab = $tlcab;
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

    public function getVt() {
        return $this->vt;
    }

    public function setVt($vt) {
        $this->vt = $vt;
    }

    public function getZt() {
        return $this->zt;
    }

    public function setZt($zt) {
        $this->zt = $zt;
    }

    public function setParamsByArray($offer) {
        foreach ($offer as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
            
            if(gettype($this->price) == 'object'){
                $this->price = $this->price->price;
            }
        }
    }
}

?>
