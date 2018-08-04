<?php
    /*
        Widget container / side bar holder
        Requires Styling: True

        Hit: Columns / positioning should probably be added here.
        It will remove a lot of extra styling for all pages.
    */
?>

<!-- sidebar -->
<aside class="sidebar" role="complementary">

    <?php get_template_part('searchform'); ?>

    <div class="sidebar-widget">
        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
    </div>

    <div class="sidebar-widget">
        <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
    </div>

</aside>
<!-- /sidebar -->
