<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Testforetag
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function testforetag_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'testforetag_pingback_header');

/**
 * Change archive title prefix
 */
function testforetag_archive_title($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = get_the_author();
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'testforetag_archive_title');

/**
 * Custom Walker for Navigation
 */
class Testforetag_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        $output .= $indent . '<li' . $class_names . '>';
        
        $atts = array();
        $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';
        
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Get property area
 */
function testforetag_get_property_area($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, '_fastighet_area', true);
}

/**
 * Get property address
 */
function testforetag_get_property_address($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, '_fastighet_address', true);
}

/**
 * Get lokal area
 */
function testforetag_get_lokal_area($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, '_lokal_area', true);
}

/**
 * Get lokal rent
 */
function testforetag_get_lokal_rent($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    return get_post_meta($post_id, '_lokal_rent', true);
}

/**
 * Get lokal availability
 */
function testforetag_get_lokal_availability($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }
    $date = get_post_meta($post_id, '_lokal_available_from', true);
    if ($date) {
        return date_i18n(get_option('date_format'), strtotime($date));
    }
    return __('Omgående', 'testforetag');
}
