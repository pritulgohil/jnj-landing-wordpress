<?php

/**
 * Template Part: Location Section
 *
 * Displays event/location details with:
 * - Decorative dotted background layer
 * - Decorative red background overlay
 * - Optional section heading
 * - Location image, title, address, link, and contact details
 */

/**
 * ACF Fields
 */
$heading      = get_field('heading');
$image        = get_field('image');
$title        = get_field('title');
$address      = get_field('address');
$link         = get_field('link');
$contact_name = get_field('contact_name');
$email        = get_field('email');
?>

<section class="main-container location-section">

    <!-- Decorative dotted background layer -->
    <div class="container-fluid dot-layer">
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 dot-overlay"></div>
        </div>
    </div>

    <!-- Decorative red overlay visible on desktop only -->
    <div class="container-fluid bg-layer location-red-overlay-top-position d-none d-lg-block">
        <div class="row">
            <div class="col-lg-6"></div>

            <div class="col-lg-4">
                <div class="bg-overlay location-red-overlay-height"></div>
            </div>

            <div class="col-lg-2"></div>
        </div>
    </div>

    <!-- Main section content -->
    <div class="content-wrapper">
        <div class="container-fluid">

            <?php if (! empty($heading)) : ?>
                <div class="row">
                    <div class="col-12 section-heading mb-3">
                        <h2 class="display-5 fw-lighter mb-0">
                            <?php echo wp_kses_post($heading); ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>

            <div class="title-line"></div>

            <!-- Location image -->
            <?php if (! empty($image['url'])) : ?>
                <div class="row mt-5">
                    <div class="col-lg-10">
                        <img
                            src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt'] ?? ''); ?>"
                            class="img-fluid location-image w-100 h-auto d-block">
                    </div>
                </div>
            <?php endif; ?>

            <!-- Location details -->
            <div class="row mt-4">
                <div class="col-lg-10">

                    <?php if (! empty($title)) : ?>
                        <h3 class="location-title fw-light">
                            <?php echo esc_html($title); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if (! empty($address)) : ?>
                        <p class="location-address">
                            <?php echo esc_html($address); ?>
                        </p>
                    <?php endif; ?>

                    <?php if (! empty($link['url'])) : ?>
                        <p class="location-link">
                            <a
                                href="<?php echo esc_url($link['url']); ?>"
                                target="<?php echo esc_attr($link['target'] ?: '_self'); ?>"
                                class="text-decoration-none fw-semibold">
                                <?php echo esc_html($link['title'] ?? ''); ?>
                            </a>
                        </p>
                    <?php endif; ?>

                    <!-- Contact details -->
                    <div class="location-contact-block">

                        <h4 class="location-contact-heading fw-light">
                            Have questions?
                        </h4>

                        <?php if (! empty($contact_name) || ! empty($email)) : ?>
                            <p class="location-contact-text mb-0">

                                <?php if (! empty($contact_name)) : ?>
                                    Contact:
                                    <span class="location-contact-name fw-semibold">
                                        <?php echo esc_html($contact_name); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if (! empty($email)) : ?>
                                    -
                                    <a
                                        href="mailto:<?php echo esc_attr(antispambot($email)); ?>"
                                        class="text-decoration-none fw-semibold">
                                        <?php echo esc_html(antispambot($email)); ?>
                                    </a>
                                <?php endif; ?>

                            </p>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>

</section>