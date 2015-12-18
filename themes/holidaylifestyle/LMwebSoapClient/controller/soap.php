<html>
<body>

<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
	Journeytype: <input type="radio" name="journeyType" value="JOURNEY" >Hotel&Flug
	<input type="radio" name="journeyType" value="HOTEL" >Hotel<br>
	Von:<input type="text" name="departureAirport[]" /><br>
	Nach:<input type="text" name="destination" /><br>
	from: <input type="date" format="d.m.Y" name="departureDate" /><br>
	To: <input type="date" format="d.m.Y" name="returnDate" /><br>
	Guests: <input type="text" name="persons" /><br>
	All inclusive: <input type="text" name="inclusive" /><br>
	<input type="submit" />
</form>

</body>
</html>
<?php

if( $_GET["journeyType"] || $_GET["departureAirport[]"] || $_GET["destination"] || $_GET["persons"]|| $_GET["departureDate"]|| $_GET["departureDate"]) {






	include_once '../LMwebSoapClient.php';
	include_once '../classes/MixerRequestObject.php';
	include_once '../HollydayTemplate.php';


	$wsdl = "http://web3dev.travel-it.com/TravelItMixer/SoapMixer?wsdl";
	$option = array("trace"=>true);
$sc=new SoapClient($wsdl, ['trace' => true, 'cache_wsdl' => WSDL_CACHE_MEMORY]);
//var_dump($sc);
//	$sc = new LMwebSoapClient(LMwebSoapClient::$wsdl);
//$mro = new MixerRequestObject('88', 'HGD7777', '');
$_GET['destination']=array("PMI", $_GET['destination']);
	$mro = new MixerRequestObject('235', 'HR74A69Q', '');
	//$mro->setParamsByArray($_GET);
//if (isset($_GET['mro'])) {
//    $mro = unserialize(base64_decode($_GET['mro']));
//}
$mro->setParamsByArray($_GET);
//	$mro->setJourneyType('JOURNEY');
//	$mro->setDestination('Asien');
//	$mro->setRegionGIATAidDestination('Asien');
	//$mro->setDepartureAirport('Munich');
//$mro->setDestination($destination);
	/*if(isset($jType)&&$jType=="JOURNEY"){
		$mro->setDepartureAirport('MUC');
		echo $jType;
	}*/
//$mro->setPerson('3');

//$mro->setMgrp(1);
	//$mro->setDepartureDate('2015-10-15');
//$mro->setReturnDate('2015-10-28');
	//$params = array('SF' => 'JOURNEY');


//var_dump($mro);

//
//$result = $soapClient->searchDestinations(array('mro' => $mro->getParamsAsArray()))->return;
//
////$result = $soapClient->searchDestinations(array('mro' => $mro))->return;
//
////$result = $soapClient->searchDestinations(array('mro' => $mro))->return;
////var_dump ($result);;
//$temp=array();
//$_GET['destination'] = array($_GET['region'], $_GET['destination']);

	//$mro->setParamsByArray($_GET);

	try {
		//$result =$sc->searchOffers(array('mro' => $mro->getParamsAsArray()))->return;
		//var_dump($result);
		//echo json_encode($result,JSON_PRETTY_PRINT);
		//$dst = $mro->getDestination();
		//var_dump($dst);
		if ($mro->getJourneyType() == 'FLIGHT') {
//        echo 'searchFlights<br>';
			echo 'index controller search flights';

			$result = $sc->searchFlights($mro);
			//var_dump($result);
			if ($result != null) {
				//	Template::searchFlightsTemplate($result, $mro);
				//	Template::searchFlightsTemplate($result, $mro);
				//	Template::searchFlightsTemplate($result, $mro);
			}
		} else {
			$dst = $mro->getDestination();
			var_dump($dst);
			if (!($dst[0] == null)) {
//                echo 'searchOffers<br>';
				echo 'index controller search offers';
				$result = $sc->searchOffers(array('mro' => $mro->getParamsAsArray()))->return;
				//$result = $sc->searchOffers($mro);
				//var_dump($result);

				if ($result != null) {
					//var_dump($result);
					echo json_encode($result, JSON_PRETTY_PRINT);
				}
				//Template::searchOfferTemplate($result, $mro);
				//$date = $result->getDatesList();
				//echo $date;
				//Template::searchOfferTemplate($result,$mro);
			}

	else {
//                echo 'searchDestination<br>';
				echo 'index controller search destinations';
				$result = $sc->searchDestination($mro);
				//var_dump($result);
				if ($result != null) {
					//echo json_encode($result,JSON_PRETTY_PRINT);
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
