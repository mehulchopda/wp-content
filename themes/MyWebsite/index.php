<?php
get_header();?>
<body id="page-top" class="index">
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
							<a href="https://plus.google.com/u/0/" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
						</li>
						<li>
							<a href="https://www.linkedin.com/profile/view?id=AAIAAAwIzxEBdgotATfVPXh6sEQ0utQRppDRH4g&trk=nav_responsive_tab_profile_pic" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
						</li>
						<li>
							<a href="https://www.xing.com/profile/Mehul_Chopada?sc_o=mxb_p" class="btn-social btn-outline"><i class="fa fa-fw fa-xing"></i></a>
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



</body>
</html>



