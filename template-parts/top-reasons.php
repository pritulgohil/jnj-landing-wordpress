<?php
$heading             = get_field('heading');
$highlighted_number  = get_field('highlighted_number');
$highlighted_text    = get_field('highlighted_text');
$image               = get_field('image');
$button              = get_field('button_link');
$button_text         = get_field('button_text');
?>

<section class="main-container top-reasons-section">

    <!-- Dot background controlled by Bootstrap grid -->
    <div class="container-fluid dot-layer">
        <div class="row">
            <div class="col-lg-12 dot-overlay"></div>
        </div>
    </div>

    <!-- Red transparent background controlled by Bootstrap grid -->
    <div class="container-fluid bg-layer reasons-red-overlay-top-position d-none d-lg-block">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-8">
                <div class="bg-overlay reasons-red-overlay-height"></div>
            </div>
            <div class="col-lg-1"></div>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row gy-3">
                <!-- Left Column -->
                <div class="col-lg-4">

                    <div class="section-heading highlight-text mb-4">
                        <?php if ($heading) : ?>
                            <h2 class="display-5 fw-lighter mb-0">
                                <?php echo wp_kses_post($heading); ?>
                            </h2>
                        <?php endif; ?>
                    </div>

                    <div class="title-line"></div>

                    <?php if ($image) : ?>
                        <img
                            src="<?php echo esc_url($image['url']); ?>"
                            alt="<?php echo esc_attr($image['alt']); ?>"
                            class="img-fluid">
                    <?php endif; ?>

                </div>

                <!-- Right Column -->
                <div class="col-lg-8">

                    <div class="bg-jnj-red text-white p-4 p-lg-5 h-100">

                        <?php if (have_rows('reasons')) : ?>
                            <?php while (have_rows('reasons')) : the_row();

                                $icon        = get_sub_field('icon');
                                $title       = get_sub_field('title');
                                $description = get_sub_field('description');

                            ?>

                                <div class="reason-item d-flex mb-5">

                                    <?php if ($icon) : ?>
                                        <div class="flex-shrink-0 me-4">
                                            <img
                                                src="<?php echo esc_url($icon['url']); ?>"
                                                alt="<?php echo esc_attr($icon['alt']); ?>"
                                                width="90">
                                        </div>
                                    <?php endif; ?>

                                    <div>
                                        <?php if ($title) : ?>
                                            <h4 class="fw-bold mb-2">
                                                <?php echo esc_html($title); ?>
                                            </h4>
                                        <?php endif; ?>

                                        <?php if ($description) : ?>
                                            <p class="mb-0">
                                                <?php echo esc_html($description); ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>

                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

            <?php if ($button) : ?>
                <div class="text-center mt-5">
                    <a
                        class="jnj-btn"
                        href="<?php echo esc_url($button['url']); ?>"
                        target="<?php echo esc_attr($button['target'] ?: '_self'); ?>">
                        <?php echo wp_kses_post($button_text); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>

</section>