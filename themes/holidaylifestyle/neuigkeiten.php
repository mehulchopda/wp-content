<?php
/*
Template Name: Neuigkeiten
 */
?>
<?php
//$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
//require_once( $parse_uri[0] . 'wp-load.php' );
get_header();
?>



<div class="clearfix"></div>
<div class="content-outside" id="contentOutside">
        <div class="voffset2 device"></div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <ul class="bread-crumb">
                <li><a href="#">Startseite</a></li>
                <li>&raquo;</li>
                <li><a href="#">Reiseziele</a></li>
                <li>&raquo;</li>
                <li><a href="#">Asien</a></li>
                <li>&raquo;</li>
                <li><a href="#">Indien</a></li>
                <li>&raquo;</li>
                <li><a href="#">The Park View</a></li>
            </ul>
        </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <a href="#" ><div class="kartenansicht"><img src="<?php bloginfo('template_url');?>/images/nach-icon-27.png" class="img-responsive grey-icon" alt="" />
                <img src="<?php bloginfo('template_url');?>/images/nach-icon-27-white.png" class="img-responsive white-icon" alt="" />
                <div>Kartenansicht</div></div></a>
    </div>
    <div class="clearfix"></div>
    <div class="voffset2"></div>
    <div class="clearfix"></div>
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

        <div class="container nospacing content" id="container nospacing content">





</div>
        <div class="clearfix"></div>
    <script>
        $(document).ready(function() {

            // process the form

            $('form').submit(function(event) {

                // get the form data
                // there are many ways to get this data using jQuery (you can use the class or id also)

                //  console.log(formData);
                // process the form

                $.ajax({
                    type: 'GET', // define the type of HTTP verb we want to use (POST for our form)
                    url: 'http://localhost/wordpress/wordpress/wp-content/themes/holidaylifestyle/data_json.php', // the url where we want to POST
                    data: {
                        'journeyType': $('input[name=journeyType]').val(),
                        'departureDate': $('input[name=departureDate]').val(),
                        'returnDate': $('input[name=returnDate]').val(),
                        'destination': $('input[name=destination]').val(),
                        'departureAirport': $('input[name=departureAirport]').val(),

                    }, // our data object
                    dataType: 'json', // what type of data do we expect back from the server
                    encode: true
                })
                    // using the done promise callback
                    .done(function (data) {
                        // log data to the console so we can see
                        $(document).ready(function () {
                                // console.log(data);
                                // $(".container-nospacing-content").append( data );
                                //var result=JSON.parse(data);
                                //var obj = jQuery.parseJSON(data);
                                var offers=data.offersList;
                                // var dlcList=data.destination;
                                //console.log(dlcList);
                                var append;
                                var check;
                                var m=0;
                                var c=0;
                                var temp=1;
                                var sync1;
                                var sync2;
                                var destinationRegion=[];
                                var ratings_plus=0;
                                var ratings_minus=0;

                                $.each(offers, function(i, item) {
                                    //add all destination region  with unique name
                                    if($.inArray(offers[i].hotelDst, destinationRegion)!=0)
                                        destinationRegion.push(offers[i].hotelDst);

                                });

                                //process the tag
                                var hotelName=[];
                                var html,html1;

                                for(j=0;j<destinationRegion.length;j++)
                                {

                                    //adding Child to Parent
                                    $.each(offers, function(i, item) {
                                        m = temp;
                                        c = temp + 1;
                                        temp = c + 1;
                                         ratings_plus = offers[i].cat;
                                         ratings_minus = 5 - ratings_plus;
                                        sync1='sync'+m;
                                        sync2='sync'+c;
                                        html+='<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing children">'+
                                            '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">'+
                                            '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 nospacing">'+
                                            '<div class="span12">'+
                                            '<div id="'+sync1+'" class="owl-carousel">'+
                                            '<div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '<div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            ' <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel3-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '<div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel4-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '<div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            ' <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '</div>'+
                                            '<div id="'+sync2+'" class="owl-carousel thumbnails">'+
                                            ' <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel1-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '  <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '   <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel3-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '   <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel4-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '   <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '   <div class="item"><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/hotel2-29.jpg" class="img-responsive full-width-img" alt="" /></div>'+
                                            '   </div>'+
                                            '   </div>'+
                                            '   </div>'+

                                            '  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 light_bg nospacing">'+
                                            '  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 nospacing">'+
                                            '   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-div">'+
                                            '   <div class="voffset2"></div>'+
                                            '   <div class="country_heading col-lg-8 col-md-8 col-sm-8 col-xs-8 nospacing">' + offers[i].hotel+'</div>'+
                                            '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 nospacing">'+
                                            '<ul class="stars-rating">';

                                        for (j = 0; j < ratings_plus; j++) {

                                            html+='<li><img src = "/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/star.png" class="img-responsive" alt = "" title = "" ></li >';
                                        }

                                        for (j = 0; j < ratings_minus; j++) {

                                            html+= '<li><img src = "/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/blank-star.png" class="img-responsive" alt = "" title = "" ></li >';
                                        }

                                        html+='</ul>'+
                                            ' </div>'+
                                            '<div class="clearfix"></div>'+
                                            ' <div class="country_text">' +offers[i].giata+'</div>'+
                                            ' <div class="clearfix"></div>'+
                                            ' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nospacing">'+
                                            ' <ul class="icons-hover">'+
                                            ' <li><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Near Airport" class="img-responsive airport" alt=""></li>'+
                                            ' <li><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Near Bus Stop" class="img-responsive bus-stop" alt=""></li>'+
                                            ' <li><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Cafe" class="img-responsive cafe" alt=""></li>'+
                                            ' <li><img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/icon-blank.png" data-toggle="tooltip" data-placement="top" title="Restaurant" class="img-responsive restaurant" alt=""></li>'+
                                            ' </ul>'+
                                            ' </div>'+
                                            ' </div>'+
                                            ' </div>'+
                                            ' <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 nospacing right_column_white">'+
                                            ' <div class="top-arrow">'+
                                            ' <img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/triangle-30-white.png" alt="" class="top-arrow" />'+
                                            ' </div>'+
                                            ' <div class="bottom-arrow">'+
                                            ' <img src="/wordpress/wordpress/wp-content/themes/holidaylifestyle/images/triangle-down-white.png" alt="" class="down-arrow" />'+
                                            ' </div>'+
                                            ' <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 nospacing">'+
                                            ' <div class="price-heading">' +offers[i].price.price + '</div>'+
                                            ' <div class="price-subhead">Pro Nacht</div>'+
                                            '</div>'+
                                            '<div class="col-lg-3 col-md-3 col-sm-2 col-xs-1 nospacing"></div>'+
                                           // '<div class="col-lg-2 col-md-2 col-sm-6 col-xs-4 nospacing weiterlessen"><a href="/wordpress/wp-content/themes/holidaylifestyle/hotel-details.php">Weiterlesen</button></form></div>'+
                                            '</div>'+
                                            '</div>'+
                                            '</div>'+
                                            '</div>';

                                        m = 0;
                                        c = 0;


                                        hotelName.push(offers[i].hotel);


                                    });
                                    console.log(html);

                                    document.getElementById("container nospacing content").innerHTML=html;
                                }


                                $.getScript("http://localhost//wordpress/wordpress/wp-content/themes/holidaylifestyle/js/scripts.js", function () {

                                });

                                // JavaScript Document


                            }
                        );
                    });
                // stop the form from submitting the normal way and refreshing the page
                event.preventDefault();
            });

        });
    </script>

</div>
<div class="clearfix"></div>


<?php
get_footer();
?>
