<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Testforetag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
    <div class="card-image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('card-image'); ?>
        </a>
    </div>
    <?php endif; ?>
    
    <div class="card-content">
        <span class="card-badge"><?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
        
        <header class="entry-header">
            <?php the_title('<h3 class="card-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
        </header>

        <div class="card-description">
            <?php the_excerpt(); ?>
        </div>
    </div>
    
    <div class="card-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php _e('Läs mer', 'testforetag'); ?></a>
    </div>
</article>
