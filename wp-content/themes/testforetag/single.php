<?php
/**
 * The template for displaying all single posts
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <?php while (have_posts()) : the_post(); ?>
        
        <?php if (has_post_thumbnail()) : ?>
        <section class="hero" style="min-height: 50vh;">
            <?php the_post_thumbnail('hero-image', array('class' => 'hero-image')); ?>
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <h1 class="hero-title"><?php the_title(); ?></h1>
                <p class="hero-subtitle">
                    <?php
                    printf(
                        __('Publicerad %s av %s', 'testforetag'),
                        get_the_date(),
                        get_the_author()
                    );
                    ?>
                </p>
            </div>
        </section>
        <?php endif; ?>
        
        <section class="section">
            <div class="container" style="max-width: 800px;">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    
                    <?php if (!has_post_thumbnail()) : ?>
                    <header class="entry-header mb-8">
                        <h1><?php the_title(); ?></h1>
                        <p class="text-muted">
                            <?php
                            printf(
                                __('Publicerad %s av %s', 'testforetag'),
                                get_the_date(),
                                get_the_author()
                            );
                            ?>
                        </p>
                    </header>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Sidor:', 'testforetag'),
                            'after' => '</div>',
                        ));
                        ?>
                    </div>

                    <footer class="entry-footer mt-8">
                        <?php
                        $categories = get_the_category();
                        if ($categories) :
                            echo '<p class="text-muted"><strong>' . __('Kategorier:', 'testforetag') . '</strong> ';
                            $cat_links = array();
                            foreach ($categories as $category) {
                                $cat_links[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                            }
                            echo implode(', ', $cat_links);
                            echo '</p>';
                        endif;

                        $tags = get_the_tags();
                        if ($tags) :
                            echo '<p class="text-muted"><strong>' . __('Taggar:', 'testforetag') . '</strong> ';
                            $tag_links = array();
                            foreach ($tags as $tag) {
                                $tag_links[] = '<a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a>';
                            }
                            echo implode(', ', $tag_links);
                            echo '</p>';
                        endif;
                        ?>
                    </footer>
                </article>

                <!-- Post navigation -->
                <nav class="post-navigation mt-8 py-8" style="border-top: 1px solid hsl(var(--border));">
                    <div style="display: flex; justify-content: space-between; gap: 2rem;">
                        <div>
                            <?php previous_post_link('<span class="text-muted">' . __('Föregående', 'testforetag') . '</span><br>%link'); ?>
                        </div>
                        <div style="text-align: right;">
                            <?php next_post_link('<span class="text-muted">' . __('Nästa', 'testforetag') . '</span><br>%link'); ?>
                        </div>
                    </div>
                </nav>

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
