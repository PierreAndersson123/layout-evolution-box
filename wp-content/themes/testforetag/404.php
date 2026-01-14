<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <section class="section" style="min-height: 60vh; display: flex; align-items: center;">
        <div class="container text-center">
            <h1 style="font-size: 8rem; color: hsl(var(--primary)); margin-bottom: 1rem;">404</h1>
            <h2><?php _e('Sidan kunde inte hittas', 'testforetag'); ?></h2>
            <p class="text-muted mb-8"><?php _e('Sidan du letar efter finns inte eller har flyttats.', 'testforetag'); ?></p>
            
            <div class="mb-8">
                <?php get_search_form(); ?>
            </div>
            
            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg"><?php _e('Tillbaka till startsidan', 'testforetag'); ?></a>
        </div>
    </section>

</main>

<?php
get_footer();
