<section class="main-container agenda-section">

    <div class="container-fluid dot-layer">
        <div class="row">
            <div class="col-lg-11 dot-overlay"></div>
        </div>
    </div>

    <div class="container-fluid bg-layer agenda-red-overlay-top-position d-none d-lg-block">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-11">
                <div class="bg-overlay learn-red-overlay-height"></div>
            </div>
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

            <?php if (have_rows('speakers')) : ?>
                <div class="row justify-content-center agenda-card-row gy-4">

                    <?php while (have_rows('speakers')) : the_row();
                        $date         = get_sub_field('date');
                        $avatar       = get_sub_field('avatar');
                        $speaker_name = get_sub_field('speaker_name');
                        $description  = get_sub_field('description');
                    ?>
                        <div class="col-12 col-md-4 agenda-card-col d-flex">
                            <div class="agenda-card text-center w-100">

                                <div class="agenda-card-top">

                                    <?php if ($date) : ?>
                                        <div class="agenda-date">
                                            <?php echo esc_html($date); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($avatar) : ?>
                                        <img
                                            src="<?php echo esc_url($avatar['url']); ?>"
                                            alt="<?php echo esc_attr($avatar['alt'] ?: $speaker_name); ?>"
                                            class="agenda-avatar">
                                    <?php endif; ?>

                                    <?php if ($speaker_name) : ?>
                                        <h3 class="agenda-speaker-name">
                                            <?php echo esc_html($speaker_name); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (have_rows('speaker_icon_stack')) : ?>
                                        <div class="agenda-icon-stack">
                                            <?php while (have_rows('speaker_icon_stack')) : the_row();
                                                $speaker_icon = get_sub_field('speaker_icon');
                                            ?>
                                                <?php if ($speaker_icon) : ?>
                                                    <img
                                                        src="<?php echo esc_url($speaker_icon['url']); ?>"
                                                        alt="<?php echo esc_attr($speaker_icon['alt']); ?>">
                                                <?php endif; ?>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <div class="agenda-card-bottom">

                                    <?php if ($description) : ?>
                                        <?php
                                        $plain_description = wp_strip_all_tags($description);
                                        $needs_read_more   = mb_strlen($plain_description) > 400;
                                        ?>

                                        <div class="agenda-description-wrap <?php echo $needs_read_more ? 'has-read-more' : ''; ?>">
                                            <p class="agenda-description">
                                                <?php echo esc_html($plain_description); ?>
                                            </p>

                                            <?php if ($needs_read_more) : ?>
                                                <button type="button" class="read-more-btn" aria-expanded="false">
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