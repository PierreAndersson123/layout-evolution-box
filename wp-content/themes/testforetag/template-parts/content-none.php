<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Testforetag
 */
?>

<section class="no-results not-found text-center py-16">
    <header class="page-header">
        <h1><?php _e('Inget hittades', 'testforetag'); ?></h1>
    </header>

    <div class="page-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p>
                <?php
                printf(
                    __('Redo att publicera ditt första inlägg? <a href="%1$s">Kom igång här</a>.', 'testforetag'),
                    esc_url(admin_url('post-new.php'))
                );
                ?>
            </p>
        <?php elseif (is_search()) : ?>
            <p class="text-muted mb-8"><?php _e('Tyvärr, inga resultat matchade din sökning. Försök med andra sökord.', 'testforetag'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p class="text-muted mb-8"><?php _e('Det verkar som att vi inte kan hitta det du letar efter.', 'testforetag'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
