<?php

include __DIR__ . '/LMwebSoapClient/LMwebSoapClient.php';
include __DIR__ . '/LMwebSoapClient/classes/MixerRequestObject.php';
include __DIR__ . '/LMwebSoapClient/Template.php';

header('Content-Type:text/html; charset=utf-8');

//$mro = new MixerRequestObject('88', 'HGD7777', '');
$wsdl = "http://web3dev.travel-it.com/TravelItMixer/SoapMixer?wsdl";
$sc = new LMwebSoapClient(LMwebSoapClient::$wsdl);
$mro = new MixerRequestObject('235', 'HR74A69Q', '');
if (isset($_GET['mro'])) {
    var_dump($_GET['mro']);
   // $mro = unserialize(base64_decode($_GET['mro']));
}
$mro->setParamsByArray($_POST);

try {

    $result = $sc->searchDateList($mro);
    if ($result != null) {

        echo '<h1> '.$result->getHotel().'</h1>';
        echo '<table border="1" cellpadding="5" cellspacing="0" width="80%" rules="all">';
        echo '<tr bgcolor="#E6E6E6">';
        echo '<th align="left"><font size="3">Abflughafen</th>';
        echo '<th align="left" ><font size="3">Datum
        <table ><th >von/bis</th></table></th>';


        echo '<th align="left">Dauer</th>';
        echo '<th align="left">Unterkunft</th>';
        echo '<th align="left">Verpflegung</th>';
        echo '<th align="left">Veranstalter</th>';
        echo '<th align="left">Gesamtpreis<table ><th >'.$mro->getPersons().' Persons</th></table>   </th>';
        echo '<th align="left">Pr&uuml;fen</th>';
        echo '</tr>';
        $date = $result->getDatesList();
        //var_dump($result);
        for ($i = 0; $i < count($date); $i++) {
            $dateListMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
            $dateListMro->setParamsByArray($mro->getParamsAsArray());
            $dateListMro->setBook($date[$i]->getRef());

            $color = $i % 2 == 0 ? '#ffffff' : '#b0bec5';
            echo '<tr bgcolor="' . $color . '" width="100%">';
            echo '<td>' . $date[$i]->getDeparture() . '</td>';
            echo '<td>' . $date[$i]->getDate() . '<br>' . $date[$i]->getBday() . '</td>';

            echo '<td>' . $date[$i]->getDays() . '</td>';
            echo '<td>' . $result->getZt() . '</td>';
            echo '<td>' . $result->getVt() . '</td>';
            echo '<td>' . $result->getTourOperator() . '</td>';
            echo '<td>' . $date[$i]->getGPrice() . '</td>';
            echo '<td><a href="./SearchDateListController.php?mro=' . base64_encode(serialize($dateListMro)) . '">prüfen</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }
} catch (SoapFault $sf) {
    print_r($sf->getMessage());
}
?>
