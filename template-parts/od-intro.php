<?php
$image   = get_field('image');
$content = get_field('content');
?>

<section id="intro" class="od-intro-section">

    <div class="container">

        <?php if ($image) : ?>
            <div class="od-intro-logo">
                <img
                    src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
        <?php endif; ?>

        <?php if ($content) : ?>
            <div class="od-intro-content highlight-text">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

    </div>

</section>