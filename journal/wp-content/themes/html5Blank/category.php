<?php
    /*
        List of articles by category
        URL: /blog/category/[category]
        Requires Styling: True
    */
?>

<?php get_header(); ?>

    <!-- section -->
    <section class="centered clearfix">

        <div class="align-center clearfix content">
            <h2><?php _e( 'Category: ', 'html5blank' ); single_cat_title(); ?></h2>
        </div>

        <hr>  

        <?php get_template_part('loop'); ?>

        <?php get_template_part('pagination'); ?>      

    </section>
    <!-- /section -->

<?php get_footer(); ?>
