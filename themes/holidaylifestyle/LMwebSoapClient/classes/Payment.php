<?php

/**
 * Description of Payment
 *
 * @author daniela
 */
class Payment {

    private $cards;
    private $cc;
    private $ccInfo;
    private $di;
    private $fhInfo;
    private $fhz;
    private $ls;
    private $lsInfo;
    private $uw;
    private $uwInfo;

    function __construct() {
        
    }

    public function getCards() {
        return $this->cards;
    }

    public function setCards($cards) {
        $this->cards = $cards;
    }

    public function getCc() {
        return $this->cc;
    }

    public function setCc($cc) {
        $this->cc = $cc;
    }

    public function getCcInfo() {
        return $this->ccInfo;
    }

    public function setCcInfo($ccInfo) {
        $this->ccInfo = $ccInfo;
    }

    public function getDi() {
        return $this->di;
    }

    public function setDi($di) {
        $this->di = $di;
    }

    public function getFhInfo() {
        return $this->fhInfo;
    }

    public function setFhInfo($fhInfo) {
        $this->fhInfo = $fhInfo;
    }

    public function getFhz() {
        return $this->fhz;
    }

    public function setFhz($fhz) {
        $this->fhz = $fhz;
    }

    public function getLs() {
        return $this->ls;
    }

    public function setLs($ls) {
        $this->ls = $ls;
    }

    public function getLsInfo() {
        return $this->lsInfo;
    }

    public function setLsInfo($lsInfo) {
        $this->lsInfo = $lsInfo;
    }

    public function getUw() {
        return $this->uw;
    }

    public function setUw($uw) {
        $this->uw = $uw;
    }

    public function getUwInfo() {
        return $this->uwInfo;
    }

    public function setUwInfo($uwInfo) {
        $this->uwInfo = $uwInfo;
    }

    public function setParamsByArray($payment) {
        foreach ($payment as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
        
        if($this->cards != null){
            $this->cards = explode(" ", $this->cards);
            foreach ($this->cards as $key => $card) {
                if(trim($card) == ""){
                    unset($this->cards[$key]);
                }
            }
        }
    }

}

?>
