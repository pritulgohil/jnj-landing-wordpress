<?php

/**
 * JnJ Landing functions and definitions
 *
 * @package JnJ_Landing
 */

if (! function_exists('jnj_landing_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function jnj_landing_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Register Primary Navigation Menu
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'jnj-landing'),
        ));

        // Switch default core markup for search form, comment form, etc. to output valid HTML5.
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ));
    }
endif;
add_action('after_setup_theme', 'jnj_landing_setup');

/**
 * Enqueue scripts and styles.
 */
function jnj_landing_scripts()
{
    // Enqueue Google Fonts (Poppins)
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', array(), null);

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

    // Enqueue Theme Stylesheet last so custom font settings override Bootstrap.
    wp_enqueue_style('jnj-landing-style', get_stylesheet_uri(), array('bootstrap-css', 'google-fonts'), '1.0.0');

    wp_enqueue_script(
        'jnj-agenda',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '1.0.0',
        true
    );

    // Enqueue Bootstrap JS Bundle (includes Popper)
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
}
add_action('wp_enqueue_scripts', 'jnj_landing_scripts');

add_filter('acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function ($paths) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

/**
 * Custom Theme Core Extensions
 */

// Load separated ACF Block definitions 
require_once get_theme_file_path('/inc/acf-blocks.php');
