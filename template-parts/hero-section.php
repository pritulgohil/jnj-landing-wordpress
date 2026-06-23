<?php

/**
 * Template Part: Component - Hero Banner
 * Render template for 'Hero Banner Block' gutenberg row.
 */


$bg_image      = get_field('background_image');
$fg_image      = get_field('foreground_image');
$scroll_icon   = get_field('scroll_icon');
$scroll_target = get_field('scroll_target') ?: '#registration';


?>


<section class="hero-section d-flex flex-column align-items-center position-relative min-vh-100 z-1" style="background-image: url('<?php echo esc_url($bg_image['url']); ?>');">
    <!-- social bar -->
    <div class="position-absolute top-0 start-0 w-100 py-4">
        <div class="container social-bar">
            <?php if (have_rows('social_links')) : ?>
                <div class="d-flex justify-content-start align-items-center gap-3">
                    <?php while (have_rows('social_links')) : the_row();
                        $icon_img      = get_sub_field('icon');
                        $profile_url   = get_sub_field('url');
                        $new_tab       = get_sub_field('open_in_new_tab');

                        $target_attr = $new_tab ? ' target="_blank" rel="noopener"' : '';


                        if ($profile_url && $icon_img) :
                            $icon_url = is_array($icon_img) ? $icon_img['url'] : $icon_img; ?>
                            <a href="<?php echo esc_url($profile_url); ?>" class="d-inline-block" <?php echo $target_attr; ?>>
                                <img src="<?php echo esc_url($icon_url); ?>" alt="Social Network Icon" class="custom-social-icon" />
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- Foreground Image -->
    <div class="container-fluid d-flex flex-column flex-grow-1 justify-content-center align-items-center">
        <?php if (!empty($fg_image)) : ?>
            <img src="<?php echo esc_url($fg_image['url']); ?>"
                alt="<?php echo esc_attr($fg_image['alt']); ?>"
                class="hero-copy-img" />
        <?php endif; ?>
        <div class="scroll-indicator position-absolute bottom-0 pb-4">
            <a href="<?php echo esc_url($scroll_target); ?>" class="animate-bounce">
                <?php if (!empty($scroll_icon)) : ?>
                    <img src="<?php echo esc_url($scroll_icon['url']); ?>" alt="<?php echo esc_attr($scroll_icon['alt']); ?>" class="custom-scroll-graphic" />
                <?php endif; ?>
            </a>
        </div>
    </div>
</section>