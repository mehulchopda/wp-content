<?php
/**
 * User: Patrick Schwehm
 * Date: 01.11.2015
 * Time: 20:06
 */

$attachments = get_attached_media('image', $post -> ID);
$triUp = '<img src="' . get_bloginfo('template_url') . '/images/triangle-30.png" alt="" class="top-arrow">';
$triDown = '<img src="' . get_bloginfo('template_url') . '/images/triangle-down.png" alt="" class="down-arrow">';

$temp = 0;
$m = 0;
$c = 0;

$path = "../wordpress/wp-content/themes/holidaylifestyle";
$ratings_plus = 0;
$ratings_minus = 0;

$args = array('post_type' => 'Hotels anlegen');
$loop = new WP_Query($args);
if ($loop -> have_posts()) {
	while ($loop -> have_posts()) {
		$loop -> the_post();

		$gid = get_post_meta($post -> ID, '_gid', true);

		$country = get_post_meta($post -> ID, '_country', true);
		$starRating = get_post_meta($post -> ID, '_starRating', true);
		$hotelTitle = get_post_meta($post -> ID, '_title', true);
		$postId = get_post_meta($post -> ID, '_postId', true);
		$minPrice = get_post_meta($post -> ID, '_minPrice', true);
		$aptd = get_post_meta($post -> ID, '_aptd', true);

		$bus = get_post_meta($post -> ID, 'bus', true);
		$airport = get_post_meta($post -> ID, 'airport', true);
		$cafe = get_post_meta($post -> ID, 'cafe', true);
		$restaurant = get_post_meta($post -> ID, 'restaurant', true);

		$attachments = get_attached_media('image', $post -> ID);

		$ratings_plus = $starRating;
		$ratings_minus = 5 - $ratings_plus;
		$ratings_half_star = 0;
		$m = $temp;
		$c = $temp + 1;
		$temp = $c + 1;

		$hotelImages = get_post_meta($post -> ID, 'hotelImage', true);

		echo '
		<div class="voffset4"></div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing children">
		<div class="countryId" style="display: none;">' . $country . '</div>
        <mark>' . $gid . '</mark>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing">
                <div class="span12">
                    <div class="sync' . $m . '" class="owl-carousel">';

		foreach ($hotelImages as $hotelImage) {
			foreach ($hotelImage as $hl) {
				echo '<div class="item"><img src="' . $hl . '" class="img-responsive full-width-img" alt=""></div>';
			}
		}
		echo '
		</div>
        <div class="sync' . $c . '" class="owl-carousel thumbnails">';

		foreach ($hotelImages as $hotelImage) {
			foreach ($hotelImage as $hl) {
				echo '<div class="item"><img src="' . $hl . '" class="img-responsive full-width-img" alt=""></div>';
			}
		}

		echo '
		</div>
        </div>
        </div>
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light_bg nospacing">
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 nospacing">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-div">
                        <div class="voffset2"></div>
                        <div class="country_heading">' . $hotelTitle . '</div>
                        <div class="clearfix"></div>
                        <div class="country_text">';
		//echo strip_tags(get_the_content(), '<p><a><h2><blockquote><code><ul><li><i><em><strong>');
		echo get_the_excerpt();
		echo '
		</div>
        <div class="clearfix"></div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">
        <ul class="icons-hover">';
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
		echo '
		</ul>
        <ul class="stars-rating">';
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
		echo '</ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nospacing right_column">
                    <div class="top-arrow">
                    ' . $triUp . '
                    </div>
                    <div class="bottom-arrow">
                    ' . $triDown . '
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 nospacing">
                        <div class="price-heading">' . $minPrice . '</div>
                        <div class="price-subhead">Pro Nacht</div>
                        <div class="minPrice">' . $minPrice . '</div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 nospacing"></div>
                    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-4 nospacing"><form name="weiter_form" class="weiter_form" method="get" action="' .get_permalink(170) .'"><button class="read_more_btn">Weiterlesen</button><input type="hidden" name="gid" value="' . $gid . '"><input type="hidden" name="postId" value="' . $postId . '"></form></div>
                    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2"></div>
                </div>
            </div>
        </div>
    </div>';
	}

	$m = 0;
	$c = 0;
}
