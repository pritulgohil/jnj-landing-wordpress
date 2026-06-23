<?php

/**
 * The template for displaying the front page.
 *
 * @package JnJ_Landing
 */

get_header('landing');
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        the_content();

    endwhile;
    ?>

</main>

<?php get_template_part('template-parts/sections/registration'); ?>

<?php get_footer(); ?>

<?php
get_footer('landing');
