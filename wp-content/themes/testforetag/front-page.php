<?php
/**
 * Template Name: Startsida
 * 
 * The template for the front page
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero hero-full">
        <?php 
        $hero_image = get_theme_mod('hero_image');
        if ($hero_image) : ?>
            <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr(get_theme_mod('hero_title', 'Testföretag')); ?>" class="hero-image">
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-facade.jpg" alt="<?php echo esc_attr(get_theme_mod('hero_title', 'Testföretag')); ?>" class="hero-image">
        <?php endif; ?>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', 'Testföretag')); ?></h1>
            <p class="hero-subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Långsiktigt och hållbart fastighetsägande i Malmöregionen sedan 1985')); ?></p>
            <div class="hero-buttons">
                <a href="<?php echo esc_url(home_url('/lediga-lokaler/')); ?>" class="btn btn-primary btn-lg"><?php _e('Se lediga lokaler', 'testforetag'); ?></a>
                <a href="<?php echo esc_url(home_url('/om-oss/')); ?>" class="btn btn-secondary btn-lg"><?php _e('Läs mer om oss', 'testforetag'); ?></a>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="section">
        <div class="container">
            <div class="intro-section">
                <div class="intro-content">
                    <h2><?php _e('Långsiktigt fastighetsägande i Malmö', 'testforetag'); ?></h2>
                    <p><?php _e('Med över 35 års erfarenhet av fastighetsförvaltning i Malmöregionen har vi byggt upp en gedigen kunskap om den lokala marknaden och dess behov.', 'testforetag'); ?></p>
                    <p><?php _e('Vi tror på långsiktiga relationer med våra hyresgäster och arbetar aktivt för att skapa attraktiva och hållbara lokaler som möter framtidens krav.', 'testforetag'); ?></p>
                    <a href="<?php echo esc_url(home_url('/om-oss/')); ?>" class="btn btn-outline"><?php _e('Läs mer om oss', 'testforetag'); ?></a>
                </div>
                <div class="intro-image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/office-interior-1.jpg" alt="<?php esc_attr_e('Modern kontorsinteriör', 'testforetag'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section class="section bg-secondary">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Utvalda fastigheter', 'testforetag'); ?></h2>
                <p><?php _e('Upptäck några av våra fastigheter i Malmöregionen', 'testforetag'); ?></p>
            </div>

            <div class="grid grid-2">
                <?php
                // Query featured properties
                $featured_query = new WP_Query(array(
                    'post_type' => 'fastighet',
                    'posts_per_page' => 4,
                    'meta_key' => '_featured',
                    'meta_value' => '1',
                ));

                if ($featured_query->have_posts()) :
                    while ($featured_query->have_posts()) : $featured_query->the_post();
                        get_template_part('template-parts/card', 'fastighet');
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Demo cards if no properties exist
                    $demo_properties = array(
                        array('title' => 'Stortorget 12', 'location' => 'Malmö Centrum', 'area' => '2 500', 'type' => 'Kontor'),
                        array('title' => 'Västra Hamnen 8', 'location' => 'Västra Hamnen', 'area' => '1 800', 'type' => 'Kontor'),
                        array('title' => 'Triangeln 5', 'location' => 'Triangeln', 'area' => '3 200', 'type' => 'Handel'),
                        array('title' => 'Hyllie Boulevard 15', 'location' => 'Hyllie', 'area' => '4 500', 'type' => 'Kontor'),
                    );
                    $demo_images = array('property-1.jpg', 'property-2.jpg', 'property-3.jpg', 'property-4.jpg');
                    
                    foreach ($demo_properties as $index => $property) :
                    ?>
                    <article class="card">
                        <div class="card-image">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_attr($demo_images[$index]); ?>" alt="<?php echo esc_attr($property['title']); ?>">
                            <span class="card-badge"><?php echo esc_html($property['type']); ?></span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?php echo esc_html($property['title']); ?></h3>
                            <p class="card-description"><?php echo esc_html($property['location']); ?></p>
                            <div class="card-meta">
                                <span class="card-meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                    <?php echo esc_html($property['location']); ?>
                                </span>
                                <span class="card-meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                                    <?php echo esc_html($property['area']); ?> m²
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo esc_url(home_url('/fastigheter/')); ?>" class="btn btn-outline btn-sm"><?php _e('Läs mer', 'testforetag'); ?></a>
                        </div>
                    </article>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>

            <div class="text-center mt-8">
                <a href="<?php echo esc_url(home_url('/fastigheter/')); ?>" class="btn btn-primary"><?php _e('Se alla fastigheter', 'testforetag'); ?></a>
            </div>
        </div>
    </section>

    <!-- Project Highlight Section -->
    <section class="section">
        <div class="container">
            <div class="intro-section">
                <div class="intro-image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/project-hero.jpg" alt="<?php esc_attr_e('Projektutveckling', 'testforetag'); ?>">
                </div>
                <div class="intro-content">
                    <h2><?php _e('Projektutveckling', 'testforetag'); ?></h2>
                    <p><?php _e('Vi utvecklar fastigheter med fokus på hållbarhet och framtidssäkra lösningar. Vårt erfarna team har genomfört ett flertal framgångsrika projekt i Malmöregionen.', 'testforetag'); ?></p>
                    <p><?php _e('Från idé till färdig byggnad arbetar vi nära våra partners för att skapa värde för både hyresgäster och samhället.', 'testforetag'); ?></p>
                    <a href="<?php echo esc_url(home_url('/projektutveckling/')); ?>" class="btn btn-primary"><?php _e('Läs om projektutveckling', 'testforetag'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="cta-band">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/cta-background.jpg" alt="" class="cta-band-image">
        <div class="cta-band-overlay"></div>
        <div class="cta-band-content container">
            <h2><?php _e('Letar du efter lokal?', 'testforetag'); ?></h2>
            <p><?php _e('Vi har ett brett utbud av lediga lokaler i attraktiva lägen', 'testforetag'); ?></p>
            <a href="<?php echo esc_url(home_url('/lediga-lokaler/')); ?>" class="btn btn-primary btn-lg"><?php _e('Se lediga lokaler', 'testforetag'); ?></a>
        </div>
    </section>

</main>

<?php
get_footer();
