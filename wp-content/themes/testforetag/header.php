<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Hoppa till innehåll', 'testforetag'); ?></a>

    <header id="masthead" class="site-header">
        <div class="container">
            <div class="header-inner">
                <!-- Logo -->
                <div class="site-logo">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php echo esc_html(get_theme_mod('company_name', get_bloginfo('name'))); ?>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <nav id="site-navigation" class="main-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => false,
                        'fallback_cb' => 'testforetag_primary_menu_fallback',
                    ));
                    ?>
                </nav>

                <!-- Mobile Menu Toggle -->
                <button class="menu-toggle" aria-controls="mobile-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Öppna meny', 'testforetag'); ?>">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="mobile-navigation" aria-hidden="true">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile',
                'menu_id' => 'mobile-menu-list',
                'container' => false,
                'fallback_cb' => 'testforetag_primary_menu_fallback',
            ));
            ?>
        </nav>
        <div class="mobile-overlay"></div>
    </header>

    <div id="content" class="site-content">

<?php
/**
 * Fallback menu if no menu is set
 */
function testforetag_primary_menu_fallback() {
    ?>
    <ul>
        <li<?php if (is_front_page()) echo ' class="current-menu-item"'; ?>><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Hem', 'testforetag'); ?></a></li>
        <li<?php if (is_page('om-oss')) echo ' class="current-menu-item"'; ?>><a href="<?php echo esc_url(home_url('/om-oss/')); ?>"><?php _e('Om oss', 'testforetag'); ?></a></li>
        <li<?php if (is_page('fastigheter') || is_post_type_archive('fastighet')) echo ' class="current-menu-item"'; ?>><a href="<?php echo esc_url(home_url('/fastigheter/')); ?>"><?php _e('Fastigheter', 'testforetag'); ?></a></li>
        <li<?php if (is_page('projektutveckling')) echo ' class="current-menu-item"'; ?>><a href="<?php echo esc_url(home_url('/projektutveckling/')); ?>"><?php _e('Projektutveckling', 'testforetag'); ?></a></li>
        <li<?php if (is_page('lediga-lokaler') || is_post_type_archive('lokal')) echo ' class="current-menu-item"'; ?>><a href="<?php echo esc_url(home_url('/lediga-lokaler/')); ?>"><?php _e('Lediga lokaler', 'testforetag'); ?></a></li>
    </ul>
    <?php
}
?>
