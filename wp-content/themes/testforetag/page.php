<?php
/**
 * The template for displaying all pages
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <?php if (has_post_thumbnail()) : ?>
        <section class="hero" style="min-height: 40vh;">
            <?php the_post_thumbnail('hero-image', array('class' => 'hero-image')); ?>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
            </div>
        </section>
        <?php else : ?>
        <section class="section bg-secondary">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </section>
        <?php endif; ?>
        
        <section class="section">
            <div class="container">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Sidor:', 'testforetag'),
                            'after' => '</div>',
                        ));
                        ?>
                    </div>
                </article>

                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
            </div>
        </section>
        
    <?php endwhile; ?>

</main>

<?php
get_footer();
