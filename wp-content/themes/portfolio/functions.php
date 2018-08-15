<?php
/**
 * O3 World functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package JW Portfolio
 */

if ( ! function_exists('portfolio_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function portfolio_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on O3 World, use a find and replace
         * to change 'portfolio' to the name of your theme in all the template files.
         */
        load_theme_textdomain('portfolio', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Enable support for Excerpts on Wordpress Pages.
         *
         * @link https://www.ostraining.com/blog/wordpress/add-excerpts-to-wordpress-pages/
         */
        add_post_type_support('page', 'excerpt');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-main' => esc_html__('Primary Navigation', 'portfolio'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

    }

    // Remove persistent admin bar
    add_filter('show_admin_bar', '__return_false');

    // Register CTA post type
    require get_template_directory() . '/inc/custom-post-types.php';


endif;
add_action('after_setup_theme', 'portfolio_setup');

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/portfolio-scripts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Disable the emoji's
 */
require get_template_directory() . '/inc/disable-emoji.php';
