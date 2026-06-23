<?php
$image         = get_field('image');
$title         = get_field('title');
$address       = get_field('address');
$link          = get_field('link');
$contact_name  = get_field('contact_name');
$email         = get_field('email');
?>

<section class="main-container location-section">

    <div class="container-fluid dot-layer">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 dot-overlay"></div>
        </div>
    </div>

    <div class="container-fluid bg-layer location-red-overlay-top-position d-none d-lg-block">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-4">
                <div class="bg-overlay location-red-overlay-height"></div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <?php if (get_field('heading')) : ?>
                <div class="row">
                    <div class="col-12 section-heading mb-3">
                        <h2 class="display-5 fw-lighter mb-0">
                            <?php echo wp_kses_post(get_field('heading')); ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>

            <div class="title-line"></div>

            <?php if ($image) : ?>
                <div class="row mt-5">
                    <div class="col-lg-10">
                        <img
                            src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            class="img-fluid location-image">
                    </div>
                </div>
            <?php endif; ?>

            <div class="row mt-4">
                <div class="col-lg-10">

                    <?php if ($title) : ?>
                        <h3 class="location-title">
                            <?php echo esc_html($title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($address) : ?>
                        <p class="location-address">
                            <?php echo esc_html($address); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($link) : ?>
                        <p class="location-link">
                            <a
                                href="<?php echo esc_url($link['url']); ?>"
                                target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                <?php echo esc_html($link['title']); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <div class="location-contact-block">

                        <h4 class="location-contact-heading">
                            Have questions?
                        </h4>

                        <p class="location-contact-text">

                            <?php if ($contact_name) : ?>Contact:
                            <span class="location-contact-name">
                                <?php echo esc_html($contact_name); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                            -
                            <a href="mailto:<?php echo antispambot($email); ?>">
                                <?php echo antispambot($email); ?>
                            </a>
                        <?php endif; ?>

                        </p>

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>