<?php
/**
 * The template for displaying archive pages
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <section class="section bg-secondary">
        <div class="container">
            <?php the_archive_title('<h1>', '</h1>'); ?>
            <?php the_archive_description('<div class="archive-description text-muted">', '</div>'); ?>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <div class="grid grid-3">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', get_post_type());
                    endwhile;
                    ?>
                </div>

                <?php the_posts_pagination(array(
                    'prev_text' => __('&laquo; Föregående', 'testforetag'),
                    'next_text' => __('Nästa &raquo;', 'testforetag'),
                )); ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_sidebar();
get_footer();
