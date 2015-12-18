<?php

include_once '../LMwebSoapClient.php';
include_once '../classes/MixerRequestObject.php';
include_once '../Template.php';

$sc = new LMwebSoapClient(LMwebSoapClient::$wsdl);

//$mro = new MixerRequestObject('88', 'HGD7777', '');
$mro = new MixerRequestObject('235', 'HR74A69Q', '');
if ($_GET['timeRange'] != "") {
    $timeRange = split(' ', $_GET['timeRange']);
    unset($_GET['timeRange']);
    $_GET['minTimeRange'] = $timeRange[0];
    $_GET['maxTimeRange'] = $timeRange[1];
}

$_GET['destination'] = array($_GET['region'], $_GET['destination']);
//var_dump($_GET['destination']);

$mro->setParamsByArray($_GET);

try {
    if ($mro->getJourneyType() == 'FLIGHT') {
//        echo 'searchFlights<br>';
        echo 'index controller search flights' ;
		//var_dump($mro);
		$result = $sc->searchFlights($mro);
        if ($result != null) {
            Template::searchFlightsTemplate($result, $mro);
        }
    } else {
        $dst = $mro->getDestination();
        if (!($dst[0] == null)) {
//                echo 'searchOffers<br>';
			echo 'index controller search offers' ;
            $result = $sc->searchOffers($mro);
            if ($result != null) {
                Template::searchOfferTemplate($result, $mro);
            }
        } else {
//                echo 'searchDestination<br>';
			echo 'index controller search destinations';
            $result = $sc->searchDestination($mro);
            if ($result != null) {
                Template::searchDestinationTemplate($result, $mro);
            }
        }
    }
} catch (Exception $exc) {
    echo '<pre>';
    print_r($exc->getTraceAsString());
    echo '</pre>';

    echo '<pre>';
    print_r($_GET);
    echo '</pre>';

    echo '<pre>';
    print_r($mro);
    echo '</pre>';

    echo '<pre>';
    print_r($mro->getParamsAsArray());
    echo '</pre>';
}
?>
