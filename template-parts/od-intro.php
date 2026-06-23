<?php

/**
 * Template Part: OD Intro Section
 */

$image   = get_field('image');
$content = get_field('content');
?>

<section id="intro" class="od-intro-section bg-white">

    <div class="container">

        <?php if (! empty($image['url'])) : ?>
            <div class="od-intro-logo text-center">
                <img
                    src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                    class="w-100 h-auto d-inline-block">
            </div>
        <?php endif; ?>

        <?php if (! empty($content)) : ?>
            <div class="od-intro-content highlight-text fw-light">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

    </div>

</section>