<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holioday Lifestyle</title>
    <link rel="icon" href="<?php bloginfo('template_url');?>/images/favicon.ico" type="image/ico" sizes="16x16">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,500,400italic,500italic,700,700italic" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url');?>/css/owl.theme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/js/bootstrap-datepicker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="<?php bloginfo('template_url');?>/js/wrapMenuItems.js"></script>
    <script>
    function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: new google.maps.LatLng(49.660827, 7.367963),
            zoom: 8,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <style>
    #map {
        height: 800px;
    }
    </style>
</head>

<body>
    <div class="container-fluid nospacing">
        <div class="col-xs-1 logo_margin"></div>
        <div class="logo col-lg-2 col-md-3 col-sm-4 col-xs-7 nospacing pull-left">
            <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url');?>/images/holidaylifestyle-logo-24.png" alt="Holiday Lifestyle" title="Holiday Lifestyle" class="img-responsive full-width-img" /></a>
        </div>
        <div class="col-xs-1 logo_margin pull-right"></div>
        <div class="col-xs-1 nospacing burger_icon pull-right"><img src="<?php bloginfo('template_url');?>/images/burger_icon-28.png" class="img-responsive full-width-img" alt="" /></div>
        <div class="navigation col-lg-10 col-md-9 col-sm-8 col-xs-12 nospacing">
            <div class="nav-outer">
<?php
$defaults = array(
    'theme_location' => 'primary',
    'menu' => 'test'
);
?>
<?php
wp_nav_menu($defaults);
?>
            </div>
        </div>
