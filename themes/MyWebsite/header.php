<?php
/**
 * Created by PhpStorm.
 * User: Mehul
 * Date: 14/12/15
 * Time: 21:02
 */
?>

<!DOCTYPE html>
<html lang="en">
<body>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Important Owl stylesheet -->
    <title>Mehul Chopda's Blog2</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php bloginfo('template_url'); ?>/css/freelancer.css" rel="stylesheet">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/owl.theme.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="<?php bloginfo('template_url'); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/clean-blog.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="logo">
        </div>
        <!--<div class="logo"><img  src="<?php /*bloginfo('template_url'); */?>/img/logo.jpg"></div>-->
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo home_url(); ?>">Mehul Chopda</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="<?php echo home_url(); ?>">Home</a>
                </li>
                <li class="page-scroll">
                    <?php
                    $defaults = array(
                        'theme_location' => 'primary',
                    );
                  echo '<a href='.wp_list_pages('title_li=').'></a>';
                    ?>
                </li>

                <li class="page-scroll">
                    <a href="#about">About me</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact me</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapses -->
    </div>
    <!-- /.container-fluid -->
</nav>

<div class="container1" >
    <div class="row">
        <div class="col-lg-12 text-center">
            <!--<img class="mainimage" class="img-responsive" src="<?php /*bloginfo('template_url'); */?>/img/portfolio/2.gif">-->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides1 -->
                <div class="carousel-inner" role="listbox">
                    <!-- First slide -->
                    <div class="item active deepskyblue">
                        <div class="carousel-caption">
                            <h3 data-animation="animated bounceInLeft">
                                This is the caption for slide 1
                            </h3>

                            <button class="btn btn-primary btn-lg" data-animation="animated zoomInUp">Button</button>
                        </div>
                    </div> <!-- /.item -->

                    <!-- Second slide -->
                    <div class="item skyblue">
                        <div class="carousel-caption">
                            <h3 data-animation="animated bounceInUp">
                                This is the caption for slide 2
                            </h3>
                            <button class="btn btn-primary btn-lg" data-animation="animated zoomInRight">Button</button>
                        </div>
                    </div><!-- /.item -->

                    <!-- Third slide -->
                    <div class="item darkerskyblue">
                        <div class="carousel-caption">
                            <h3 data-animation="animated flipInX">
                                This is the caption for slide 3
                            </h3>
                            <button class="btn btn-primary btn-lg" data-animation="animated lightSpeedIn">Button</button>
                        </div>

                    </div><!-- /.carousel-inner -->

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div><!-- /.carousel -->

            </div><!-- /.container -->
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/owl.carousel.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/classie.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/cbpAnimatedHeader.js"></script>

<!-- Contact Form JavaScript -->
<script src="<?php bloginfo('template_url'); ?>/js/jqBootstrapValidation.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/contact_me.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php bloginfo('template_url'); ?>/js/freelancer.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/scripts.js"></script>


</body>


