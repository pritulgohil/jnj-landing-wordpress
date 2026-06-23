<section class="main-container learn-section">

    <!-- Dot layer controlled by Bootstrap grid -->
    <div class="container-fluid dot-layer">
        <div class="row">
            <div class="col-lg-12 dot-overlay"></div>
        </div>
    </div>

    <!-- Red bg layer controlled by Bootstrap grid -->
    <div class="container-fluid bg-layer learn-red-overlay-top-position d-none d-lg-block">
        <div class="row">
            <div class="col-lg-7">
                <div class="bg-overlay learn-red-overlay-height"></div>
            </div>
            <div class="col-lg-5"></div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <?php if (get_field('heading')) : ?>
                <div class="row">
                    <div class="col-12 section-heading highlight-text">
                        <h2 class="display-5 fw-lighter mb-0">
                            <?php echo wp_kses_post(get_field('heading')); ?>
                        </h2>
                    </div>
                </div>
            <?php endif; ?>

            <div class="title-line"></div>

            <?php if (have_rows('topics')) : ?>
                <div class="row align-items-start learn-margin-top">
                    <?php while (have_rows('topics')) : the_row();
                        $icon  = get_sub_field('icon');
                        $title = get_sub_field('title');
                    ?>
                        <div class="col-6 col-md-4 col-lg-4 topic-col">
                            <div class="topic-item text-center">

                                <?php if ($icon) : ?>
                                    <div class="topic-icon">
                                        <img
                                            src="<?php echo esc_url($icon['url']); ?>"
                                            alt="<?php echo esc_attr($icon['alt'] ?: $title); ?>">
                                    </div>
                                <?php endif; ?>

                                <?php if ($title) : ?>
                                    <h3 class="topic-title">
                                        <?php echo esc_html($title); ?>
                                    </h3>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

</section>