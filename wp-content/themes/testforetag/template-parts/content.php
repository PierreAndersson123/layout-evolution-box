<?php
/**
 * Template part for displaying posts
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
        <header class="entry-header">
            <?php the_title('<h3 class="card-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h3>'); ?>
        </header>

        <div class="card-description">
            <?php the_excerpt(); ?>
        </div>

        <div class="card-meta">
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <?php echo get_the_date(); ?>
            </span>
            <?php if (get_comments_number() > 0) : ?>
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                <?php echo get_comments_number(); ?>
            </span>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="card-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php _e('Läs mer', 'testforetag'); ?></a>
    </div>
</article>
