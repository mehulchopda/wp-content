<?php
/**
 * Created by PhpStorm.
 * User: Mehul
 * Date: 12/19/2015
 * Time: 3:52 PM
 * Template Name: Blog
 */
get_header();
?>
<body>


<div class="container">
    <div class="row">

        <div class="col-md-12">

            <div class="panel">
                <div class="panel-body">
                    <!--/stories-->
                    <?php
                    // we add this, to show all posts in our
                    // Glossary sorted alphabetically
                    $args = array( 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' );
                    $glossaryposts = get_posts( $args );
                    // here comes The Loop!
                    foreach( $glossaryposts as $post ) :setup_postdata($post);  ?>
                        <?php
                        $images = miu_get_images($post_id = null);
                        ?>

                        <div class="row">
                            <br>
                            <div class="col-md-2 col-sm-3 text-center">
                                <a class="story-img" href="#"><img src="<?php echo $images[0];?>" style="width:100px;height:100px" class="img-circle"></a>
                            </div>
                            <div class="col-md-10 col-sm-9">
                                <h3><?php the_title() ?></h3>
                                <div class="row">
                                    <div class="col-xs-9">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
                                            Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
                                            dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
                                            Aliquam in felis sit amet augue.<br><?php the_content()?></p>
                                    </div>
                                    <div class="col-xs-3"></div>
                                </div>
                                <br><br>
                            </div>
                        </div>

                        <hr>
                    <?php endforeach; ?>
                    <!--/stories-->


<!--                    <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>-->


                </div>
            </div>



        </div><!--/col-12-->
    </div>
</div>



</body>


