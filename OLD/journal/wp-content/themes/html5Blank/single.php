<?php
    /*
        Full blog post
        URL: /blog/[year]/[month]/[title]
        Requires Styling: True
    */
?>

<?php get_header(); ?>

    <!-- section -->
    <section class="clearfix centered">

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <!-- article -->
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- post thumbnail -->
            <?php //if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
            <!-- <div class="article-image content clearfix"> -->
                <?php //the_post_thumbnail(); // Fullsize image for the single post ?>
            <!-- </div> -->
            <?php //endif; ?>
            <!-- /post thumbnail -->

            <div class="article-info clearfix content align-center">

                <h1><?php the_title(); ?></h1>

                <!-- post details -->
                <span class="date"><?php the_time('F j, Y'); ?></span>
                <!-- /post details -->

            </div>

            <div class="article-content content clearfix">
                <?php the_content(); // Dynamic Content ?>
                <h6 class="categories"><?php _e( 'Categories: ', 'html5blank' ); the_category(', '); ?></h6>
            </div>

            <?php // the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

            <!-- <p><?php // _e( 'This post was written by ', 'html5blank' ); the_author(); ?></p> -->

            <?php edit_post_link(); // Always handy to have Edit Post Links available ?>

            <!-- <?php // comments_template(); ?> -->

        </article>
        <!-- /article -->

    <?php endwhile; ?>

    <?php else: ?>

        <!-- article -->
        <article>

            <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

        </article>
        <!-- /article -->

    <?php endif; ?>

    </section>
    <!-- /section -->

<?php get_footer(); ?>
