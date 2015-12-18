<?php
/**
 * User: Patrick Schwehm
 * Date: 10.11.2015
 * Time: 14:35
 */
?>
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
    <link href="<?php bloginfo('template_url'); ?>/css/hotelDetails.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/menu.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/bootstrap-datepicker.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/hotel-details.js"></script>
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
                    title="Holiday Lifestyle" class="img-responsive full-width-img"/></a><a href=""class="backToSearch">Back</a></div>
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
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 nospacing scroll-burger nav-hidden pull-right">
            <img src="<?php bloginfo('template_url'); ?>/images/burger_icon-28.png" alt=""
                 class="full-width-img fixed-burger-menu pull-right"/>
        </div>


        <div class="container-fluid">
            <div class="row">


                <div class="clearfix"></div>
                <div class="slide_nav col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing slide_nav_details">
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
                                                                                                         href="#">China</a>
                                    <a href="#">Thailand</a> <a href="#">Malaysia</a> <a
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
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dropdown-content"><a class="AT"
                                                                                                         href="#">Austria</a>
                                    <a class="FR" href="#">France</a> <a class="NL" href="#">Netherlands</a> <a
                                        class="SW" href="#">Sweden</a> <a
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
