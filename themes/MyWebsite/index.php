<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Important Owl stylesheet -->
	<title>Mehul Chopda's Blog</title>

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

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body id="page-top" class="index">

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

			<a class="navbar-brand" href="#page-top">Mehul Chopda</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li class="hidden">
					<a href="#page-top"></a>
				</li>
				<li class="page-scroll">
					<a href="#home">Home</a>
				</li>
				<li class="page-scroll">
					<a href="#Blog">Blog</a>
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
<!-- Header -->
	<div class="container1" >
		<div class="row">
			<div class="col-lg-12 text-center">
				<!--<img class="mainimage" class="img-responsive" src="<?php /*bloginfo('template_url'); */?>/img/portfolio/2.gif">-->
			<div id="carousel-example-generic" class="carousel slide">
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


<!-- Portfolio Grid Section -->
<section id="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Portfolio</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 portfolio-item">
				<a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div>
					<img src="<?php bloginfo('template_url'); ?>/img/portfolio/cabin.png" class="img-responsive" alt="">
				</a>
			</div>
			<div class="col-sm-4 portfolio-item">
				<a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div>
					<img src="<?php bloginfo('template_url'); ?>/img/portfolio/cake.png" class="img-responsive" alt="">
				</a>
			</div>
			<div class="col-sm-4 portfolio-item">
				<a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
					<div class="caption">
						<div class="caption-content">
							<i class="fa fa-search-plus fa-3x"></i>
						</div>
					</div>
					<img src="<?php bloginfo('template_url'); ?>/img/portfolio/circus.png" class="img-responsive" alt="">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- About Section -->
<section class="success" id="about">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>About</h2>
				<hr class="star-light">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 text-center">
				<p>Web and App Development.<br> just open CV by clicking below link</p>
			</div>

			<div class="col-lg-8 col-lg-offset-2 text-center">

				<a href="<?php bloginfo('template_url'); ?>/CV_Mehul.pdf" class="btn btn-lg btn-outline" target="_blank">
					<i class="fa fa-download"></i> Download CV</a>
			</div>
		</div>
	</div>
</section>
<!-- Contact Section -->
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>Contact Me</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
				<!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
				<form name="sentMessage" id="contactForm" novalidate>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Name</label>
							<input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Email Address</label>
							<input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Phone Number</label>
							<input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<div class="row control-group">
						<div class="form-group col-xs-12 floating-label-form-group controls">
							<label>Message</label>
							<textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
							<p class="help-block text-danger"></p>
						</div>
					</div>
					<br>
					<div id="success"></div>
					<div class="row">
						<div class="form-group col-xs-12">
							<button type="submit" class="btn btn-success btn-lg">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!-- Footer -->
<footer class="text-center">
	<div class="footer-above">
		<div class="container">
			<div class="row">
				<div class="footer-col col-md-6">
					<h3>Location</h3>
					<p>Gerhart Hauptmann Straße 24<br>Kaiserslautern 67663, Germany</p>
				</div>
				<div class="footer-col col-md-6">
					<h3>Around the Web</h3>
					<ul class="list-inline">
						<li>
							<a href="https://www.facebook.com/mehul.chopda" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
						</li>
						<li>
							<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
						</li>
						<li>
							<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
						</li>
						<li>
							<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
						</li>
						<li>
							<a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
	<div class="footer-below">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					Copyright &copy; Mehul Chopda 2015
				</div>
			</div>
		</div>
	</div>
</footer>

<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-top page-scroll visible-xs visible-sm">
	<a class="btn btn-primary" href="#page-top">
		<i class="fa fa-chevron-up"></i>
	</a>
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
</html>



