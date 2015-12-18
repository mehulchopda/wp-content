<?php

/*
Template Name: Neuigkeiten
 */
?>
<?php
get_header();
?>

<div class="clearfix"></div>
<div class="content-outside" id="contentOutside">
        <div class="voffset2 device"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="bread-crumb">
                <li><a href="#">Startseite</a></li>
                <li>&raquo;</li>
                <li><a href="#">Reiseziele</a></li>
                <li>&raquo;</li>
                <li><a href="#">Asien</a></li>
                <li>&raquo;</li>
                <li><a href="#">Indien</a></li>
                <li>&raquo;</li>
                <li><a href="#">The Park View</a></li>
            </ul>
        </div>
    <?php
if ($_GET["von"] || $_GET["nach"] || $_GET["abreisedatum"] || $_GET["ruckreisedatum"] || $_GET["journeytype"]) {

	$von = $_GET["von"];
	$nach = $_GET["nach"];
	$abreisedatum = $_GET["abreisedatum"];
	$ruckreisedatum = $_GET["ruckreisedatum"];
    $journeytype = $_GET["journeytype"];
	$abreiseDate = DateTime::createFromFormat('d/m/Y', $abreisedatum);
	$ruckreiseDate = DateTime::createFromFormat('d/m/Y', $ruckreisedatum);


	echo ' <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <a href="#" ><div class="kartenansicht"><img src="' . get_bloginfo('template_url') . '/images/nach-icon-27.png" class="img-responsive grey-icon" alt="" />
                    <img src="' . get_bloginfo('template_url') . '/images/nach-icon-27-white.png" class="img-responsive white-icon" alt="" />
                    <div>Kartenansicht</div></div></a>
        </div>
        <div class="clearfix"></div>
        <div class="voffset2"></div>
        <div class="clearfix"></div>
        <div class="container-fluid nospacing">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                    <div class="main-image-text text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">Neuigkeiten</div>
                </div>
                <img src="' . get_bloginfo('template_url') . '/images/neuigkeiten.jpg" class="full-width-img img-responsive" alt="" />
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="voffset2"></div>

        <div class="container nospacing content"> ';

	include __DIR__ . '/LMwebSoapClient/LMwebSoapClient.php';
	include __DIR__ . '/LMwebSoapClient/classes/MixerRequestObject.php';
	include __DIR__ . '/LMwebSoapClient/Template.php';

	$wsdl = "http://web3dev.travel-it.com/TravelItMixer/SoapMixer?wsdl";

	$sc = new LMwebSoapClient(LMwebSoapClient::$wsdl);

	$mro = new MixerRequestObject('235', 'HR74A69Q', '');

	$mro->setJourneyType($journeytype);

	$mro->setDestination($nach);
	if (isset($journeytype) && $journeytype == "JOURNEY") {
		$mro->setDepartureAirport($von);
	}
	$mro->setPerson('2');

	$mro->setDepartureDate($abreiseDate->format('Y-m-d'));
	$mro->setReturnDate($ruckreiseDate->format('Y-m-d'));

	try {
		if ($mro->getJourneyType() == 'FLIGHT') {

			echo 'index controller search flights';
			$result = $sc->searchFlights($mro);

			if ($result != null) {

				//	Template::searchFlightsTemplate($result, $mro);

			}
		} else {
			$dst = $mro->getDestination();

			if (!($dst[0] == null)) {

				//  echo 'index controller search offers';

				$offers = $sc->searchOffers($mro);
				//var_dump($offers);

				if ($offers != null) {

					$temp = 1;
					$m = 0;
					$c = 0;

					for ($i = 0; $i < count($offers); $i++) {

						$m = $temp;
						$c = $temp + 1;
						$temp = $c + 1;
						$offerMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
						$offerMro->setParamsByArray($mro->getParamsAsArray());
						$offerMro->setHotel('|' . $offers[$i]->getLc() . '|' . $offers[$i]->getUc());
						$offerMro->setSource($offers[$i]->getSource());
						$offerMro->setHotelGiataCode($offers[$i]->getGid());

						$offerMro->setBookingCode($offers[$i]->getUc());
						$ratings_plus = $offers[$i]->getCat();
						$ratings_minus = 5 - $ratings_plus;
						echo '
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing country_details_white">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing">
                        <div class="span12">
                            <div id="sync' . $m . '" class="owl-carousel">
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel3-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel4-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                            </div>
                            <div id="sync' . $c . '" class="owl-carousel thumbnails">

                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel3-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel4-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                                <div class="item"><img src="' . get_bloginfo('template_url') . '/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light_bg nospacing">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 nospacing">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-div">
                                <div class="voffset2"></div>
                                <div class="country_heading col-lg-8 col-md-8 col-sm-8 col-xs-8 nospacing">' . $offers[$i]->getHotel() . '</div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nospacing">';
						echo '<ul class="stars-rating">';

						for ($j = 0; $j < $ratings_plus; $j++) {

							echo '<li><img src = "' . get_bloginfo('template_url') . '/images/star.png" class="img-responsive" alt = "" title = "" ></li >';
						}

						for ($j = 0; $j < $ratings_minus; $j++) {

							echo '<li><img src = "' . get_bloginfo('template_url') . '/images/blank-star.png" class="img-responsive" alt = "" title = "" ></li >';
						}
						echo '</ul>';
						echo ' </div>
                                <div class="clearfix"></div>
                                <div class="country_text">
                                  ' . $offers[$i]->getHotelCity() . '
                                </div>
                                <div class="clearfix"></div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                    <ul class="icons-hover">
                                        <li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Near Airport" class="img-responsive airport" alt=""></li>
                                        <li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Near Bus Stop" class="img-responsive bus-stop" alt=""></li>
                                        <li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Cafe" class="img-responsive cafe" alt=""></li>
                                        <li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Restaurant" class="img-responsive restaurant" alt=""></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nospacing right_column_white">
                            <div class="top-arrow">
                                <img src="' . get_bloginfo('template_url') . '/images/triangle-30-white.png" alt="" class="top-arrow" />
                            </div>
                            <div class="bottom-arrow">
                                <img src="' . get_bloginfo('template_url') . '/images/triangle-down-white.png" alt="" class="down-arrow" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 nospacing">
                                <div class="price-heading">' . $offers[$i]->getPrice() . '</div>
                                <div class="price-subhead">Pro Nacht</div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 nospacing"></div>
                            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4 nospacing weiterlessen"><form action="hotel-details.php"><button class="read_more_btn">Weiterlesen</button></form></div>
                         </div>
                    </div>
</div>
            </div>';
						$m = 0;
						$c = 0;
					}
				}
			} else {

				//                echo 'searchDestination<br>';
				echo 'index controller search destinations';
				$result = $sc->searchDestination($mro);
				/*echo '<pre>';
				var_dump($result);
				echo '</pre>';*/
				//var_dump($result);
				if ($result != null) {
					Template::searchDestinationTemplate($result, $mro);
				}
			}
		}
	}

	 catch (Exception $exc) {
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
?>

</div>
        <div class="clearfix"></div>

<?php
get_footer();
?>
