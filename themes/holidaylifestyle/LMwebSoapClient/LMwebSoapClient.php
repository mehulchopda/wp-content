<?php

include_once 'classes/Region.php';
include_once 'classes/Destination.php';
include_once 'classes/City.php';
include_once 'classes/Offer.php';
include_once 'classes/Flights.php';
include_once 'classes/Flight.php';
include_once 'classes/Date.php';
include_once 'classes/Hotel.php';
include_once 'classes/Book.php';
include_once 'classes/BookingConf.php';

class LMwebSoapClient {

    public static $wsdl = "http://web3dev.travel-it.com/TravelItMixer/SoapMixer?wsdl";
    private $sc;

    function __construct($wsdl) {
        $this->sc = new SoapClient($wsdl);
    }

    public function searchDestination($mro) {
        try {
			//echo 'LMwebSoapClient searchDestination';
			
			
            $result = $this->sc->searchDestinations(array('mro' => $mro->getParamsAsArray()))->return;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }

        if ($result->destinations->info == "NOHIT") {
            Template::errorTemplate("Keine Treffer gefunden");
            return null;
        }

        $regionList = array();

        if (is_array($result->destinations->regionList)) {
            foreach ($result->destinations->regionList as $value) {
                $region = new Region();
                $region->setParamsByArray($value);
                array_push($regionList, $region);
            }
        } else {
            $region = new Region();
            $region->setParamsByArray($result->destinations->regionList);
            array_push($regionList, $region);
        }

        return $regionList;
    }

    public function searchOffers($mro) {
        try {

			//echo 'LMwebSoapClient search offer';
			$result = $this->sc->searchOffers(array('mro' => $mro->getParamsAsArray()))->return;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }

        if ($result->offers->info == "NOHIT") {
            Template::errorTemplate("Keine Treffer gefunden");
            return null;
        }

        if ($result->offers->offers != 0) {
            $cities = array();
            if (is_array($result->offers->cityList)) {
                foreach ($result->offers->cityList as $value) {
                    $city = new City($value->id, $value->minPrice, $value->name);
                    $cities[$city->getId()] = $city;
                }
            } else {
                $city = new City($result->offers->cityList->id, $result->offers->cityList->minPrice, $result->offers->cityList->name);
                $cities[$city->getId()] = $city;
            }

            $offers = array();
            if (is_array($result->offers->offersList)) {
                foreach ($result->offers->offersList as $value) {
                    $offer = new Offer();
                    $offer->setParamsByArray($value);
                    $offer->setCity($cities[$offer->getCity()]);
                    array_push($offers, $offer);
                }
            } else {
                $offer = new Offer();
                $offer->setParamsByArray($result->offers->offersList);
                $offer->setCity($cities[$offer->getCity()]);
                array_push($offers, $offer);
            }
        } else {
            Template::errorTemplate("Keine Treffer gefunden");
            return null;
        }
        return $offers;
    }

    public function searchDateList($mro) {
        try {
			
			//echo 'LMwebSoapClient searchDateList';
			
            $result = $this->sc->searchDateList(array('mro' => $mro->getParamsAsArray()))->return;
            //var_dump($result);
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }

        /*if ($result->message) {
            Template::errorTemplate("Server-Nachricht: " . $result->message);
            return null;
        }*/

        $dates = new Hotel();
        $dates->setParamsByArray($result->dateList);

        $dateList = array();

        if (is_array($result->dateList->datesList)) {
            foreach ($result->dateList->datesList as $value) {
                $date = new Date();
                $date->setParamsByArray($value);
                array_push($dateList, $date);
            }
        } else {
            $date = new Date();
            $date->setParamsByArray($result->dateList->datesList);
            array_push($dateList, $date);
        }

        $dates->setDatesList($dateList);

        return $dates;
    }

    public function searchFlights($mro) {
        try {
			//var_dump($mro);
			echo 'LMwebSoapClient searchFlights';

            $result = $this->sc->searchFlights(array('mro' => $mro->getParamsAsArray()))->return;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }

        /*if ($result->flights->info == "NOHIT") {
            Template::errorTemplate("Keine Treffer gefunden");
            return null;
        }*/

        $flights = new Flights();
        $flights->setParamsByArray($result);
        //var_dump($result);
        $flightList = array();

        if ($result->flights->offers != null) {
            if (is_array($result->flights->flightList)) {
                foreach ($result->flights->flightList as $value) {
                    $flight = new Flight();
                    $flight->setParamsByArray($value);
                    array_push($flightList, $flight);
                }
            } else {
                $flight = new Flight();
                $flight->setParamsByArray($result->flights->flightList);
                array_push($flightList, $flight);
            }
        } else {
           // Template::errorTemplate("Keine Treffer gefunden");
            echo ('Keine Treffer gefunden');
            return null;
        }

        $flights->setFlightList($flightList);

        return $flights;
    }

    public function bookingRequest($mro) {
        try {
            $result = $this->sc->bookingRequest(array('mro' => $mro->getParamsAsArray()))->return;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }

        if ($result->page == "WEG") {
            Template::errorTemplate("Reise ist nicht verfügbar");
            return null;
        }

        if ($result->message) {
            Template::errorTemplate("Reise ist nicht verfügbar");
            Template::errorTemplate("Server-Nachricht: " . $result->message);
            return null;
        }

        $book = new Book();
        $book->setParamsByArray($result->book);

        return $book;
    }

    public function bookingConfirmation($mro) {
        try {
            $result = $this->sc->bookingConfirmation(array('mro' => $mro->getParamsAsArray()))->return;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return null;
        }
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';

        if ($result->message) {
            Template::errorTemplate("Server-Nachricht: " . $result->message);
            return null;
        }

        $bookingConf = new BookingConf();
        $bookingConf->setParamsByArray($result->bookingConf);

        return $bookingConf;
    }

}

?>
