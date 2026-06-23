<?php

/**
 * Template Part: Agenda Section
 *
 * Displays agenda speaker cards with:
 * - Decorative dotted background layer
 * - Decorative red background overlay
 * - Section heading
 * - Speaker cards with date, avatar, name, icons, and description
 */

$heading = get_field('heading');
?>

<section class="main-container agenda-section">

    <!-- Decorative dotted background layer -->
    <div class="container-fluid dot-layer">
        <div class="row">
            <div class="col-lg-11 dot-overlay"></div>
        </div>
    </div>

    <!-- Decorative red overlay visible on desktop only -->
    <div class="container-fluid bg-layer agenda-red-overlay-top-position d-none d-lg-block">
        <div class="row">
            <div class="col-lg-1"></div>

            <div class="col-lg-11">
                <div class="bg-overlay learn-red-overlay-height"></div>
            </div>
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

            <?php if (have_rows('speakers')) : ?>
                <div class="row justify-content-center agenda-card-row gy-4">

                    <?php
                    while (have_rows('speakers')) :
                        the_row();

                        $date         = get_sub_field('date');
                        $avatar       = get_sub_field('avatar');
                        $speaker_name = get_sub_field('speaker_name');
                        $description  = get_sub_field('description');
                    ?>

                        <!-- Individual agenda speaker card -->
                        <div class="col-12 col-md-4 agenda-card-col d-flex">
                            <div class="agenda-card text-center w-100 text-white">

                                <!-- Speaker date, image, name, and icon stack -->
                                <div class="agenda-card-top">

                                    <?php if (! empty($date)) : ?>
                                        <div class="agenda-date fw-bold">
                                            <?php echo esc_html($date); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (! empty($avatar['url'])) : ?>
                                        <img
                                            src="<?php echo esc_url($avatar['url']); ?>"
                                            alt="<?php echo esc_attr($avatar['alt'] ?: $speaker_name); ?>"
                                            class="agenda-avatar object-fit-cover">
                                    <?php endif; ?>

                                    <?php if (! empty($speaker_name)) : ?>
                                        <h3 class="agenda-speaker-name fw-normal">
                                            <?php echo esc_html($speaker_name); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (have_rows('speaker_icon_stack')) : ?>
                                        <div class="agenda-icon-stack d-flex justify-content-center">

                                            <?php
                                            while (have_rows('speaker_icon_stack')) :
                                                the_row();

                                                $speaker_icon = get_sub_field('speaker_icon');
                                            ?>

                                                <?php if (! empty($speaker_icon['url'])) : ?>
                                                    <img
                                                        src="<?php echo esc_url($speaker_icon['url']); ?>"
                                                        alt="<?php echo esc_attr($speaker_icon['alt'] ?? ''); ?>"
                                                        class="object-fit-contain">
                                                <?php endif; ?>

                                            <?php endwhile; ?>

                                        </div>
                                    <?php endif; ?>

                                </div>

                                <!-- Speaker description with read more button -->
                                <div class="agenda-card-bottom">

                                    <?php if (! empty($description)) : ?>
                                        <?php
                                        $plain_description = wp_strip_all_tags($description);
                                        $needs_read_more   = mb_strlen($plain_description) > 400;
                                        ?>

                                        <div class="agenda-description-wrap <?php echo $needs_read_more ? 'has-read-more' : ''; ?>">
                                            <p class="agenda-description mb-0">
                                                <?php echo esc_html($plain_description); ?>
                                            </p>

                                            <?php if ($needs_read_more) : ?>
                                                <button
                                                    type="button"
                                                    class="read-more-btn bg-transparent border-0 text-white text-decoration-underline p-0"
                                                    aria-expanded="false">
                                                    Read More
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="agenda-description-wrap"></div>
                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>
            <?php endif; ?>

        </div>
    </div>

</section>