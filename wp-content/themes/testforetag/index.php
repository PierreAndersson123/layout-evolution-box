<?php
/**
 * The main template file
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <section class="section">
        <div class="container">
            <?php if (is_home() && !is_front_page()) : ?>
                <header class="page-header mb-8">
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                </header>
            <?php endif; ?>

            <?php if (have_posts()) : ?>
                <div class="grid grid-3">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', get_post_type());
                    endwhile;
                    ?>
                </div>

                <?php the_posts_navigation(); ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_sidebar();
get_footer();
