<?php
/**
 * Testföretag Theme Functions
 *
 * @package Testforetag
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme setup
 */
function testforetag_setup() {
    // Make theme available for translation
    load_theme_textdomain('testforetag', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Custom image sizes
    add_image_size('hero-image', 1920, 1080, true);
    add_image_size('card-image', 800, 500, true);
    add_image_size('gallery-thumb', 400, 300, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Huvudmeny', 'testforetag'),
        'footer' => __('Footermeny', 'testforetag'),
        'mobile' => __('Mobilmeny', 'testforetag'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Add support for wide and full-width blocks
    add_theme_support('align-wide');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for block styles
    add_theme_support('wp-block-styles');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');

    // Custom color palette for Gutenberg
    add_theme_support('editor-color-palette', array(
        array(
            'name' => __('Primär', 'testforetag'),
            'slug' => 'primary',
            'color' => '#1e3a8a',
        ),
        array(
            'name' => __('Förgrund', 'testforetag'),
            'slug' => 'foreground',
            'color' => '#0f172a',
        ),
        array(
            'name' => __('Sekundär', 'testforetag'),
            'slug' => 'secondary',
            'color' => '#f1f5f9',
        ),
        array(
            'name' => __('Muted', 'testforetag'),
            'slug' => 'muted',
            'color' => '#64748b',
        ),
    ));
}
add_action('after_setup_theme', 'testforetag_setup');

/**
 * Set the content width
 */
function testforetag_content_width() {
    $GLOBALS['content_width'] = apply_filters('testforetag_content_width', 1200);
}
add_action('after_setup_theme', 'testforetag_content_width', 0);

/**
 * Enqueue scripts and styles
 */
function testforetag_scripts() {
    // Google Fonts - Inter
    wp_enqueue_style(
        'testforetag-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'testforetag-style',
        get_stylesheet_uri(),
        array('testforetag-fonts'),
        wp_get_theme()->get('Version')
    );

    // Custom theme styles
    wp_enqueue_style(
        'testforetag-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array('testforetag-style'),
        wp_get_theme()->get('Version')
    );

    // Main JavaScript
    wp_enqueue_script(
        'testforetag-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script with AJAX URL and nonce
    wp_localize_script('testforetag-main', 'testforetagData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('testforetag_nonce'),
        'homeUrl' => home_url(),
    ));

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'testforetag_scripts');

/**
 * Register widget areas
 */
function testforetag_widgets_init() {
    // Footer widget area 1
    register_sidebar(array(
        'name' => __('Footer Kontakt', 'testforetag'),
        'id' => 'footer-1',
        'description' => __('Lägg till widgets för kontaktinformation i footern.', 'testforetag'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    // Footer widget area 2
    register_sidebar(array(
        'name' => __('Footer Snabblänkar', 'testforetag'),
        'id' => 'footer-2',
        'description' => __('Lägg till widgets för snabblänkar i footern.', 'testforetag'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    // Footer widget area 3
    register_sidebar(array(
        'name' => __('Footer Nyhetsbrev', 'testforetag'),
        'id' => 'footer-3',
        'description' => __('Lägg till widgets för nyhetsbrev i footern.', 'testforetag'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    // Footer widget area 4
    register_sidebar(array(
        'name' => __('Footer Social', 'testforetag'),
        'id' => 'footer-4',
        'description' => __('Lägg till widgets för sociala medier i footern.', 'testforetag'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    // Sidebar
    register_sidebar(array(
        'name' => __('Sidebar', 'testforetag'),
        'id' => 'sidebar-1',
        'description' => __('Lägg till widgets i sidofältet.', 'testforetag'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'testforetag_widgets_init');

/**
 * Register Custom Post Type: Fastigheter
 */
function testforetag_register_fastigheter() {
    $labels = array(
        'name' => __('Fastigheter', 'testforetag'),
        'singular_name' => __('Fastighet', 'testforetag'),
        'menu_name' => __('Fastigheter', 'testforetag'),
        'add_new' => __('Lägg till ny', 'testforetag'),
        'add_new_item' => __('Lägg till ny fastighet', 'testforetag'),
        'edit_item' => __('Redigera fastighet', 'testforetag'),
        'new_item' => __('Ny fastighet', 'testforetag'),
        'view_item' => __('Visa fastighet', 'testforetag'),
        'search_items' => __('Sök fastigheter', 'testforetag'),
        'not_found' => __('Inga fastigheter hittades', 'testforetag'),
        'not_found_in_trash' => __('Inga fastigheter i papperskorgen', 'testforetag'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-building',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'fastigheter'),
    );

    register_post_type('fastighet', $args);

    // Register taxonomy: Område
    register_taxonomy('omrade', 'fastighet', array(
        'labels' => array(
            'name' => __('Områden', 'testforetag'),
            'singular_name' => __('Område', 'testforetag'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'omrade'),
    ));

    // Register taxonomy: Fastighetstyp
    register_taxonomy('fastighetstyp', 'fastighet', array(
        'labels' => array(
            'name' => __('Fastighetstyper', 'testforetag'),
            'singular_name' => __('Fastighetstyp', 'testforetag'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'fastighetstyp'),
    ));
}
add_action('init', 'testforetag_register_fastigheter');

/**
 * Register Custom Post Type: Lokaler
 */
function testforetag_register_lokaler() {
    $labels = array(
        'name' => __('Lediga Lokaler', 'testforetag'),
        'singular_name' => __('Lokal', 'testforetag'),
        'menu_name' => __('Lediga Lokaler', 'testforetag'),
        'add_new' => __('Lägg till ny', 'testforetag'),
        'add_new_item' => __('Lägg till ny lokal', 'testforetag'),
        'edit_item' => __('Redigera lokal', 'testforetag'),
        'new_item' => __('Ny lokal', 'testforetag'),
        'view_item' => __('Visa lokal', 'testforetag'),
        'search_items' => __('Sök lokaler', 'testforetag'),
        'not_found' => __('Inga lokaler hittades', 'testforetag'),
        'not_found_in_trash' => __('Inga lokaler i papperskorgen', 'testforetag'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-store',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'lediga-lokaler'),
    );

    register_post_type('lokal', $args);

    // Register taxonomy: Lokaltyp
    register_taxonomy('lokaltyp', 'lokal', array(
        'labels' => array(
            'name' => __('Lokaltyper', 'testforetag'),
            'singular_name' => __('Lokaltyp', 'testforetag'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'lokaltyp'),
    ));

    // Register taxonomy: Tillgänglighet
    register_taxonomy('tillganglighet', 'lokal', array(
        'labels' => array(
            'name' => __('Tillgänglighet', 'testforetag'),
            'singular_name' => __('Tillgänglighet', 'testforetag'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'tillganglighet'),
    ));
}
add_action('init', 'testforetag_register_lokaler');

/**
 * Register Custom Post Type: Projekt
 */
function testforetag_register_projekt() {
    $labels = array(
        'name' => __('Projekt', 'testforetag'),
        'singular_name' => __('Projekt', 'testforetag'),
        'menu_name' => __('Projekt', 'testforetag'),
        'add_new' => __('Lägg till nytt', 'testforetag'),
        'add_new_item' => __('Lägg till nytt projekt', 'testforetag'),
        'edit_item' => __('Redigera projekt', 'testforetag'),
        'new_item' => __('Nytt projekt', 'testforetag'),
        'view_item' => __('Visa projekt', 'testforetag'),
        'search_items' => __('Sök projekt', 'testforetag'),
        'not_found' => __('Inga projekt hittades', 'testforetag'),
        'not_found_in_trash' => __('Inga projekt i papperskorgen', 'testforetag'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-hammer',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'projekt'),
    );

    register_post_type('projekt', $args);

    // Register taxonomy: Projektstatus
    register_taxonomy('projektstatus', 'projekt', array(
        'labels' => array(
            'name' => __('Projektstatus', 'testforetag'),
            'singular_name' => __('Projektstatus', 'testforetag'),
        ),
        'public' => true,
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'projektstatus'),
    ));
}
add_action('init', 'testforetag_register_projekt');

/**
 * Add meta boxes for custom fields
 */
function testforetag_add_meta_boxes() {
    // Fastighet meta box
    add_meta_box(
        'fastighet_details',
        __('Fastighetsdetaljer', 'testforetag'),
        'testforetag_fastighet_meta_box',
        'fastighet',
        'normal',
        'high'
    );

    // Lokal meta box
    add_meta_box(
        'lokal_details',
        __('Lokaldetaljer', 'testforetag'),
        'testforetag_lokal_meta_box',
        'lokal',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'testforetag_add_meta_boxes');

/**
 * Fastighet meta box callback
 */
function testforetag_fastighet_meta_box($post) {
    wp_nonce_field('testforetag_fastighet_meta', 'testforetag_fastighet_nonce');
    
    $address = get_post_meta($post->ID, '_fastighet_address', true);
    $area = get_post_meta($post->ID, '_fastighet_area', true);
    $year_built = get_post_meta($post->ID, '_fastighet_year_built', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="fastighet_address"><?php _e('Adress', 'testforetag'); ?></label></th>
            <td><input type="text" id="fastighet_address" name="fastighet_address" value="<?php echo esc_attr($address); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="fastighet_area"><?php _e('Yta (kvm)', 'testforetag'); ?></label></th>
            <td><input type="text" id="fastighet_area" name="fastighet_area" value="<?php echo esc_attr($area); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="fastighet_year_built"><?php _e('Byggnadsår', 'testforetag'); ?></label></th>
            <td><input type="text" id="fastighet_year_built" name="fastighet_year_built" value="<?php echo esc_attr($year_built); ?>" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

/**
 * Lokal meta box callback
 */
function testforetag_lokal_meta_box($post) {
    wp_nonce_field('testforetag_lokal_meta', 'testforetag_lokal_nonce');
    
    $address = get_post_meta($post->ID, '_lokal_address', true);
    $area = get_post_meta($post->ID, '_lokal_area', true);
    $rent = get_post_meta($post->ID, '_lokal_rent', true);
    $available_from = get_post_meta($post->ID, '_lokal_available_from', true);
    ?>
    <table class="form-table">
        <tr>
            <th><label for="lokal_address"><?php _e('Adress', 'testforetag'); ?></label></th>
            <td><input type="text" id="lokal_address" name="lokal_address" value="<?php echo esc_attr($address); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="lokal_area"><?php _e('Yta (kvm)', 'testforetag'); ?></label></th>
            <td><input type="text" id="lokal_area" name="lokal_area" value="<?php echo esc_attr($area); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="lokal_rent"><?php _e('Hyra (kr/kvm/år)', 'testforetag'); ?></label></th>
            <td><input type="text" id="lokal_rent" name="lokal_rent" value="<?php echo esc_attr($rent); ?>" class="regular-text"></td>
        </tr>
        <tr>
            <th><label for="lokal_available_from"><?php _e('Tillgänglig från', 'testforetag'); ?></label></th>
            <td><input type="date" id="lokal_available_from" name="lokal_available_from" value="<?php echo esc_attr($available_from); ?>" class="regular-text"></td>
        </tr>
    </table>
    <?php
}

/**
 * Save meta box data
 */
function testforetag_save_meta_boxes($post_id) {
    // Fastighet
    if (isset($_POST['testforetag_fastighet_nonce']) && wp_verify_nonce($_POST['testforetag_fastighet_nonce'], 'testforetag_fastighet_meta')) {
        if (isset($_POST['fastighet_address'])) {
            update_post_meta($post_id, '_fastighet_address', sanitize_text_field($_POST['fastighet_address']));
        }
        if (isset($_POST['fastighet_area'])) {
            update_post_meta($post_id, '_fastighet_area', sanitize_text_field($_POST['fastighet_area']));
        }
        if (isset($_POST['fastighet_year_built'])) {
            update_post_meta($post_id, '_fastighet_year_built', sanitize_text_field($_POST['fastighet_year_built']));
        }
    }

    // Lokal
    if (isset($_POST['testforetag_lokal_nonce']) && wp_verify_nonce($_POST['testforetag_lokal_nonce'], 'testforetag_lokal_meta')) {
        if (isset($_POST['lokal_address'])) {
            update_post_meta($post_id, '_lokal_address', sanitize_text_field($_POST['lokal_address']));
        }
        if (isset($_POST['lokal_area'])) {
            update_post_meta($post_id, '_lokal_area', sanitize_text_field($_POST['lokal_area']));
        }
        if (isset($_POST['lokal_rent'])) {
            update_post_meta($post_id, '_lokal_rent', sanitize_text_field($_POST['lokal_rent']));
        }
        if (isset($_POST['lokal_available_from'])) {
            update_post_meta($post_id, '_lokal_available_from', sanitize_text_field($_POST['lokal_available_from']));
        }
    }
}
add_action('save_post', 'testforetag_save_meta_boxes');

/**
 * Add Theme Customizer options
 */
function testforetag_customize_register($wp_customize) {
    // Company Information Section
    $wp_customize->add_section('testforetag_company', array(
        'title' => __('Företagsinformation', 'testforetag'),
        'priority' => 30,
    ));

    // Company name
    $wp_customize->add_setting('company_name', array(
        'default' => 'Testföretag',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_name', array(
        'label' => __('Företagsnamn', 'testforetag'),
        'section' => 'testforetag_company',
        'type' => 'text',
    ));

    // Address
    $wp_customize->add_setting('company_address', array(
        'default' => 'Storgatan 1, 211 34 Malmö',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_address', array(
        'label' => __('Adress', 'testforetag'),
        'section' => 'testforetag_company',
        'type' => 'text',
    ));

    // Phone
    $wp_customize->add_setting('company_phone', array(
        'default' => '040-123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('company_phone', array(
        'label' => __('Telefon', 'testforetag'),
        'section' => 'testforetag_company',
        'type' => 'text',
    ));

    // Email
    $wp_customize->add_setting('company_email', array(
        'default' => 'info@testforetag.se',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('company_email', array(
        'label' => __('E-post', 'testforetag'),
        'section' => 'testforetag_company',
        'type' => 'email',
    ));

    // Hero Section
    $wp_customize->add_section('testforetag_hero', array(
        'title' => __('Hero-sektion', 'testforetag'),
        'priority' => 35,
    ));

    // Hero title
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Testföretag',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero-rubrik', 'testforetag'),
        'section' => 'testforetag_hero',
        'type' => 'text',
    ));

    // Hero subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Långsiktigt och hållbart fastighetsägande i Malmöregionen sedan 1985',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero-underrubrik', 'testforetag'),
        'section' => 'testforetag_hero',
        'type' => 'textarea',
    ));

    // Hero image
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Hero-bakgrundsbild', 'testforetag'),
        'section' => 'testforetag_hero',
    )));

    // Cookie consent
    $wp_customize->add_section('testforetag_cookies', array(
        'title' => __('Cookie-meddelande', 'testforetag'),
        'priority' => 40,
    ));

    $wp_customize->add_setting('cookie_message', array(
        'default' => 'Vi använder cookies för att förbättra din upplevelse på vår webbplats.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('cookie_message', array(
        'label' => __('Cookie-meddelande', 'testforetag'),
        'section' => 'testforetag_cookies',
        'type' => 'textarea',
    ));

    // Social media
    $wp_customize->add_section('testforetag_social', array(
        'title' => __('Sociala medier', 'testforetag'),
        'priority' => 45,
    ));

    $social_networks = array('facebook', 'instagram', 'linkedin', 'twitter');
    foreach ($social_networks as $network) {
        $wp_customize->add_setting("social_{$network}", array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("social_{$network}", array(
            'label' => ucfirst($network),
            'section' => 'testforetag_social',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'testforetag_customize_register');

/**
 * Custom excerpt length
 */
function testforetag_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'testforetag_excerpt_length');

/**
 * Custom excerpt more
 */
function testforetag_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'testforetag_excerpt_more');

/**
 * Add body classes
 */
function testforetag_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'is-front-page';
    }
    if (is_singular()) {
        $classes[] = 'is-singular';
    }
    return $classes;
}
add_filter('body_class', 'testforetag_body_classes');

/**
 * AJAX handler for filtering properties
 */
function testforetag_filter_properties() {
    check_ajax_referer('testforetag_nonce', 'nonce');

    $args = array(
        'post_type' => 'fastighet',
        'posts_per_page' => -1,
    );

    if (!empty($_POST['omrade'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'omrade',
            'field' => 'slug',
            'terms' => sanitize_text_field($_POST['omrade']),
        );
    }

    if (!empty($_POST['fastighetstyp'])) {
        $args['tax_query'][] = array(
            'taxonomy' => 'fastighetstyp',
            'field' => 'slug',
            'terms' => sanitize_text_field($_POST['fastighetstyp']),
        );
    }

    if (!empty($_POST['search'])) {
        $args['s'] = sanitize_text_field($_POST['search']);
    }

    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/card', 'fastighet');
        }
    } else {
        echo '<p class="no-results">' . __('Inga fastigheter hittades.', 'testforetag') . '</p>';
    }

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_filter_properties', 'testforetag_filter_properties');
add_action('wp_ajax_nopriv_filter_properties', 'testforetag_filter_properties');

/**
 * Include template functions
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';

/**
 * Flush rewrite rules on theme activation
 */
function testforetag_rewrite_flush() {
    testforetag_register_fastigheter();
    testforetag_register_lokaler();
    testforetag_register_projekt();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'testforetag_rewrite_flush');
