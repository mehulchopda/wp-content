<?php
/**
 * Created by PhpStorm.
 * User: Patrick Schwehm
 * Date: 12.11.2015
 * Time: 10:55
 */
?>
<?php
$path = "../wordpress/wp-content/themes/holidaylifestyle";
$starRating = get_post_meta($postId, '_starRating', true);
$ratings_plus = $starRating;
$ratings_minus = 5 - $ratings_plus;
$ratings_half_star = 0;

$bus = get_post_meta($postId, 'bus', true);
$airport = get_post_meta($postId, 'airport', true);
$cafe = get_post_meta($postId, 'cafe', true);
$restaurant = get_post_meta($postId, 'restaurant', true);
?>
<div class="clearfix"></div>
<div class="container nospacing content">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing country_details_white detailsSpacer">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
            <div class="span12">
                <div id="sync1" class="owl-carousel">
                    <?php
                    // get the Hotel-Images and wrap them for the owl-carousel.
                    foreach ($hotelImages as $hotelImage) {
                        foreach ($hotelImage as $hl) {
                            echo '<div class="item">';
                            echo '<div class="zoom-icon">';
                            echo '<a class="fancybox" href="'. $hl .'" data-fancybox-group="gallery"><img src="'. $hl .'" alt="" /></a>';
                            echo '</div>';
                            echo '<img src="'. $hl .'" class="img-responsive full-width-img" alt="" />';
                            echo '</div>';
                        }
                    }
                    ?>
                </div>
                <div id="sync2" class="owl-carousel thumbnails-large">
                    <?php
                    // get the Hotel-Images and wrap them for the owl-carousel (thumbnails).
                    foreach ($hotelImages as $hotelImage) {
                        foreach ($hotelImage as $hl) {
                            echo '<div class="item"><img src="'. $hl .'" class="img-responsive full-width-img" alt="" /></div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" id="details-tab"><a href="#details" aria-controls="details" role="tab" data-toggle="tab" aria-expanded="false">Details</a></li>
                <li role="presentation" class="not-active" id="umgebung-tab"><a href="#umgebung" aria-controls="umgebung" role="tab" data-toggle="tab">Umgebung</a></li>
                <li role="presentation" class="not-active" id="klima-tab"><a href="#klima" aria-controls="klima" role="tab" data-toggle="tab">Klima</a></li>
                <li role="presentation" class="not-active" id="booking-tab"><a href="#booking" aria-controls="booking" role="tab" data-toggle="tab">Buchung</a></li>
            </ul>
            <div class="tab-content nospacing">
                <div role="tabpanel" class="tab-pane bg-tab col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing active" id="details">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-heading"><?php echo $hotelTitle; ?></div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <ul class="stars-rating stars-rating-standalone">
                                    <?php
                                    if (strpos($ratings_plus, '.') !== false) {
                                    $ratings_plus = floatval($ratings_plus);
                                    for ($i = 0; $i < $ratings_plus - 1; $i++) {
                                    echo "<li ><img src ='" . $path . "/images/star.png' class='img-responsive star-hover' alt = '' title = '' ></li >";
                                    }
                                    echo "<li ><img src ='" . $path . "/images/half-star-25.png' class='img-responsive star-hover' alt = '' title = '' ></li >";
                                    for ($i = 0; $i < $ratings_minus - 1; $i++) {
                                    echo "<li ><img src ='" . $path . "/images/blank-star.png' class='img-responsive star-hover' alt = '' title = '' ></li >";
                                    }
                                    } else {
                                    for ($i = 0; $i < $ratings_plus; $i++) {
                                    echo "<li ><img src ='" . $path . "/images/star.png' class='img-responsive star-hover' alt = '' title = '' ></li >";
                                    }
                                    for ($i = 0; $i < $ratings_minus; $i++) {
                                    echo "<li ><img src ='" . $path . "/images/blank-star.png' class='img-responsive star-hover' alt = '' title = '' ></li >";
                                    }
                                    }
                                    echo '</ul>'; ?>
                            </div>
                            <div class="col-md-3  col-sm-12 col-xs-12 text-right">
                                <?php echo '<ul class="icons-hover icons-hover-standalone">';
                                if ($bus == "on") {
                                    echo '<li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive bus-stop" alt="" data-original-title="Near Busstop"></li>';
                                }
                                if ($airport == "on") {
                                    echo '<li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive airport" alt="" data-original-title="Near Airport"></li>';
                                }
                                if ($cafe == "on") {
                                    echo '<li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive cafe" alt="" data-original-title="Cafe"></li>';
                                }
                                if ($restaurant == "on") {
                                    echo '<li><img src="' . get_bloginfo('template_url') . '/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive restaurant" alt="" data-original-title="Restaurant"></li>';
                                }
                                echo '</ul>'; ?>
                            </div>
                        </div>


                        <div class="clearfix"></div>
                        <div class="voffset2"></div>
                            <div class="about-hotel">
                                <?php
                                // Get the Content for the detailed Hotel description.
                                $my_postid = $postId;
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                                echo $content;
                                ?>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane bg-tab col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing" id="umgebung">
                    <div class="detail-heading">Umgebung</div>
                    <div class="details-tab-content">
                    <?php
                        // Content for the Umgebung Tab.
                        $umgebung = get_field( "umgebung", $postId);
                        echo $umgebung
                    ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane bg-tab col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing" id="klima">
                    <div class="detail-heading">Klima</div>
                    <div class="details-tab-content">
                    <?php
                        // Content for the Klima Tab.
                        $klima = get_field( "klima", $postId);
                        echo $klima;
                    ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane bg-tab col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing" id="booking">
                    <div class="detail-heading">Reisedaten &amp; Preise</div>
                    <div class="clearfix"></div>
                    <div class="voffset2"></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing angebote filtern">
                        <div class="section-heading">Angebote Filtern</div>
                        <div class="clearfix"></div>
                        <div class="voffset2"></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                            <form name="weiter_form" method="get" action=<?php htmlspecialchars($_SERVER[ "PHP_SELF"]); ?>>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing">
                                    <div class="input-labels col-lg-4 col-md-4 col-sm-4 col-xs-4 nospacing form-spacing">
                                        <input type="radio" class="col-lg-2 col-md-2 col-sm-2 col-xs-1 nospacing" name="flight-option" id="flugAndHotelRadioButton" value="2" />Flug & Hotel
                                    </div>
                                    <div class="input-labels col-lg-4 col-md-4 col-sm-4 col-xs-4 nospacing form-spacing">
                                        <input type="radio" class="col-lg-2 col-md-2 col-sm-2 col-xs-1 nospacing" name="flight-option" id="hotelRadioButton" value="3" />Hotel
                                    </div>
                                    <div class="input-labels col-lg-4 col-md-4 col-sm-4 col-xs-4 nospacing form-spacing" id="nur-fluge-text">
                                        <input type="checkbox" class="col-lg-2 col-md-2 col-sm-2 col-xs-1 nospacing" id="nurDirektflugeCheckBox" />Nur Direktflüge
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column">
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/von-icon-27.png" alt="" id="flug-option-left-icon" /></div>
                                            <!--<input type="text" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" value="Abflugzeit" onFocus="if(this.value=='Abflugzeit'){this.value=''}" onBlur="if(this.value==''){this.value='Abflugzeit'}" id="flug-option-left" />-->
                                            <select class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" id="abflugzeit">
                                                <option value="00:00-24:00">Beliebig</option>
                                                <option value="00:00-11:00">00:00 - 11:00</option>
                                                <option value="11:00-16:00">11:00 - 16:00</option>
                                                <option value="16:00-24:00">16:00 - 00:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column">
                                        <div class="clearfix"></div>
                                        <div class="border-div phone-input-spacing">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/von-icon-27.png" alt="" id="ruckflugzeit-icon" /></div>
                                            <!--<input type="text" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" value="Rückflugzeit" onFocus="if(this.value=='Rückflugzeit'){this.value=''}" onBlur="if(this.value==''){this.value='Rückflugzeit'}" id="ruckflugzeit" />-->
                                            <select class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" id="rueckflugzeit">
                                                <option value="00:00-24:00">Beliebig</option>
                                                <option value="00:00-11:00">00:00 - 11:00</option>
                                                <option value="11:00-16:00">11:00 - 16:00</option>
                                                <option value="16:00-24:00">16:00 - 00:00</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column form-spacing">
                                        <div class="input-labels col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">Abflug von
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/nach-icon-27.png" alt="" id="abflugVon-icon" /></div>
                                            <select name="departureAirport[]" id="abflugVon" onsubmit="this.form.departureAirport[0].options.key" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing">
                                                <option value="">Bitte wählen</option>
                                                <?php

                                                foreach ($departureAirports as $key => $value) {
                                                    echo "<option value=\"$key\">$value</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column form-spacing">
                                        <div class="input-labels col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                            Reisedaten
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/datum-icon-27.png" alt="" /></div>
                                            <input type="text" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" id="datum-id-left" autocomplete="off" value="Reisedaten" onFocus="if(this.value=='Reisedaten'){this.value=''}" onBlur="if(this.value==''){this.value='Reisedaten'}" />
                                            <ul class="date-dropdown-filter col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                                <img src="<?php bloginfo('template_url') ?>/images/up-arrow.png" class="datum-up-arrow" alt="" />
                                                <div class="clearfix"></div>
                                                <div class="date-head">Reisedaten</div>
                                                <div class="close-form-details-page"><img src="<?php bloginfo('template_url') ?>/images/close-34.png" alt="" />
                                                </div>
                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <ul class="nav datum-tabs" role="tablist">
                                                    <li role="presentation" class="active"><a href="#exakte-left" aria-controls="details" role="tab" data-toggle="tab">Exakte
                                                            Daten</a></li>
                                                    <li role="presentation"><a href="#flexible-left" aria-controls="facts" role="tab" data-toggle="tab">Flexible
                                                            Daten</a></li>
                                                </ul>
                                                <div class="datum-tabs">
                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active col-lg-12 col-md-12 col-sm-12 col-xs-12" id="exakte-left">
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="form-label">Abreisedatum</div>
                                                            <input type="text" id="date-picker6" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="form-label">Rückreisedatum</div>
                                                            <input type="text" id="date-picker7" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="date-btn col-lg-6 col-md-6 col-sm-12 col-xs-12" id="getDetailsDate">ÜBERNEHMEN
                                                            </div>
                                                        </div>
                                                        <div role="tabpanel" class="tab-pane col-lg-12 col-md-12 col-sm-12 col-xs-12" id="flexible-left">
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="form-label">Abreisedatum</div>
                                                            <input type="text" id="date-picker8" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="form-label">Rückreisedatum</div>
                                                            <input type="text" id="date-picker9" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="form-label">Reisedauer</div>
                                                            <select class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox" id="reisedauer2">
                                                                    <optgroup label="Genau">
                                                                    <option value="7">1 Woche</option>
                                                                    <option value="14">2 Wochen</option>
                                                                    <option value="1">1 Nacht</option>
                                                                    <option value="2">2 Nächte</option>
                                                                    <option value="3">3 Nächte</option>
                                                                    <option value="4">4 Nächte</option>
                                                                    <option value="5">5 Nächte</option>
                                                                    <option value="6">6 Nächte</option>
                                                                    <option value="8">8 Nächte</option>
                                                                    <option value="9">9 Nächte</option>
                                                                    <option value="10">10 Nächte</option>
                                                                    <option value="11">11 Nächte</option>
                                                                    <option value="12">12 Nächte</option>
                                                                    <option value="13">13 Nächte</option>
                                                                    <optgroup label="Variabel">
                                                                        <option value="1-8" selected="selected">1-8 Nächte
                                                                        </option>
                                                                        <option value="1-3">1-3 Nächte</option>
                                                                        <option value="4-5">4-5 Nächte</option>
                                                                        <option value="6-8">6-8 Nächte</option>
                                                                        <option value="9-15">9-15 Nächte</option>
                                                                        <option value="16-22">16-22 Nächte</option>
                                                                    </optgroup>
                                                                </optgroup>
                                                            </select>
                                                            <div class="clearfix"></div>
                                                            <div class="voffset2"></div>
                                                            <div class="date-btn col-lg-6 col-md-6 col-sm-12 col-xs-12" id="flexButton">ÜBERNEHMEN
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column form-spacing">
                                        <div class="input-labels col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                            Reiseteilnehmer
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/hotel-icon-27.png" alt="" /></div>
                                            <input type="text" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" value="Reiseteilnehmer" onFocus="if(this.value=='Reiseteilnehmer'){this.value=''}" onBlur="if(this.value==''){this.value='Reiseteilnehmer'}" id="reiseteilnehmer" />
                                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing datum-tabs-reiseteilnehmer" id="datum-tabs-reiseteilnehmer">
                                                <img src="<?php bloginfo('template_url') ?>/images/up-arrow.png" class="datum-up-arrow" alt="" />
                                                <div class="clearfix"></div>
                                                <div class="date-head">Reiseteilnehmer</div>
                                                <div class="close-form-reiseteilnehmer"><img src="<?php bloginfo('template_url') ?>/images/close-34.png" alt="" /></div>
                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                                    <div class="border-div">
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing">
                                                            <img src="<?php bloginfo('template_url') ?>/images/guest-icon-27.png" alt="" /></div>
                                                        <select class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-select nospacing" id="persons">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option>6</option>
                                                        </select>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="voffset2"></div>
                                                    <div class="border-div">
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing">
                                                            <img src="<?php bloginfo('template_url') ?>/images/kids-icon-29.png" alt="Kids" title="Kids" id="mine" /></div>
                                                        <select class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-select nospacing" id="chooseKids">
                                                            <option>0</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                        </select>
                                                    </div>
                                                    <div class="onekid">
                                                        <div class="clearfix"></div>
                                                        <div class="voffset2"></div>
                                                        <div class="form-label">Geburtsdatum 1. Kind</div>
                                                        <input type="text" id="date-picker11" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                    </div>
                                                    <div class="twokid">
                                                        <div class="clearfix"></div>
                                                        <div class="voffset2"></div>
                                                        <div class="form-label">Geburtsdatum 2. Kind</div>
                                                        <input type="text" id="date-picker12" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                    </div>
                                                    <div class="threekid">
                                                        <div class="clearfix"></div>
                                                        <div class="voffset2"></div>
                                                        <div class="form-label">Geburtsdatum 3. Kind</div>
                                                        <input type="text" id="date-picker13" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                    </div>
                                                    <div class="fourkid">
                                                        <div class="clearfix"></div>
                                                        <div class="voffset2"></div>
                                                        <div class="form-label">Geburtsdatum 4. Kind</div>
                                                        <input type="text" id="date-picker14" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="voffset2"></div>
                                                    <div class="date-btn col-lg-6 col-md-6 col-sm-12 col-xs-12" id="getNumOfPersons">ÜBERNEHMEN
                                                    </div>
                                                </div>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column form-spacing">
                                        <div class="input-labels col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                            Zimmertyp
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/hotel-icon-27.png" alt="" /></div>
                                            <select name="zimmer" id="zimmer" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing">
                                                <option value="">Bitte wählen</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column form-spacing">
                                        <div class="input-labels col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                            Verpflegung
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url') ?>/images/inclusive-icon-27.png" alt="" /></div>
                                            <select name="verflegung" id="verflegung" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-select nospacing">
                                                <option value="">Bitte wählen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column">
                                        <div class="input-labels col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing form-spacing">
                                            &nbsp;</div>
                                        <div class="clearfix"></div>
                                        <div class="border-div">
                                            <button class="col-lg-12 col-md-12 col-sm-12 col-xs-12 submit_btn text-center left-search">
                                                Suchen
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="voffset2"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="voffset2"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 booking-content nospacing" id="table_data">
            <!--Table Data Will Come Here-->
            <!--//TAble Data Ends-->
        </div>


