<?php

/**
 * Main fallback template.
 *
 * @package JnJ_Landing
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        the_content();
    }
}

get_footer();
