<?php
$arrDown = '<img src="' . get_bloginfo('template_url') . '/images/arrow-down-30.png" class="img-responsive text-center arrow-down" alt="" title="">';
$arrUp = '<img src="' . get_bloginfo('template_url') . '/images/arrow-up-30.png" class="img-responsive text-center arrow-up" alt="" title="">';
query_posts('orderby=title&order=ASC');
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $countryId = get_post_meta($post->ID, '_countryId', true);
        
        echo
        '<div id="errorMessage"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing country_details parent">
        <div class="countryId" style="display: none;">'.$countryId.'</div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing light_bg">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing">';
        get_the_image(array('scan' => true, 'image_class' => 'img-responsive full-width-img parent_img', 'size' => 'full'));
        echo
            '</div>
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 nospacing">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-div">
                        <div class="voffset2"></div>
                        <div class="country_heading">' . get_the_title() . '</div>
                        <div class="clearfix"></div>
                        <div class="country_text">
                            ' . wp_strip_all_tags(get_the_content()) . '
                        </div>
                        <div class="clearfix"></div>
                        <div class="hotels_no pull-left hotelCount">5 Hotels</div>
                        <div class="hotels_offer pull-right">lowest Price</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing drop_button_down" style="display: block;">
                ' . $arrDown . '
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing drop_button_up" style="display: none;">
                ' . $arrUp . '
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing hotels-show" style="display: none;">
            <div class="clearfix"></div>
            <div class="voffset4"></div>';

        echo
        '</div></div></div>';



    }
    wp_reset_postdata();
}


?>
