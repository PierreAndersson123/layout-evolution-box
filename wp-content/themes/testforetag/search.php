<?php
/**
 * The template for displaying search results pages
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <section class="section bg-secondary">
        <div class="container">
            <h1>
                <?php
                printf(
                    __('Sökresultat för: %s', 'testforetag'),
                    '<span>"' . get_search_query() . '"</span>'
                );
                ?>
            </h1>
        </div>
    </section>
    
    <section class="section">
        <div class="container">
            <?php if (have_posts()) : ?>
                <p class="text-muted mb-8">
                    <?php
                    printf(
                        _n('%d resultat hittades', '%d resultat hittades', $wp_query->found_posts, 'testforetag'),
                        $wp_query->found_posts
                    );
                    ?>
                </p>

                <div class="grid grid-3">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'search');
                    endwhile;
                    ?>
                </div>

                <?php the_posts_pagination(array(
                    'prev_text' => __('&laquo; Föregående', 'testforetag'),
                    'next_text' => __('Nästa &raquo;', 'testforetag'),
                )); ?>
            <?php else : ?>
                <div class="text-center py-16">
                    <h2><?php _e('Inga resultat hittades', 'testforetag'); ?></h2>
                    <p class="text-muted mb-8"><?php _e('Försök med andra sökord eller utforska våra sidor.', 'testforetag'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_sidebar();
get_footer();
