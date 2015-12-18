<?php



include_once '../LMwebSoapClient.php';
include_once '../classes/MixerRequestObject.php';
include_once '../Template.php';

$sc = new LMwebSoapClient(LMwebSoapClient::$wsdl);

//$mro = new MixerRequestObject('88', 'HGD7777', '');
$mro = new MixerRequestObject('235', 'HR74A69Q', '');
if (isset($_GET['mro'])) {
    $mro = unserialize(base64_decode($_GET['mro']));
}
$mro->setParamsByArray($_POST);

try {
	
	echo 'searchdestinationcontroller';
	
    $result = $sc->searchOffers($mro);
    if ($result != null) {
        Template::searchOfferTemplate($result, $mro);
    }
} catch (SoapFault $sf) {
    print_r($sf->getMessage());
}


?>
