<?php
    /*
        Main page of the blog
        URL: /blog/
        Requires Styling: True

        Tips: Take into consideration sidebar. You can either account for
        its positioning here, or inside of sidebar.php. If you put it here, 
        you have to mirror the styles on EVERY page.
    */
?>

<?php get_header(); ?>

    <!-- section -->
    <section class="main-intro clearfix centered">
        <div class="content align-center">
            <h1>Journal blah blah blah</h1>
            <h4>lalala blah blah blah</h4>
        </div>
    </section>
    <!-- /section -->

    <!-- section -->
    <section class="clearfix loop-holder">
        <?php get_template_part('loop'); ?>
        <?php get_template_part('pagination'); ?>
    </section>
    <!-- /section -->
    
<?php get_footer(); ?>


