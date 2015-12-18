<?php
/*
Template Name: Newcomer
 */
?>
    <?php
get_header();
?>
        <div class="clearfix"></div>

        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid nospacing">
                    <div class="clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <ul class="bread-crumb">
                            <li><a href="#">Startseite</a></li>
                            <li>&raquo;</li>
                            <li><a href="#">Reiseziele</a></li>
                            <li>&raquo;</li>
                            <li><a href="#">Asien</a></li>
                            <li>&raquo;</li>
                            <li><a href="#">Indien</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <a href="#">
                            <div class="kartenansicht"><img src="<?php bloginfo('template_url');?>/images/nach-icon-27.png" class="img-responsive grey-icon" alt="" />
                                <img src="<?php bloginfo('template_url');?>/images/nach-icon-27-white.png" class="img-responsive white-icon" alt="" />
                            </div>
                            <div class="voffset2"></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid nospacing">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
                    <div class="main-image-text text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">Neuigkeiten</div>
                </div>
                <img src="<?php bloginfo('template_url');?>/images/neuigkeiten.jpg" class="full-width-img img-responsive" alt="" />
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="voffset2"></div>
        <div class="container nospacing content">
            <?php
$args = array(
	'category_name' => 'newcomer_post',
);
?>
<?php

$posts = get_posts($args);
foreach ($posts as $post): setup_postdata($post);

	?>

								                    <!---->
								<!--                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing country_details_white">
								                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
								                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing">
								                                <div class="span12">
								                                    <div id="sync1" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
								                                        <div class="owl-wrapper-outer">
								                                            <div class="owl-wrapper" style="width: 3000px; left: 0px; display: block;">
								                                                <div class="owl-item" style="width: 250px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel1-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 250px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel2-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 250px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel3-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 250px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel4-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 250px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel1-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 250px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel2-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                            </div>
								                                        </div>
								                                        <div class="owl-controls clickable">
								                                            <div class="owl-buttons">
								                                                <div class="owl-prev">prev</div>
								                                                <div class="owl-next">next</div>
								                                            </div>
								                                        </div>
								                                    </div>
								                                    <div id="sync2" class="owl-carousel thumbnails owl-theme" style="opacity: 1; display: block;">
								                                        <div class="owl-wrapper-outer">
								                                            <div class="owl-wrapper" style="width: 756px; left: 0px; display: block;">
								                                                <div class="owl-item synced" style="width: 63px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel1-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 63px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel2-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 63px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel3-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 63px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel4-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 63px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel1-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                                <div class="owl-item" style="width: 63px;">
								                                                    <div class="item"><img src="<?php bloginfo('template_url');?>/images/hotel2-29.jpg" class="img-responsive full-width-img" alt=""></div>
								                                                </div>
								                                            </div>
								                                        </div>
								                                        <div class="owl-controls clickable">
								                                            <div class="owl-pagination">
								                                                <div class="owl-page active"><span class=""></span></div>
								                                                <div class="owl-page"><span class=""></span></div>
								                                            </div>
								                                        </div>
								                                    </div>
								                                </div>
								                            </div>
								                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light_bg nospacing">
								                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 nospacing">
								                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-div">
								                                        <div class="voffset2"></div>
								                                        <div class="country_heading">The Park View (New Delhi, India)</div>
								                                        <div class="clearfix"></div>
								                                        <div class="country_text">
								                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
								                                        </div>
								                                        <div class="clearfix"></div>
								                                        <div class="voffset4"></div>
								                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
								                                            <ul class="icons-hover">
								                                                <li><img src="<?php bloginfo('template_url');?>/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive airport" alt="" data-original-title="Near Airport"></li>
								                                                <li><img src="<?php bloginfo('template_url');?>/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive bus-stop" alt="" data-original-title="Near Bus Stop"></li>
								                                                <li><img src="<?php bloginfo('template_url');?>/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive cafe" alt="" data-original-title="Cafe"></li>
								                                                <li><img src="<?php bloginfo('template_url');?>/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="" class="img-responsive restaurant" alt="" data-original-title="Restaurant"></li>
								                                            </ul>
								                                        </div>
								                                    </div>
								                                </div>
								                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nospacing right_column_white">
								                                    <div class="top-arrow">
								                                        <img src="<?php bloginfo('template_url');?>/images/triangle-30-white.png" alt="" class="top-arrow">
								                                    </div>
								                                    <div class="bottom-arrow">
								                                        <img src="<?php bloginfo('template_url');?>/images/triangle-down-white.png" alt="" class="down-arrow">
								                                    </div>
								                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 nospacing">
								                                        <div class="price-heading">€ 100</div>
								                                        <div class="price-subhead">Pro Nacht</div>
								                                    </div>
								                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 nospacing"></div>
								                                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4 nospacing">
								                                        <form action="hotel-details.html">
								                                            <button class="read_more_btn">Weiterlesen</button>
								                                        </form>
								                                    </div>
								                                    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
								                                </div>
								                            </div>
								                        </div>
								                    </div> -->
								                    <!---->
								        </div>
								        <div class="clearfix"></div>
								        <div class="voffset6"></div>

								<?php
endforeach;
wp_reset_postdata();
?>
<?php
get_footer();
?>
