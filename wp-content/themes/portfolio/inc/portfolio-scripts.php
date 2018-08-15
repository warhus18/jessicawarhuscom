<?php

/**
 * Theme scripts and styles
 */

function portfolio_scripts_styles() {

    // base CSS and JS files
    wp_enqueue_style('portfolio-base-styles', get_template_directory_uri() . '/styles/styles.min.css', false,
        filemtime(get_template_directory() . '/styles/styles.min.css'));
    wp_enqueue_script('portfolio-plugins', get_template_directory_uri() . '/scripts/plugins.min.js', array('jquery'),
        filemtime(get_template_directory() . '/scripts/plugins.min.js'), true);
    wp_enqueue_script('portfolio-base-scripts', get_template_directory_uri() . '/scripts/scripts.min.js', array('jquery'),
        filemtime(get_template_directory() . '/scripts/scripts.min.js'), true);

}

add_action('wp_enqueue_scripts', 'portfolio_scripts_styles');
