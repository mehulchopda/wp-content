<html>
<body>

<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    Journeytype: <input type="radio" name="hotel" value="JOURNEY" >Hotel&Flug
    <input type="radio" name="hotel" value="HOTEL" >Hotel<br>
    Destination:<input type="text" name="destination" /><br>
    from: <input type="text" name="from" /><br>
    To: <input type="text" name="To" /><br>
    Guests: <input type="text" name="persons" /><br>
    All inklusive: <input type="text" name="inclusive" /><br>
    <input type="submit" />
</form>

</body>
</html>
<?php

if( $_GET["hotel"] || $_GET["from"] || $_GET["To"] || $_GET["persons"]|| $_GET["destination"]) {

    $from = $_GET["from"];
    $destination=$_GET["destination"];
    $To = $_GET["To"];
    $persons = $_GET["persons"];
    $jType=$_GET["hotel"];

    echo $from;
    echo $To;
    echo $persons;

    include(__DIR__ . '\LMwebSoapClient\LMwebSoapClient.php');
    include(__DIR__ . '\LMwebSoapClient\classes\MixerRequestObject.php');
    include(__DIR__ . '\LMwebSoapClient\HollydayTemplate.php');


    $wsdl = "http://web3dev.travel-it.com/TravelItMixer/SoapMixer?wsdl";
    $sc=new SoapClient($wsdl);

   // $sc = new LMwebSoapClient(LMwebSoapClient::$wsdl);
//$mro = new MixerRequestObject('88', 'HGD7777', '');

    $mro = new MixerRequestObject('235', 'HR74A69Q', '');
    //$mro->setParamsByArray($_GET);
//if (isset($_GET['mro'])) {
//    $mro = unserialize(base64_decode($_GET['mro']));
//}
//$mro->setParamsByArray($_GET);
    $mro->setJourneyType($jType);
//	$mro->setDestination('Asien');
//	$mro->setRegionGIATAidDestination('Asien');
    //$mro->setDepartureAirport('Munich');
    $mro->setDestination($destination);
    if(isset($jType)&&$jType=="JOURNEY"){
        $mro->setDepartureAirport('MUC');
        echo $jType;
    }
    $mro->setPerson($persons);

    $mro->setDepartureDate('2015-10-15');
    $mro->setReturnDate('2015-10-28');





    try {
        $result = $this->sc->searchDestinations(array('mro' => $mro->getParamsAsArray()))->return;
        var_dump($result);
       /* if ($mro->getJourneyType() == 'FLIGHT') {
//        echo 'searchFlights<br>';
            echo 'index controller search flights';

            $result = $sc->searchFlights($mro);
            //var_dump($result);
            if ($result != null) {
                //	Template::searchFlightsTemplate($result, $mro);
            }
        } else {
            $dst = $mro->getDestination();
            if (!($dst[0] == null)) {
//                echo 'searchOffers<br>';
                echo 'index controller search offers';

                $result = $sc->searchOffers($mro);
                //var_dump($result);

                if ($result != null) {
                    //Template::searchOfferTemplate($result, $mro);
                    //$date = $result->getDatesList();
                    //echo $date;
                    Template::searchOfferTemplate($result,$mro);
                }
            } else {
//                echo 'searchDestination<br>';
                echo 'index controller search destinations';
                $result = $sc->searchDestination($mro);
                //var_dump($result);
                if ($result != null) {
                    Template::searchDestinationTemplate($result, $mro);
                }
            }*/
        //}
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
}
/*foreach ($result as $key => $value)
{
		//echo  "Key is ".$key."  Value is ".$value;
		echo  "Key is ".$key. "Values are\n";
		
		//var_dump ($value);
	array_push($temp,$value);

		//echo "=====================================================================================================================\n=================================================================";
		//echo  "<br>";	
}*/
//echo json_encode($temp);
?>
