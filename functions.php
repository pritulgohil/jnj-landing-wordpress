<?php

/**
 * JnJ Landing functions and definitions.
 *
 * @package JnJ_Landing
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('jnj_landing_setup')) :
    /**
     * Sets up theme defaults and registers support for WordPress features.
     */
    function jnj_landing_setup()
    {
        // Add default posts and comments RSS feed links to the document head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable featured images for posts and pages.
        add_theme_support('post-thumbnails');

        // Register theme navigation menus.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'jnj-landing'),
        ));

        // Output valid HTML5 markup for supported WordPress elements.
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
 * Enqueues theme styles and scripts.
 */
function jnj_landing_scripts()
{
    // Google Font: Poppins.
    wp_enqueue_style(
        'jnj-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Bootstrap CSS framework.
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        array(),
        '5.3.3'
    );

    // Main theme stylesheet. Loaded after Bootstrap so custom styles can override it.
    wp_enqueue_style(
        'jnj-landing-style',
        get_stylesheet_uri(),
        array('bootstrap-css', 'jnj-google-fonts'),
        wp_get_theme()->get('Version')
    );

    // Main theme JavaScript.
    wp_enqueue_script(
        'jnj-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Bootstrap JS bundle including Popper.
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        array(),
        '5.3.3',
        true
    );
}
add_action('wp_enqueue_scripts', 'jnj_landing_scripts');

/**
 * Saves ACF field group JSON files into the theme.
 */
function jnj_landing_acf_save_json()
{
    return get_stylesheet_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'jnj_landing_acf_save_json');

/**
 * Loads ACF field group JSON files from the theme.
 */
function jnj_landing_acf_load_json($paths)
{
    unset($paths[0]);

    $paths[] = get_stylesheet_directory() . '/acf-json';

    return $paths;
}
add_filter('acf/settings/load_json', 'jnj_landing_acf_load_json');

/**
 * Loads separated ACF block definitions.
 */
require_once get_theme_file_path('/inc/acf-blocks.php');
