<?php
/**
 * Created by PhpStorm.
 * User: Mehul
 * Date: 12/19/2015
 * Time: 3:52 PM
 * Template Name: Blog
 */

get_header();
$m='Hello';
?>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="post-preview">

                <a href="post.html">
                    <?php
                    // we add this, to show all posts in our
                    // Glossary sorted alphabetically
                    $args = array( 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' );
                    $glossaryposts = get_posts( $args );
                    // here comes The Loop!
                    foreach( $glossaryposts as $post ) :setup_postdata($post);  ?>
                        <h3 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <h3 class="post-subtitle">
                            <a href="<?php the_permalink(); ?>"><?php the_content(); ?></a>
                        </h3>
                        <p class="post-meta">Posted on  <a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></p>
                        <p><img src="<?php the_field('image'); ?>"></p>
                        <hr>
                    <?php endforeach; ?>




            </div>
            <hr>

            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts &rarr;</a>
                </li>
            </ul>

        </div>
    </div>
</div>

</body>


