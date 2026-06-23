<?php

/**
 * Template Part: Component - Hero Banner
 *
 * Renders the Hero Banner Gutenberg block.
 */

$bg_image      = get_field('background_image');
$fg_image      = get_field('foreground_image');
$scroll_icon   = get_field('scroll_icon');
$scroll_target = get_field('scroll_target') ?: '#registration';

$bg_image_url = ! empty($bg_image['url']) ? $bg_image['url'] : '';
?>

<section
    class="hero-section d-flex flex-column align-items-center position-relative min-vh-100 z-1"
    <?php if ($bg_image_url) : ?>
    style="background-image: url('<?php echo esc_url($bg_image_url); ?>');"
    <?php endif; ?>>
    <!-- Social Links Bar -->
    <div class="position-absolute top-0 start-0 w-100 py-4">
        <div class="container social-bar">
            <?php if (have_rows('social_links')) : ?>
                <div class="d-flex justify-content-start align-items-center gap-3">
                    <?php
                    while (have_rows('social_links')) :
                        the_row();

                        $icon_img    = get_sub_field('icon');
                        $profile_url = get_sub_field('url');
                        $new_tab     = get_sub_field('open_in_new_tab');

                        if (empty($profile_url) || empty($icon_img)) {
                            continue;
                        }

                        $icon_url = is_array($icon_img) && ! empty($icon_img['url'])
                            ? $icon_img['url']
                            : $icon_img;

                        $icon_alt = is_array($icon_img) && ! empty($icon_img['alt'])
                            ? $icon_img['alt']
                            : __('Social Network Icon', 'your-theme-textdomain');
                    ?>

                        <a
                            href="<?php echo esc_url($profile_url); ?>"
                            class="d-inline-block"
                            aria-label="<?php echo esc_attr($icon_alt); ?>"
                            <?php if ($new_tab) : ?>
                            target="_blank"
                            rel="noopener noreferrer"
                            <?php endif; ?>>
                            <img
                                src="<?php echo esc_url($icon_url); ?>"
                                alt="<?php echo esc_attr($icon_alt); ?>"
                                class="custom-social-icon" />
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Foreground Hero Image -->
    <div class="container-fluid d-flex flex-column flex-grow-1 justify-content-center align-items-center">
        <?php if (! empty($fg_image['url'])) : ?>
            <img
                src="<?php echo esc_url($fg_image['url']); ?>"
                alt="<?php echo esc_attr($fg_image['alt'] ?? ''); ?>"
                class="hero-copy-img" />
        <?php endif; ?>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator position-absolute bottom-0 pb-4">
            <a href="<?php echo esc_url($scroll_target); ?>" class="animate-bounce" aria-label="<?php esc_attr_e('Scroll to next section', 'your-theme-textdomain'); ?>">
                <?php if (! empty($scroll_icon['url'])) : ?>
                    <img
                        src="<?php echo esc_url($scroll_icon['url']); ?>"
                        alt="<?php echo esc_attr($scroll_icon['alt'] ?? ''); ?>"
                        class="custom-scroll-graphic" />
                <?php endif; ?>
            </a>
        </div>
    </div>
</section>