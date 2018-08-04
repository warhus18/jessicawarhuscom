<?php
    /*
        Primary loop style / function for all pages. Any page
        that loops through posts (archive, author, index etc) will use
        these styles.
        
        Requires Styling: True
    */
?>


<div class="articles display-flex flex-wrap" data-wrap="wrap">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <!-- journal article -->
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href="<?php the_permalink(); ?>">
                <div class="articleWrapper">
                    <?php the_post_thumbnail(array(500,500)); // Declare pixel size you need inside the array ?>
                    <div class="overlay">
                        <h3><?php the_title(); ?></h3>
                        <h4><?php the_excerpt(); ?></h4>
                        <a href="<?php the_permalink(); ?>" class="button white">Read More</a>
                    </div>
                </div>
            </a>
        </div>
        <!-- /journal article -->

    <?php endwhile; ?>        
</div>

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
    </article>
    <!-- /article -->

<?php endif; ?>


