<?php
    /*
        Pagination wrapper for pages that use loop.php. If you want
        to change the html for how pagination shows up (hint: don't)
        its located in wp-includes/general-template.php LN: 2929
        
        Requires Styling: False
    */
?>


<!-- pagination -->
<div class="pagination">
    <?php html5wp_pagination(); ?>
</div>
<!-- /pagination -->
