<?php
include_once 'LMwebSoapClient/readCfgFiles/readCfgFiles.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content=<?php bloginfo('html_type'); ?>; charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holiday Lifestyle</title>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/ico" sizes="16x16">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,500italic,700,700italic"
          rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/customStyles.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/menu.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap-datepicker.js"></script>

    <script src="<?php bloginfo('template_url'); ?>/js/helper.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/source/jquery.fancybox.css?v=2.1.5"
          media="screen"/>
    <script src="<?php bloginfo('template_url'); ?>/js/checkFormular.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
    <link href="<?php bloginfo('template_url'); ?>/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
</head>

<body>
<div class="loader"></div>
<div class="container-fluid nospacing">
    <div class="fixed-header navbar-fixed-top">
        <div class="col-xs-1 logo_margin"></div>
        <div class="logo col-lg-2 col-md-2 col-sm-2 col-xs-7 nospacing pull-left"><a
                href="<?php echo home_url(); ?>"><img
                    src="<?php bloginfo('template_url'); ?>/images/holidaylifestyle-logo-24.png" alt="Holiday Lifestyle"
                    title="Holiday Lifestyle" class="img-responsive full-width-img"/></a></div>
        <div class="col-xs-1 logo_margin pull-right"></div>
        <div class="col-xs-1 nospacing burger_icon pull-right"><img
                src="<?php bloginfo('template_url'); ?>/images/burger_icon-28.png" class="img-responsive full-width-img"
                alt=""/></div>
        <div class="navigation nospacing col-lg-10 col-md-10 col-sm-10 col-xs-12">
            <div class="nav-outer">
                <?php
                $defaults = array(
                    'theme_location' => 'primary',
                );
                wp_nav_menu($defaults);
                ?>
            </div>
        </div>
        <div class="clearfix device"></div>
        <div class="voffset2 device"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 device-search-tab-outer">
            <div class="device-search-tab">Suchen</div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 device-continent-tab-outer">
            <div class="device-continent-tab">Kontinents</div>
        </div>
        <div class="clearfix device"></div>
        <div class="voffset2 device"></div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 scroll-form form-header">
            <div class="travel-form col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                <form id="header_submit" autocomplete="off">

                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 nospacing">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-column">
                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-6 nospacing">
                                <div class="input-icon-flug col-lg-4 col-md-4 col-sm-4 col-xs-2 nospacing border-div"
                                     id="von-icon-outer">
                                    <img src="<?php bloginfo('template_url'); ?>/images/von-icon-27.png" alt=""
                                         class="icon-img von-icon"/>
                                    <img src="<?php bloginfo('template_url'); ?>/images/von-icon-27-white.png" alt=""
                                         class="icon-img von-icon-white"/>
                                </div>
                                <div
                                    class="col-lg-8 col-md-8 col-sm-8 col-xs-10 input-text-label nospacing flug-and-hotel">
                                    &nbsp;&nbsp;Flug & Hotel
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 nospacing form-column">
                                <div class="input-icon-flug col-lg-6 col-md-6 col-sm-6 col-xs-2 nospacing border-div"
                                     id="hotel-icon-outer">
                                    <img src="<?php bloginfo('template_url'); ?>/images/hotel-icon-27.png" alt=""
                                         class="icon-img hotel-icon"/>
                                    <img src="<?php bloginfo('template_url'); ?>/images/hotel-icon-27-white.png" alt=""
                                         class="icon-img hotel-icon-white"/>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-10 input-text-label nospacing">&nbsp;&nbsp;Hotel</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column">
                            <div class="border-div">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img
                                        src="<?php bloginfo('template_url'); ?>/images/von-icon-27.png" alt=""/></div>
                                <input type="text" name="departureAirport" id="departureAirport"
                                       class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" value="Von"
                                       onFocus="if(this.value=='Von'){this.value=''}"
                                       onBlur="if(this.value==''){this.value='Von'}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 nospacing">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column">
                            <div class="clearfix"></div>
                            <div class="border-div">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img
                                        src="<?php bloginfo('template_url'); ?>/images/nach-icon-27.png" alt=""/></div>
                                <input type="text" name="destination" id="destination"
                                       class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing" value="Nach"
                                       onFocus="if(this.value=='Nach'){this.value=''}"
                                       onBlur="if(this.value==''){this.value='Nach'}"/>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 nospacing form-column">
                            <div class="clearfix"></div>
                            <div class="border-div">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img
                                        src="<?php bloginfo('template_url'); ?>/images/datum-icon-27.png" alt=""/></div>
                                <input type="text" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-text nospacing"
                                       id="datum-id" autocomplete="off" value="Datum"
                                       onFocus="if(this.value=='Datum'){this.value=''}"
                                       onBlur="if(this.value==''){this.value='Datum'}"/>
                                <ul class="date-dropdown col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                    <img src="<?php bloginfo('template_url'); ?>/images/up-arrow.png" class="datum-up-arrow" alt=""/>
                                    <div class="clearfix"></div>
                                    <div class="date-head">Reisedaten</div>
                                    <div class="close-form-dropdown"><img
                                            src="<?php bloginfo('template_url'); ?>/images/close-34.png" alt=""/></div>
                                    <div class="clearfix"></div>
                                    <div class="voffset2"></div>
                                    <ul class="nav datum-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#exakte" aria-controls="details"
                                                                                  role="tab" data-toggle="tab">Exakte
                                                Daten</a></li>
                                        <li role="presentation"><a href="#flexible" aria-controls="facts" role="tab"
                                                                   data-toggle="tab">Flexible Daten</a></li>
                                    </ul>
                                    <div class="datum-tabs">
                                        <div class="tab-content">
                                            <div role="tabpanel"
                                                 class="tab-pane active col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                 id="exakte">
                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="form-label">Abreisedatum</div>
                                                <input type="text" name="departureDate" id="date-picker3"
                                                       class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">

                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="form-label">Rückreisedatum</div>
                                                <input type="text" name="returnDate" id="date-picker4"
                                                       class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">

                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="date-btn col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                                     id="button-click">ÜBERNEHMEN
                                                </div>
                                            </div>
                                            <div role="tabpanel"
                                                 class="tab-pane col-lg-12 col-md-12 col-sm-12 col-xs-12" id="flexible">
                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="form-label">Abreisedatum</div>
                                                <input type="text" name="departureDate" id="date-picker1"
                                                       class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">

                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="form-label">Rückreisedatum</div>
                                                <input type="text" name="returnDate" id="date-picker2"
                                                       class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">

                                                <div class="clearfix"></div>
                                                <div class="voffset2"></div>
                                                <div class="form-label">Reisedauer</div>
                                                <select
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox"
                                                    id="reisedauer">
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
                                                            <option value="1-8" selected="selected">1-8 Nächte</option>
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
                                                <div class="date-btn col-lg-6 col-md-6 col-sm-12 col-xs-12"
                                                     id="flexibleDatenUbernehmen">ÜBERNEHMEN
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 nospacing">
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 nospacing form-column">
                            <div class="border-div">
                                <input type="text" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-text nospacing"
                                       id="sonstiges" autocomplete="off" value="Sonstiges"
                                       onFocus="if(this.value=='Sonstiges'){this.value=''}"
                                       onBlur="if(this.value==''){this.value='Sonstiges'}"/>
                                <ul class="sonstiges-dropdown col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                    <img src="<?php bloginfo('template_url');?>/images/up-arrow.png"
                                         class="sonstiges-up-arrow" alt=""/>
                                    <div class="clearfix"></div>
                                    <div class="sonstiges-spacer">
                                    <div class="sonstiges-head">Sonstiges</div>
                                    <div class="close-form-dropdown"><img
                                            src="<?php bloginfo('template_url'); ?>/images/close-34.png" alt=""/></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                                        <div class="clearfix"></div>
                                        <div class="voffset2"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing">
                                                <img src="<?php bloginfo('template_url');?>/images/inclusive-icon-27.png" alt=""/>
                                            </div>
                                            <select onsubmit="this.form.catering.options.value" id="verflegung" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-select nospacing catering">
                                                <option value="0">Bitte wählen</option>
                                                <?php
                                                $catering = ReadCfgFiles::readCfgFile("../wordpress/wp-content/themes/holidaylifestyle/LMwebSoapClient/cfgFiles/catering.cfg");
                                                foreach ($catering as $key => $value) {
                                                    echo "<option value=\"$key\">$value</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="voffset2"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img
                                                    src="<?php bloginfo('template_url');?>/images/guest-icon-27.png"
                                                    alt=""/></div>
                                            <select name="persons" id="persons" onsubmit="this.form.persons.options.value" class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-select nospacing persons">
                                                <?php
                                                $persons = ReadCfgFiles::readCfgFile("../wordpress/wp-content/themes/holidaylifestyle/LMwebSoapClient/cfgFiles/persons.cfg");
                                                foreach ($persons as $key => $value) {
                                                    echo "<option value=\"$key\">$value</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="voffset2"></div>
                                        <div class="border-div">
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 input-icon nospacing"><img src="<?php bloginfo('template_url');?>/images/kids-icon-29.png" alt="Kids" title="Kids" /></div>
                                            <select class="col-lg-10 col-md-10 col-sm-10 col-xs-11 input-select nospacing" id="chooseKids2">
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
                                            <input type="text" id="date-picker15" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                        </div>
                                        <div class="twokid">
                                            <div class="clearfix"></div>
                                            <div class="voffset2"></div>
                                            <div class="form-label">Geburtsdatum 2. Kind</div>
                                            <input type="text" id="date-picker16" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                        </div>
                                        <div class="threekid">
                                            <div class="clearfix"></div>
                                            <div class="voffset2"></div>
                                            <div class="form-label">Geburtsdatum 3. Kind</div>
                                            <input type="text" id="date-picker17" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                        </div>
                                        <div class="fourkid">
                                            <div class="clearfix"></div>
                                            <div class="voffset2"></div>
                                            <div class="form-label">Geburtsdatum 4. Kind</div>
                                            <input type="text" id="date-picker18" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing date-textbox">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="voffset2"></div>
                                        <input class="getCatering" name="getCatering" type="text" val="" style="display: none;">
                                        <input class="getPersons" name="getPersons" type="text" val="" style="display: none;">
                                        <input class="getChildren" name="getChildren" type="text" val="" style="display: none;">
                                        <div class="date-btn col-lg-6 col-md-6 col-sm-12 col-xs-12 sonstiges_uebernehmen" id="getNumOfPersons_home">ÜBERNEHMEN</div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nospacing pull-right">
                            <button
                                class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing submit_btn pull-right text-center">
                                <img src="<?php bloginfo('template_url');?>/images/search-icon-27.png" alt=""
                                     class="img-responsive full-width-img search-icon"/>

                                <div class="search-text">Suchen</div>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nospacing scroll-burger nav-hidden pull-right">
            <img src="<?php bloginfo('template_url'); ?>/images/burger_icon-28.png" alt=""
                 class="full-width-img fixed-burger-menu pull-right"/>
        </div>


        <div class="container-fluid">
            <div class="row">


                <div class="clearfix"></div>
                <div class="slide_nav col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                    <ul class="list-inline container">
                        <li><a href="#">Afrika
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-down-nav-30.png" alt=""/></div>
                            <ul class="continent-dropdown temp-display">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a
                                        href="#">Egypt</a> <a href="#">Ethiopia</a> <a href="#">Zimbabwe</a> <a
                                        href="#">South Africa</a> <a href="#">Algeria</a> <a href="#">Nigeria</a> <a
                                        href="#">Kenya</a> <a href="#">Angola</a></div>
                            </ul>
                        </li>
                        <li><a href="#">Naher und Mittlere Osten
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-right-30.png" alt=""/></div>
                            <ul class="continent-dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a href="#">Australia</a>
                                    <a href="#">New Zealand</a></div>
                            </ul>
                        </li>
                        <li><a id="continent2" class="CH TH" href="#">Asien
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-right-30.png" alt=""/></div>
                            <ul class="continent-dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a class="CH"
                                        href="#">China</a> <a href="#">Thailand</a> <a href="#">Malaysia</a> <a
                                        href="#">Bhutan</a> <a href="#">Myanmar</a> <a href="#">Laos</a> <a href="#">Indonesia</a>
                                    <a href="#">Hong Kong</a> <a href="#">Pakisatan</a> <a href="#">Bangladesh</a> <a
                                        href="#">Nepal</a> <a href="#">India</a> <a href="#">Singapore</a> <a href="#">Japan</a>
                                    <a href="#">Mauritius</a> <a href="#">Sri Lanka</a></div>
                            </ul>
                        </li>
                        <li><a id="continent3" class="NL DE" href="#">Europa
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-right-30.png" alt=""/></div>
                            <ul class="continent-dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a class="AT" href="#">Austria</a>
                                    <a class="FR" href="#">France</a> <a class="NL" href="#">Netherlands</a> <a class="SW" href="#">Sweden</a> <a
                                        href="#">Hungary</a> <a href="#">Romania</a> <a href="#">Norway</a> <a href="#">Italy</a>
                                    <a href="#">Belgium</a> <a href="#">England</a> <a href="#">Poland</a> <a href="#">Romania</a>
                                    <a href="#">Iceland</a> <a href="#">Ireland</a> <a href="#">Scotland</a> <a
                                        href="#">Denmark</a> <a href="#">Germany</a></div>
                            </ul>
                        </li>
                        <li><a href="#">Nordamerika
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-right-30.png" alt=""/></div>
                            <ul class="continent-dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a
                                        href="#">USA</a> <a href="#">Canada</a> <a href="#">Bahamas</a> <a href="#">Barbados</a>
                                    <a href="#">Costa Rica</a> <a href="#">Mexico</a> <a href="#">El Salvador</a> <a
                                        href="#">Guatemala</a> <a href="#">Haiti</a> <a href="#">Honduras</a> <a
                                        href="#">Jamaica</a> <a href="#">Cuba</a></div>
                            </ul>
                        </li>
                        <li><a href="#">Karabik/Zentralamerika
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-right-30.png" alt=""/></div>
                            <ul class="continent-dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a href="#">Colombia</a>
                                    <a href="#">Peru</a> <a href="#">Chile</a> <a href="#">Argentina</a> <a href="#">Uruguay</a>
                                    <a href="#">Bolivia</a> <a href="#">Ecuador</a> <a href="#">Venezuela</a> <a
                                        href="#">Brazil</a></div>
                            </ul>
                        </li>
                        <li><a href="#">Indischer Ozean
                                <div class="arrow-outside">
                                    <div class="drop-arrow"><img
                                            src="<?php bloginfo('template_url'); ?>/images/top-arrow-25.png" alt=""/>
                                    </div>
                                </div>
                            </a>

                            <div class="right-arrow device"><img
                                    src="<?php bloginfo('template_url'); ?>/images/arrow-right-30.png" alt=""/></div>
                            <ul class="continent-dropdown">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a href="#">Colombia</a>
                                    <a href="#">Peru</a> <a href="#">Chile</a> <a href="#">Argentina</a> <a href="#">Uruguay</a>
                                    <a href="#">Bolivia</a> <a href="#">Ecuador</a> <a href="#">Venezuela</a> <a
                                        href="#">Brazil</a></div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
