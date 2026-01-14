<?php
/**
 * Template part for displaying a property card
 *
 * @package Testforetag
 */

$address = testforetag_get_property_address();
$area = testforetag_get_property_area();
$terms = get_the_terms(get_the_ID(), 'fastighetstyp');
$type = $terms ? $terms[0]->name : '';
$type_slug = $terms ? $terms[0]->slug : '';
$location_terms = get_the_terms(get_the_ID(), 'omrade');
$location = $location_terms ? $location_terms[0]->name : '';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card property-card'); ?> data-type="<?php echo esc_attr($type_slug); ?>">
    <div class="card-image">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('card-image'); ?>
            </a>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-1.jpg" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
        <?php if ($type) : ?>
            <span class="card-badge"><?php echo esc_html($type); ?></span>
        <?php endif; ?>
    </div>
    
    <div class="card-content">
        <?php the_title('<h3 class="card-title">', '</h3>'); ?>
        
        <?php if (has_excerpt()) : ?>
            <p class="card-description"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
        
        <div class="card-meta">
            <?php if ($location) : ?>
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                <?php echo esc_html($location); ?>
            </span>
            <?php endif; ?>
            <?php if ($area) : ?>
            <span class="card-meta-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                <?php echo esc_html($area); ?> m²
            </span>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="card-footer">
        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php _e('Läs mer', 'testforetag'); ?></a>
    </div>
</article>
