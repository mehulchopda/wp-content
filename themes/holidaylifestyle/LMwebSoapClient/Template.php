<?php

include_once 'classes/MixerRequestObject.php';
include_once 'classes/Region.php';
include_once 'classes/Destination.php';
include_once 'classes/Offer.php';
include_once 'classes/Date.php';
include_once 'classes/Hotel.php';
include_once 'classes/Flight.php';
include_once 'classes/Flights.php';

class Template {

    private static function setHeader() {
        header('Content-Type: text/html; charset=UTF-8');
    }

    public static function searchDestinationTemplate($regions, $mro) {
        Template::setHeader();
        echo '<table border="1" cellpadding="5" cellspacing="0" width="80%" rules="all">';
        echo '<tr bgcolor="#b0c4de">';
        echo '<th>Name</th>';
        echo '<th>Flugdauer</th>';
        echo '<th>Wasser</th>';
        echo '<th>Luft</th>';
        echo '<th>Preis p. P.</th>';
        echo '<th>Gesamtpreis</th>';
        echo '</tr>';
        for ($i = 0; $i < count($regions); $i++) {
            $regionMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
            $regionMro->setParamsByArray($mro->getParamsAsArray());
            $regionMro->addDestination($regions[$i]->getRegionCode());
            echo '<tr bgcolor="#b0c4de">';
            echo '<td><h3><a href="./SearchDestinationsController.php?mro=' . base64_encode(serialize($regionMro)) . '">' . $regions[$i]->getName() . '</a></h3></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '<td></td>';
            echo '</tr>';
            $dst = $regions[$i]->getDstList();
            for ($j = 0; $j < count($dst); $j++) {
                $dstMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
                $dstMro->setParamsByArray($mro->getParamsAsArray());
                $dstMro->addDestination($dst[$j]->getRef());
                $color = $j % 2 == 0 ? '#ffffff' : '#d3d3d3';
                echo '<tr bgcolor="' . $color . '" width="100%">';
                echo '<td><a href="./SearchDestinationsController.php?mro=' . base64_encode(serialize($dstMro)) . '">' . $dst[$j]->getName() . '</a></td>';
                echo '<td>' . $dst[$j]->getFlightTime() . '</td>';
                echo '<td>' . $dst[$j]->getWaterTemp() . '</td>';
                echo '<td>' . $dst[$j]->getAirTemp() . '</td>';
                echo '<td>' . $dst[$j]->getPrice() . '</td>';
                echo '<td>' . $dst[$j]->getGprice() . '</td>';
                echo '</tr>';
            }
        }
        echo '</table>';
    }

    public static function searchOfferTemplate($offers, $mro) {
        Template::setHeader();
        echo '<table border="1" cellpadding="5" cellspacing="0" width="80%" rules="all">';
        echo '<tr bgcolor="#b0c4de">';
        echo '<th>Bild</th>';
        echo '<th>Ort</th>';
        echo '<th>Hotel</th>';
        echo '<th>Kategorie</th>';
        echo '<th>g&uuml;nstigste Variante</th>';
        echo '<th>Veranstalter</th>';
        echo '<th>Preis p. P.</th>';
        echo '<th>Gesamtpreis</th>';
        echo '<th></th>';
        echo '</tr>';
        for ($i = 0; $i < count($offers); $i++) {

            $offerMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
            $offerMro->setParamsByArray($mro->getParamsAsArray());

            $offerMro->setHotel('|' . $offers[$i]->getLc() . '|' . $offers[$i]->getUc());
            $offerMro->setSource($offers[$i]->getSource());
            $offerMro->setHotelGiataCode($offers[$i]->getGid());
            $offerMro->setBookingCode($offers[$i]->getUc());

            $color = $i % 2 == 0 ? '#ffffff' : '#d3d3d3';
            echo '<tr bgcolor="' . $color . '" width="100%">';
            echo '<td><img src="http://thumbnails.travel-it.com/gthmb.php?gid=' . $offers[$i]->getGid() . '" /></td>';
            echo '<td>' . $offers[$i]->getCity()->getName() . '</td>';
            echo '<td>' . $offers[$i]->getHotel() . '</td>';
            echo '<td>' . $offers[$i]->getCat() . '</td>';
            echo '<td>' . $offers[$i]->getDays() . '<br>' . $offers[$i]->getLstg() . '</td>';
            echo '<td>' . $offers[$i]->getTourOperator() . '</td>';
            echo '<td>' . $offers[$i]->getPrice      () . '</td>';
            echo '<td>' . $offers[$i]->getGprice() . '</td>';
            echo '<td><a href="./SearchOffersController.php?mro=' . base64_encode(serialize($offerMro)) . '">Angebote...</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    public static function searchDateListTemplate($hotel, $mro) {
        Template::setHeader();
        echo '<table border="1" cellpadding="5" cellspacing="0" width="80%" rules="all">';
        echo '<tr bgcolor="#b0c4de">';
        echo '<th>Abflughafen</th>';
        echo '<th>Anreise</th>';
        echo '<th>R&uuml;ckreise</th>';
        echo '<th>Dauer</th>';
        echo '<th>Unterkunft</th>';
        echo '<th>Verpflegung</th>';
        echo '<th>Veranstalter</th>';
        echo '<th>Preis</th>';
        echo '<th>Prüfen</th>';
        echo '<th>FlightDetails</th>';
        echo '</tr>';
        $date = $hotel->getDatesList();
        for ($i = 0; $i < count($date); $i++) {
            $dateListMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
            $dateListMro->setParamsByArray($mro->getParamsAsArray());
            $dateListMro->setBook($date[$i]->getRef());

            $flightMro = new MixerRequestObject($mro->getCfg(), $mro->getXpwp(), $mro->getIp());
            $flightMro->setParamsByArray($mro->getParamsAsArray());
            //  $flightMro->setDestination($mro->getDestination());
            $flightMro->setDepartureDate($date[$i]->getDate());
            $flightMro->setReturnDate($date[$i]->getBday());
            $flightMro->setJourneyType('FLIGHT');


            $color = $i % 2 == 0 ? '#ffffff' : '#d3d3d3';
            echo '<tr bgcolor="' . $color . '" width="100%">';
            echo '<td>' . $date[$i]->getDeparture() . '</td>';
            echo '<td>' . $date[$i]->getDate() . '</td>';
            echo '<td>' . $date[$i]->getBday() . '</td>';
            echo '<td>' . $date[$i]->getDays() . '</td>';
            echo '<td>' . $hotel->getZt() . '</td>';
            echo '<td>' . $hotel->getVt() . '</td>';
            echo '<td>' . $hotel->getTourOperator() . '</td>';
            echo '<td>' . $date[$i]->getPrice() . '<br>' . $date[$i]->getGPrice() . '</td>';
            echo '<td><a href="./SearchDateListController.php?mro=' . base64_encode(serialize($dateListMro)) .'">prüfen</a></td>';
            echo '<td><a href="./SearchDateFlightController.php?mro=' . base64_encode(serialize($flightMro)) .'">flightDetails</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    public static function searchFlightsTemplate($flights, $mro) {
        Template::setHeader();
        echo '<table border="1" cellpadding="5" cellspacing="0" width="80%" rules="all">';
        echo '<tr bgcolor="#b0c4de">';
        echo '<th >Abflughafen</th>';
        echo '<th>Anreise</th>';
        echo '<th>R&uuml;ckreise</th>';
        echo '<th>Dauer</th>';
        echo '<th>Zielflughafen</th>';
        echo '<th>Veranstalter</th>';
        echo '<th>Preis p. P.</th>';
        echo '<th>Departure</th>';
        echo '<th>Ref.</th>';
        echo '</tr>';

        $flightList = $flights->getFlightList();
       var_dump($flightList);
        for ($i = 0; $i < count($flightList); $i++) {
            $color = $i % 2 == 0 ? '#ffffff' : '#d3d3d3';
            echo '<tr bgcolor="' . $color . '" width="100%">';
            echo '<td>' . $flightList[$i]->getDeparture() . '</td>';
            echo '<td>' . $flightList[$i]->getDate() . '</td>';
            echo '<td>' . $flightList[$i]->getBday() . '</td>';
            echo '<td>' . $flightList[$i]->getDays() . '</td>';
            echo '<td>' . $flightList[$i]->getTlcz() . '</td>';
            echo '<td>' . $flightList[$i]->getTourOperator() . '</td>';
            echo '<td>' . $flightList[$i]->getPrice() . '</td>';
            $image=$flightList[$i]->getTourOperator();
            echo '<td>' . $flightList[$i]->getTlca() . '</td>';;
            echo '<td> <img src="http://web3.travel-it.com/static/images/va/'.$image.'_35.png" alt=""></td>';
            echo '</tr>';
        }
        echo '</table>';
    }

    public static function bookingRequestTemplate($book, $mro) {
        $mro->setVgnr($book->getVgnr());

        Template::setHeader();
        $html = "<form action=\"./BookingRequestController.php?mro='" . base64_encode(serialize($mro)) . "'\" method=\"post\">
        <table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <td>Die Reise ist noch frei</td>
            </tr>
            <tr>
                <td>Sie können uns nun einen verbindlichen Buchungsauftrag zuschicken</td>
            </tr>
        </table>
        <br>
        <table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <th align=\"Left\" colspan=\"4\">Reiseinformationen</th>
            </tr>
            <tr>
                <td><img src=\"http://thumbnails.travel-it.com/g2thmb.php?gid=" . $book->getGid() . "\" /></td>
                <td>" . Template::getUebersicht($book) . "</td>
            </tr>
        </table>
        <br>
        " . Template::getVeranstalterHinweis($book) . "
        <br>
        " . Template::getPreisinformationen($book) . "
        <br>
        " . Template::getReiseanmelderFormular() . "
        <br>
        " . Template::getReiseteilnehmerFormular($mro->getPersons() + $mro->getChildren() . lenght) . "
        <br>
        " . Template::getBezahlungsartFormular($book->getPayment()) . "
        <br> 
        <table>
            <tr>
                <th align=\"Left\" colspan=\"2\">Geschäftsbedingungen des Anbieters</th>
            </tr>
            <tr>
                <td><input type=\"checkbox\" name=\"agb\" /></td>
                <td>Ich akzeptiere die Allgemeinen Geschäftsbedingungen des Reiseveranstalters und erkenne diese zugleich für alle Reiseteilnehmer an.</td>
            </tr>
        </table>
        <br>
        <input type=\"submit\" value=\"buchen\">
        </form>";

        echo $html;
    }

    private static function getUebersicht($book) {
        $str = "<table cellspacing=\"2\" cellpadding=\"4\">
                        <tr>
                            <td>Hotel:</td>
                            <td align=\"Right\"><b>" . $book->getHotel() . "</b></td>
                        </tr>
                        <tr>
                            <td>Kategorie:</td>
                            <td align=\"Right\"><b>" . $book->getCat() . "</b></td>
                        </tr>
                        <tr>
                            <td>Ort:</td>
                            <td align=\"Right\"><b>" . $book->getCity() . "</b></td>
                            <td>Land:</td>
                            <td align=\"Right\"><b>" . $book->getLName() . "</b></td>
                        </tr>
                        <tr>
                            <td>Zimmerart:</td>
                            <td align=\"Right\"><b>" . $book->getZt() . "</b></td>
                            <td>Verpflegung:</td>
                            <td align=\"Right\"><b>" . $book->getVt() . "</b></td>
                        </tr>
                        <tr>
                            <td>Anbieter:</td>
                            <td align=\"Right\"><b>" . $book->getTourOpName() . "</b></td>
                        </tr>
                        <tr>
                            <td>Abflug von:</td>
                            <td align=\"Right\"><b>" . $book->getDeparture() . "</b></td>
                            <td>Ziel:</td>
                            <td align=\"Right\"><b>" . $book->getDestination() . "</b></td>
                        </tr>
                        <tr>
                            <td>Termin:</td>
                            <td align=\"Right\"><b>" . $book->getDate() . "</b></td>
                            <td>Reisedauer:</td>
                            <td align=\"Right\"><b>" . $book->getDays() . " " . (($book->getDays() == 1) ? "Tag" : "Tage") . "</b></td>
                        </tr>
                    </table>";
        return $str;
    }

    private static function getVeranstalterHinweis($book) {
        $str = "<table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <th align=\"Left\">Veranstalterhinweis:</th>
            </tr>
            <tr>
                <td><code>" . str_replace("\n", "<br>", $book->getVinfo()) . "</code></td>
            </tr>
        </table>";
        return $str;
    }

    private static function getPreisinformationen($book) {
        $str = "<table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <th align=\"Left\" colspan=\"2\">Preisinformationen:</th>
            </tr>
            <tr>
                <td>Gesamtpreis:</td>
                <td align=\"Right\"><b>" . $book->getGprice() . "</b></td>
            </tr>
            <tr>
                <td  colspan=\"2\">Der Gesamtpreis setzt sich zusammen aus:</td>
            </tr>
            <tr>
                <td>je Erwachsender</td>
                <td align=\"Right\"><b>" . $book->getPrice() . "</b></td>
            </tr>
        </table>";
        return $str;
    }

    private static function getReiseanmelderFormular() {
        $str = "<table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <th align=\"Left\" colspan=\"4\">Reiseanmelder:</th>
            </tr>
            <tr>
                <td>Anrede</td>
                <td align=\"Right\">
                    <select name=\"r_anr\" onsubmit=\"this.form.ranr.options.value\">
                        <option value=\"\">Anrede</option>
                        <option value=\"H\">Herr</option>
                        <option value=\"\">Frau</option>
                    </select>
                </td>
                <td>Telefon Privat</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_tel1\">
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_name\">
                </td>
                <td>Telefon Büro</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_tel2\">
                </td>
            </tr>
            <tr>
                <td>Vorname</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_vname\">
                </td>
                <td>Fax</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_fax\">
                </td>
            </tr>
            <tr>
                <td>Strasse</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_strasse\">
                </td>
                <td>E-Mail</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_email\">
                </td>
            </tr>
            <tr>
                <td>PLZ / Ort</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"5\" name=\"r_plz\"><input type=\"text\" size=\"29\" name=\"r_ort\">
                </td>
                <td>Anmerkung</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"bem\">
                </td>
            </tr>
            <tr>
                <td>Land</td>
                <td align=\"Right\">
                    <input type=\"text\" size=\"40\" name=\"r_land\">
                </td>
            </tr>
        </table>";
        return $str;
    }

    private static function getReiseteilnehmerFormular($anzahlReiseteilnehmer) {

        $str = "<table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <th align=\"Left\" colspan=\"5\">Reiseteilnehmer:</th>
            </tr>
            <tr>
                <th align=\"Left\">Nr.</th>
                <th align=\"Left\">Anrede</th>
                <th align=\"Left\">Name</th>
                <th align=\"Left\">Vorname</th>
                <th align=\"Left\">Alter</th>
            </tr>";

        for ($i = 0; $i < $anzahlReiseteilnehmer; $i++) {
            $str .= "<tr>
                <td>" . ($i + 1) . "</td>
                <td><select name=\"p_anr[]\" onsubmit=\"this.form.panr.options.value\">
                        <option value=\"\">Anrede</option>
                        <option value=\"H\">Herr</option>
                        <option value=\"F\">Frau</option>
                    </select></td>
                <td><input type=\"text\" name=\"p_name[]\"></td>
                <td><input type=\"text\" name=\"p_vname[]\"></td>
                <td><input type=\"text\" name=\"p_alter[]\"></td>
                </tr>";
        }

        $str .= "</table>";

        return $str;
    }

    private static function getBezahlungsartFormular($payment) {
        $str = "<table>
            <tr>
                <th align=\"Left\" colspan=\"2\">Bezahlung</th>
            </tr>";
        $str .= "<tr height=\"10\"><td></td></tr>";
        if ($payment->getCC() == 1) {
            $str .= "<tr>
                <td><input type=\"radio\" name=\"paymode\" value=\"1\">Kreditkarte</td>
            </tr>";
            $str .= "<tr><td align=\"Left\" colspan=\"4\">" . $payment->getCcInfo() . "</td></tr>";

            $str .= "<tr><td>";
            $str .= "<select name=\"cctyp\">";
            foreach ($payment->getCards() as $value) {
                $str .= "<option>$value</option>";
            }
            $str .= "</select>";
            $str .= "</td></tr>";

            $str .= "<tr>";
            $str .= "<td>Kreditkartennr.</td><td><input type=\"text\" name=\"ccnr\"></td>";
            $str .= "<td>Gültig Monat</td><td><input type=\"text\" name=\"ccmm\"></td>";
            $str .= "<td>Gültig Jahr</td><td><input type=\"text\" name=\"ccyy\"></td>";
            $str .= "</tr>";
            $str .= "<tr height=\"10\"><td></td></tr>";
        }
        if ($payment->getLs() == 1) {
            $str .= "<tr>
                <td><input type = \"radio\" name=\"paymode\" value=\"2\">Bankeinzug</td>
                </tr>";
            $str .= "<tr><td align=\"Left\" colspan=\"4\">" . $payment->getLsInfo() . "</td></tr>";

            $str .= "<tr>";
            $str .= "<td>Kontonummer</td><td><input type=\"text\" name=\"lskto\"></td>";
            $str .= "<td>Bankleitzahl</td><td><input type=\"text\" name=\"lsblz\"></td>";
            $str .= "<td>Bank</td><td><input type=\"text\" name=\"lsbank\"></td>";
            $str .= "</tr>";
            $str .= "<tr height=\"10\"><td></td></tr>";
        }
        if ($payment->getUw() == 1) {
            $str .= "<tr>
                <td><input type = \"radio\" name=\"paymode\" value=\"4\" checked=\"checked\">Überweisung</td>
            </tr>";
            $str .= "<tr><td align=\"Left\" colspan=\"4\">" . $payment->getUwInfo() . "</td></tr>";
            $str .= "<tr height=\"10\"><td></td></tr>";
        }
        $str .= "</table>";

        return $str;
    }

    public static function bookingConfirmationTemplate($bookingConf) {
        Template::setHeader();
        $str = "<table cellspacing=\"2\" cellpadding=\"4\">
            <tr>
                <th align=\"Left\" colspan=\"4\">Sie haben folgende Reise gebucht:</th>
            </tr>
            <tr>
                <td><img src=\"http://thumbnails.travel-it.com/g2thmb.php?gid=" . $bookingConf->getGiata() . "\" /></td>
                <td>
                    <table cellspacing=\"2\" cellpadding=\"4\">
                        <tr>
                            <td>Hotel:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getHotel() . "</b></td>
                        </tr>
                        <tr>
                            <td>Kategorie:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getCat() . "</b></td>
                        </tr>
                        <tr>
                            <td>Ort:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getCity() . "</b></td>
                        </tr>
                        <tr>
                            <td>Zimmerart/Verpflegung</td>
                            <td align=\"Right\"><b>" . $bookingConf->getLstg() . "</b></td>
                        </tr>
                        <tr>
                            <td>Anbieter:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getTourOpName() . "</b></td>
                        </tr>
                        <tr>
                            <td>Abflug von:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getDeparture() . "</b></td>
                            <td>Ziel:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getDestination() . "</b></td>
                        </tr>
                        <tr>
                            <td>Termin:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getDate() . "</b></td>
                            <td>Reisedauer:</td>
                            <td align=\"Right\"><b>" . $bookingConf->getDays() . " " . (($bookingConf->getDays() == 1) ? "Tag" : "Tage") . "</b></td>
                        </tr>
                        <tr>
                            <td>Gesamtpreis</td>
                            <td align=\"Right\"><b>" . $bookingConf->getGprice() . "</b></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table";
        echo $str;
    }

    public static function errorTemplate($msg) {
        Template::setHeader();
        echo $msg;
    }

}

?>
