<?php

/**
 * Theme Architecture: ACF Custom Block Registrations
 */

function jnj_register_acf_blocks()
{

    if (! function_exists('acf_register_block_type')) {
        return;
    }

    acf_register_block_type(array(
        'name'            => 'hero-banner-block',
        'title'           => __('Component: Hero Banner'),
        'description'     => __('A fully-customized hero header block utilizing full graphic background overlays.'),
        'render_template' => 'template-parts/hero-section.php',
        'category'        => 'layout',
        'icon'            => 'cover-image',
        'keywords'        => array('hero', 'banner', 'jnj', 'header'),

        // 🌟 FORCE THE FIELDS INLINE IN THE MAIN EDITOR WINDOW
        'mode'            => 'auto', // Lets users toggle between the preview and edit modes inline
        'supports'        => array(
            'align'           => false,
            'mode'            => true,  // Adds the switcher toggle button on the block toolbar
            'jsx'             => true,
        ),
    ));

    acf_register_block_type(array(
        'name'            => 'top-reasons',
        'title'           => __('Component: Top Reasons'),
        'description'     => __('A fully-customized top reasons section.'),
        'render_template' => 'template-parts/top-reasons.php',
        'category'        => 'layout',
        'icon'            => 'cover-image',
        'keywords'        => array('top-reasons', 'jnj', 'reasons'),

        // 🌟 FORCE THE FIELDS INLINE IN THE MAIN EDITOR WINDOW
        'mode'            => 'auto', // Lets users toggle between the preview and edit modes inline
        'supports'        => array(
            'align'           => false,
            'mode'            => true,  // Adds the switcher toggle button on the block toolbar
            'jsx'             => true,
        ),
    ));

    acf_register_block_type(array(
        'name'            => 'od-intro',
        'title'           => __('Component: OD Intro'),
        'description'     => __('A fully-customized OD intro section.'),
        'render_template' => 'template-parts/od-intro.php',
        'category'        => 'layout',
        'icon'            => 'cover-image',
        'keywords'        => array('od-intro', 'jnj', 'intro'),

        // 🌟 FORCE THE FIELDS INLINE IN THE MAIN EDITOR WINDOW
        'mode'            => 'auto', // Lets users toggle between the preview and edit modes inline
        'supports'        => array(
            'align'           => false,
            'mode'            => true,  // Adds the switcher toggle button on the block toolbar
            'jsx'             => true,
        ),
    ));

    acf_register_block_type(array(
        'name'            => 'what-will-i-learn',
        'title'           => __('Component: What will I learn'),
        'description'     => __('A fully-customized learn section with title and icon.'),
        'render_template' => 'template-parts/what-will-i-learn.php',
        'category'        => 'layout',
        'icon'            => 'cover-image',
        'keywords'        => array('what-will-i-learn', 'jnj', 'learn'),

        // 🌟 FORCE THE FIELDS INLINE IN THE MAIN EDITOR WINDOW
        'mode'            => 'auto', // Lets users toggle between the preview and edit modes inline
        'supports'        => array(
            'align'           => false,
            'mode'            => true,  // Adds the switcher toggle button on the block toolbar
            'jsx'             => true,
        ),
    ));

    acf_register_block_type(array(
        'name'            => 'agenda',
        'title'           => __('Component: Agenda'),
        'description'     => __('A fully-customized agenda section with title, icons and descriptions.'),
        'render_template' => 'template-parts/agenda.php',
        'category'        => 'layout',
        'icon'            => 'cover-image',
        'keywords'        => array('agenda', 'jnj', 'speaker'),

        // 🌟 FORCE THE FIELDS INLINE IN THE MAIN EDITOR WINDOW
        'mode'            => 'auto', // Lets users toggle between the preview and edit modes inline
        'supports'        => array(
            'align'           => false,
            'mode'            => true,  // Adds the switcher toggle button on the block toolbar
            'jsx'             => true,
        ),
    ));

    acf_register_block_type(array(
        'name'            => 'location',
        'title'           => __('Component: Location'),
        'description'     => __('A fully-customized location section with title, icons and descriptions.'),
        'render_template' => 'template-parts/location.php',
        'category'        => 'layout',
        'icon'            => 'cover-image',
        'keywords'        => array('location', 'jnj', 'map'),

        // 🌟 FORCE THE FIELDS INLINE IN THE MAIN EDITOR WINDOW
        'mode'            => 'auto', // Lets users toggle between the preview and edit modes inline
        'supports'        => array(
            'align'           => false,
            'mode'            => true,  // Adds the switcher toggle button on the block toolbar
            'jsx'             => true,
        ),
    ));
}
add_action('acf/init', 'jnj_register_acf_blocks');
