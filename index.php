<?php
/**
 * The main template file.
 *
 * @package JnJ_Landing
 */

get_header();
?>

<main id="primary" class="site-main py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php if ( have_posts() ) : ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-5' ); ?>>
                            <h2 class="entry-title fw-bold">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="entry-meta text-muted mb-3">
                                <?php echo get_the_date(); ?> | By <?php the_author(); ?>
                            </div>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                    
                    <?php the_posts_navigation(); ?>
                <?php else : ?>
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'jnj-landing' ); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
