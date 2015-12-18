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

if ($mro->getAgb() == "on") {
    $mro->setAgb(1);
} else {
    $mro->setAgb(0);
}

try {
    $result = $sc->bookingConfirmation($mro);
    if ($result != null) {
        Template::bookingConfirmationTemplate($result, $mro);
    }
} catch (SoapFault $sf) {
    print_r($sf->getMessage());
}
?>
