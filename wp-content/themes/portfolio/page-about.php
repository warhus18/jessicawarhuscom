<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

get_header();

    while (have_posts()) : the_post(); ?>

        <main role="main">
            <section>
                <div class="headshot">
                    <img src="images/headshot.jpg" alt="Jessica Warhus / Designer + Front-end Developer"/>
                </div>
                
                <h1><?php the_title(); ?></h1>

                <?php the_content(); ?>

                <a href="resume">View My Resume</a>
            </section>
        </main>

    <?php endwhile;

get_footer(); ?>