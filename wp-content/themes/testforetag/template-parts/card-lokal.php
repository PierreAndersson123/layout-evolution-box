<?php
/**
 * Template part for displaying a premises card
 *
 * @package Testforetag
 */

$address = get_post_meta(get_the_ID(), '_lokal_address', true);
$area = testforetag_get_lokal_area();
$rent = testforetag_get_lokal_rent();
$availability = testforetag_get_lokal_availability();
$terms = get_the_terms(get_the_ID(), 'lokaltyp');
$type = $terms ? $terms[0]->name : '';
$type_slug = $terms ? $terms[0]->slug : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card premises-card'); ?> data-type="<?php echo esc_attr($type_slug); ?>">
    <div class="card-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('card-image'); ?>
            </a>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/premises-1.jpg" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
        <?php if ($type) : ?>
            <span class="card-badge"><?php echo esc_html($type); ?></span>
        <?php endif; ?>
    </div>
    
    <div class="card-content">
        <?php the_title('<h3 class="card-title">', '</h3>'); ?>
        
        <?php if ($address) : ?>
            <p class="card-description"><?php echo esc_html($address); ?></p>
        <?php endif; ?>
        
        <div class="card-meta">
            <?php if ($area) : ?>
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                <?php echo esc_html($area); ?> m²
            </span>
            <?php endif; ?>
            <?php if ($rent) : ?>
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                <?php echo esc_html($rent); ?> kr/m²/år
            </span>
            <?php endif; ?>
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <?php echo esc_html($availability); ?>
            </span>
        </div>
    </div>
    
    <div class="card-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php _e('Läs mer', 'testforetag'); ?></a>
        <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary btn-sm"><?php _e('Boka visning', 'testforetag'); ?></a>
    </div>
</article>
