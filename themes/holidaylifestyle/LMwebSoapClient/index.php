<?php
include_once 'readCfgFiles/readCfgFiles.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>LMweb</title>
        <script type="text/javascript">
            function setOptionsDestination(o){ 
                var select2 = document.form.destination; 
                select2.options.length = 0;
    
                if("" == o){   
                    select2.options[select2.options.length] = new Option('Bitte wählen Sie eine Region aus', '');
                    return;
                }
    
                var array = new Array();
    
                <?php
                    $array = ReadCfgFiles::readDestinationCfgFile("cfgFiles/destination.cfg");
                    foreach ($array as $rc => $region) {
                        echo "array['$rc'] = new Array();\n";
                        foreach ($region as $dc => $destination) {
                            echo "array['$rc']['$dc'] = '$destination';\n";
                        }
                    }
                ?>
                select2.options[select2.options.length] = new Option('Bitte wählen', '');
                for (var rc in array){
                    if(rc == o){
                        for(var dc in array[rc]){
                            select2.options[select2.options.length] = new Option(array[rc][dc], dc);
                    }
                    return;
                }    
            }
        }          
        </script>
        <script src="javaScript/checkFormular.js" type="text/javascript"></script>
    </head>
    <body>
        <form name="form" action="./controller/IndexController.php" method="get" onsubmit="return checkIndexFormular();">
            <table>
                <tr>
                    <td>
                        <h3>Reiseart</h3>
                    </td>                
                </tr>
                <tr>
                    <td>
                        Reiseart:
                    </td>
                    <td> 
                        <select name="journeyType" onsubmit="this.form.journeyType.options.value">
                            <?php
                            $journeyType = ReadCfgFiles::readCfgFile("cfgFiles/journeyType.cfg");
                            foreach ($journeyType as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3>Reisedaten</h3>
                    </td>                
                </tr>
                <tr>
                    <td>
                        Abflughafen:
                    </td>
                    <td>
                        <select name="departureAirport[]" onsubmit="this.form.departureAirport[0].options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $departureAirport = ReadCfgFiles::readCfgFile("cfgFiles/departureAirport.cfg");
                            foreach ($departureAirport as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        Reiseregion
                    </td>
                    <td>
                        <select name="region" onsubmit="this.form.region.options.value" 
                                onchange="setOptionsDestination(this.form.region.options[this.form.region.selectedIndex].value);">
                            <option value="">Bitte wählen</option>
                            <?php
                            $region = ReadCfgFiles::readCfgFile("cfgFiles/region.cfg");
                            foreach ($region as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <select name="departureAirport[]" onsubmit="this.form.departureAirport[1].options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $departureAirport = ReadCfgFiles::readCfgFile("cfgFiles/departureAirport.cfg");
                            foreach ($departureAirport as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        Reiseziel
                    </td>
                    <td>
                        <select name="destination" onsubmit="this.form.destination.options.value">
                            <option value="">Bitte wählen Sie eine Region aus</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <select name="departureAirport[]" onsubmit="this.form.departureAirport[2].options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $departureAirport = ReadCfgFiles::readCfgFile("cfgFiles/departureAirport.cfg");
                            foreach ($departureAirport as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>                   
                <tr>
                    <td>Anreise</td>
                    <td><input type="date" format="d.m.Y" name="departureDate" /></td>
                    <td>Dauer</td>
                    <td>
                        <select name="timeRange" onsubmit="this.form.timeRange.options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $timeRange = ReadCfgFiles::readCfgFile("cfgFiles/timeRange.cfg");
                            foreach ($timeRange as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Abreise</td>
                    <td><input type="date" format="d.m.Y" name="returnDate" /></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3>Reiseteilnehmer</h3>
                    </td>
                </tr>
                <tr>
                    <td>Anzahl Erwachsener</td>
                    <td>
                        <select name="persons" onsubmit="this.form.persons.options.value">
                            <?php
                            $persons = ReadCfgFiles::readCfgFile("cfgFiles/persons.cfg");
                            foreach ($persons as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>Kinder</td>
                    <td>
                        <select name="children[]"  onsubmit="this.form.children[0].options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $children = ReadCfgFiles::readCfgFile("cfgFiles/children.cfg");
                            foreach ($children as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select name="children[]"  onsubmit="this.form.children[1].options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $children = ReadCfgFiles::readCfgFile("cfgFiles/children.cfg");
                            foreach ($children as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <select name="children[]"  onsubmit="this.form.children[2].options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $children = ReadCfgFiles::readCfgFile("cfgFiles/children.cfg");
                            foreach ($children as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Unterkunft</h3>
                    </td>
                </tr>
                <tr>
                    <td>Verpflegung</td>
                    <td>
                        <select name="catering"  onsubmit="this.form.catering.options.value">
                            <option value="0">Bitte wählen</option>
                            <?php
                            $catering = ReadCfgFiles::readCfgFile("cfgFiles/catering.cfg");
                            foreach ($catering as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>Kategorie</td>
                    <td>
                        <select name="category"  onsubmit="this.form.category.options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $category = ReadCfgFiles::readCfgFile("cfgFiles/category.cfg");
                            foreach ($category as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Unterbringungsart</td>
                    <td>
                        <select name="room"  onsubmit="this.form.category.options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $room = ReadCfgFiles::readCfgFile("cfgFiles/room.cfg");
                            foreach ($room as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>                    
                <tr>
                    <td>
                        <h3>Preis</h3>
                    </td>
                </tr>
                <tr>
                    <td>maximaler Preis p. P.</td>
                    <td><input type="number" name="maxPrice" /></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>maximaler Preis</td>
                    <td><input type="number" name="gprice" /></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <h3>Veranstalter</h3>
                    </td>
                    <td><input type="text" name="tourOperator" /></td>
                </tr>
                <tr>
                    <td>
                        <h3>Hotel</h3>
                    </td>
                </tr>
                <tr>
                    <td>Hotelgruppe</td>
                    <td>
                        <select name="hotelChain"  onsubmit="this.form.category.options.value">
                            <option value="">Bitte wählen</option>
                            <?php
                            $hotelChain = ReadCfgFiles::readCfgFile("cfgFiles/hotelChain.cfg");
                            foreach ($hotelChain as $key => $value) {
                                echo "<option value=\"$key\">$value</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td>Hotel</td>
                    <td><input type="text" name="hotel"></td>
                </tr>
                <tr>
                    <td>Hotelname</td>
                    <td><input type="text" name="hotelname"></td>
                    <td>Hotelort</td>
                    <td><input type="text" name="hotelcity"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <h3>Global Types</h3>
                    </td>
                </tr>
                <?php
                $gt = ReadCfgFiles::readCfgFile("cfgFiles/gt.cfg");
                $count = 1;
                echo '<tr>';
                foreach ($gt as $key => $value) {
                    echo "<td width=\"25%\"><input type=\"checkbox\" name=\"gt[]\" value=\"$key\">$value</input></td>";
                    if ($count % 4 == 0) {
                        echo '</tr>';
                        echo '<tr>';
                    }
                    $count++;
                }
                echo '</tr>';
                ?>
            </table>
            <button name="submit" value="abschicken">abschicken</button>
        </form>
    </body>
</html>