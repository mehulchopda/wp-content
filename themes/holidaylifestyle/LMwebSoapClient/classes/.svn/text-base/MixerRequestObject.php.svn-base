<?php

class MixerRequestObject {

    //Pflichtparameter
    private $cfg;
    private $xpwp;
    private $ip;
    //Suchparameter
    private $journeyType;
    private $destination;
    private $regionGIATAidDestination;
    private $departureAirport;
    private $category;
    private $departureDate;
    private $returnDate;
    private $minTimeRange;
    private $maxTimeRange;
    private $persons;
    private $children;
    private $maxPrice;
    private $catering;
    private $room;
    private $tourOperator;
    private $hotelChain;
    private $hotel;
    private $hotelname;
    private $hotelcity;
    private $gt;
    //weitere Parameter
    private $city;
    private $cityGiataIdDestination;
    private $hotelGiataCode;
    private $source;
    private $bookingCode;
    private $book;
    private $vgnr;
    private $r_anr;
    private $r_name;
    private $r_vname;
    private $r_strasse;
    private $r_plz;
    private $r_ort;
    private $r_land;
    private $r_email;
    private $r_fax;
    private $r_tel1;
    private $r_tel2;
    private $paymode;
    private $p_anr;
    private $p_name;
    private $p_vname;
    private $p_alter;
    private $agb;
    //Buchungsparameter
    private $gprice;
    //Payment
    private $cctyp;
    private $ccnr;
    private $ccmm;
    private $ccyy;
    private $lskto;
    private $lsblz;
    private $lsbank;

    function __construct($cfg, $xpwp, $ip) {
        $this->cfg = $cfg;
        $this->xpwp = $xpwp;
        $this->ip = $ip;
    }

    public function getJourneyType() {
        return $this->journeyType;
    }

    public function setJourneyType($journeyType) {
        $this->journeyType = $journeyType;
    }

    public function getDestination() {
        return $this->destination;
    }

    public function setDestination($destinations) {
        $this->destination = $destinations;
    }

    public function addDestination($destination) {
        if ($this->destination == null)
            $this->destination = array();
        array_push($this->destination, $destination);
    }

    public function getRegionGIATAidDestination() {
        return $this->regionGIATAidDestination;
    }

    public function setRegionGIATAidDestination($regionGIATAidDestination) {
        $this->regionGIATAidDestination = $regionGIATAidDestination;
    }

    public function getDepartureAirport() {
        return $this->departureAirport;
    }

    public function setDepartureAirport($departureAirport) {
        $this->departureAirport = $departureAirport;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getDepartureDate() {
        return $this->departureDate;
    }

    public function setDepartureDate($departureDate) {
        $this->departureDate = $departureDate;
    }

    public function getReturnDate() {
        return $this->returnDate;
    }

    public function setReturnDate($returnDate) {
        $this->returnDate = $returnDate;
    }

    public function getMinTimeRange() {
        return $this->minTimeRange;
    }

    public function setMinTimeRange($minTimeRange) {
        $this->minTimeRange = $minTimeRange;
    }

    public function getMaxTimeRange() {
        return $this->maxTimeRange;
    }

    public function setMaxTimeRange($maxTimeRange) {
        $this->maxTimeRange = $maxTimeRange;
    }

    public function getPersons() {
        return $this->persons;
    }

    public function setPerson($persons) {
        $this->persons = $persons;
    }

    public function getChildren() {
        return $this->children;
    }

    public function setChildren($children) {
        $this->children = $children;
    }

    public function getMaxPrice() {
        return $this->maxPrice;
    }

    public function setMaxPrice($maxPrice) {
        $this->maxPrice = $maxPrice;
    }

    public function getCatering() {
        return $this->catering;
    }

    public function setCatering($catering) {
        $this->catering = $catering;
    }

    public function getRoom() {
        return $this->room;
    }

    public function setRoom($room) {
        $this->room = $room;
    }

    public function getTourOperator() {
        return $this->tourOperator;
    }

    public function setTourOperator($tourOperator) {
        $this->tourOperator = $tourOperator;
    }

    public function getHotelChain() {
        return $this->hotelChain;
    }

    public function setHotelChain($hotelChain) {
        $this->hotelChain = $hotelChain;
    }

    public function getHotel() {
        return $this->hotel;
    }

    public function setHotel($hotel) {
        $this->hotel = $hotel;
    }

    public function getHotelname() {
        return $this->hotelname;
    }

    public function setHotelname($hotelname) {
        $this->hotelname = $hotelname;
    }

    public function getHotelcity() {
        return $this->hotelcity;
    }

    public function setHotelcity($hotelcity) {
        $this->hotelcity = $hotelcity;
    }

    public function getGlobalTypes() {
        return $this->gt;
    }

    public function setGlobalTypes($globalTypes) {
        $this->gt = $globalTypes;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCityGiataIdDestination() {
        return $this->cityGiataIdDestination;
    }

    public function setCityGiataIdDestination($cityGiataIdDestination) {
        $this->cityGiataIdDestination = $cityGiataIdDestination;
    }

    public function getHotelGiataCode() {
        return $this->hotelGiataCode;
    }

    public function setHotelGiataCode($hotelGiataCode) {
        $this->hotelGiataCode = $hotelGiataCode;
    }

    public function getSource() {
        return $this->source;
    }

    public function setSource($source) {
        $this->source = $source;
    }

    public function getCfg() {
        return $this->cfg;
    }

    public function getXpwp() {
        return $this->xpwp;
    }

    public function getIp() {
        return $this->ip;
    }

    public function getGprice() {
        return $this->gprice;
    }

    public function setGprice($gprice) {
        $this->gprice = $gprice;
    }

    public function getGt() {
        return $this->gt;
    }

    public function setGt($gt) {
        $this->gt = $gt;
    }

    public function getBookingCode() {
        return $this->bookingCode;
    }

    public function setBookingCode($bookingCode) {
        $this->bookingCode = $bookingCode;
    }

    public function getBook() {
        return $this->book;
    }

    public function setBook($book) {
        $this->book = $book;
    }

    public function getVgnr() {
        return $this->vgnr;
    }

    public function setVgnr($vgnr) {
        $this->vgnr = $vgnr;
    }

    public function getR_anr() {
        return $this->r_anr;
    }

    public function setR_anr($r_anr) {
        $this->r_anr = $r_anr;
    }

    public function getR_name() {
        return $this->r_name;
    }

    public function setR_name($r_name) {
        $this->r_name = $r_name;
    }

    public function getR_vname() {
        return $this->r_vname;
    }

    public function setR_vname($r_vname) {
        $this->r_vname = $r_vname;
    }

    public function getR_strasse() {
        return $this->r_strasse;
    }

    public function setR_strasse($r_strasse) {
        $this->r_strasse = $r_strasse;
    }

    public function getR_plz() {
        return $this->r_plz;
    }

    public function setR_plz($r_plz) {
        $this->r_plz = $r_plz;
    }

    public function getR_ort() {
        return $this->r_ort;
    }

    public function setR_ort($r_ort) {
        $this->r_ort = $r_ort;
    }

    public function getR_land() {
        return $this->r_land;
    }

    public function setR_land($r_land) {
        $this->r_land = $r_land;
    }

    public function getR_email() {
        return $this->r_email;
    }

    public function setR_email($r_email) {
        $this->r_email = $r_email;
    }

    public function getR_fax() {
        return $this->r_fax;
    }

    public function setR_fax($r_fax) {
        $this->r_fax = $r_fax;
    }

    public function getR_tel1() {
        return $this->r_tel1;
    }

    public function setR_tel1($r_tel1) {
        $this->r_tel1 = $r_tel1;
    }

    public function getR_tel2() {
        return $this->r_tel2;
    }

    public function setR_tel2($r_tel2) {
        $this->r_tel2 = $r_tel2;
    }

    public function getP_anr() {
        return $this->p_anr;
    }

    public function setP_anr($p_anr) {
        $this->p_anr = $p_anr;
    }

    public function getP_name() {
        return $this->p_name;
    }

    public function setP_name($p_name) {
        $this->p_name = $p_name;
    }

    public function getP_vname() {
        return $this->p_vname;
    }

    public function setP_vname($p_vname) {
        $this->p_vname = $p_vname;
    }

    public function getP_alter() {
        return $this->p_alter;
    }

    public function setP_alter($p_alter) {
        $this->p_alter = $p_alter;
    }

    public function getPaymode() {
        return $this->paymode;
    }

    public function setPaymode($paymode) {
        $this->paymode = $paymode;
    }

    public function getAgb() {
        return $this->agb;
    }

    public function setAgb($agb) {
        $this->agb = $agb;
    }

    public function getCctyp() {
        return $this->cctyp;
    }

    public function setCctyp($cctyp) {
        $this->cctyp = $cctyp;
    }

    public function getCcnr() {
        return $this->ccnr;
    }

    public function setCcnr($ccnr) {
        $this->ccnr = $ccnr;
    }

    public function getCcmm() {
        return $this->ccmm;
    }

    public function setCcmm($ccmm) {
        $this->ccmm = $ccmm;
    }

    public function getCcyy() {
        return $this->ccyy;
    }

    public function setCcyy($ccyy) {
        $this->ccyy = $ccyy;
    }

    public function getLskto() {
        return $this->lskto;
    }

    public function setLskto($lskto) {
        $this->lskto = $lskto;
    }

    public function getLsblz() {
        return $this->lsblz;
    }

    public function setLsblz($lsblz) {
        $this->lsblz = $lsblz;
    }

    public function getLsbank() {
        return $this->lsbank;
    }

    public function setLsbank($lsbank) {
        $this->lsbank = $lsbank;
    }

    public function setParamsByArray($array) {
        foreach ($array as $key => $value) {
            if (!in_array($key, array('cfg', 'xpwp', 'ip')) && property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function getParamsAsArray() {
        $array = get_class_vars("MixerRequestObject");

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
