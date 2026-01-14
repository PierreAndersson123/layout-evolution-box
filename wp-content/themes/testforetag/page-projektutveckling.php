<?php
/**
 * Template Name: Projektutveckling
 * 
 * The template for displaying the Project Development page
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/project-hero.jpg" alt="<?php esc_attr_e('Projektutveckling', 'testforetag'); ?>" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php _e('Projektutveckling', 'testforetag'); ?></h1>
            <p class="hero-subtitle"><?php _e('Från vision till verklighet – vi utvecklar framtidens fastigheter', 'testforetag'); ?></p>
        </div>
    </section>

    <!-- Process Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Vår process', 'testforetag'); ?></h2>
                <p><?php _e('Så arbetar vi med projektutveckling', 'testforetag'); ?></p>
            </div>

            <div class="process-steps">
                <div class="process-step">
                    <div class="process-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                    </div>
                    <h3><?php _e('1. Analys', 'testforetag'); ?></h3>
                    <p><?php _e('Vi analyserar marknaden, platsen och möjligheterna. Genom noggrann research identifierar vi projektets potential och utmaningar.', 'testforetag'); ?></p>
                </div>

                <div class="process-step">
                    <div class="process-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path>
                            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path>
                        </svg>
                    </div>
                    <h3><?php _e('2. Planering', 'testforetag'); ?></h3>
                    <p><?php _e('Vi utvecklar en detaljerad projektplan med arkitekter, ingenjörer och andra specialister för att säkerställa bästa möjliga resultat.', 'testforetag'); ?></p>
                </div>

                <div class="process-step">
                    <div class="process-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path>
                        </svg>
                    </div>
                    <h3><?php _e('3. Genomförande', 'testforetag'); ?></h3>
                    <p><?php _e('Med erfarna entreprenörer och strikta kvalitetskrav genomför vi projektet effektivt och enligt plan.', 'testforetag'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Highlight Section -->
    <section class="section bg-secondary">
        <div class="container">
            <div class="intro-section">
                <div class="intro-content">
                    <h2><?php _e('Aktuellt projekt', 'testforetag'); ?></h2>
                    <p><?php _e('Just nu arbetar vi med ett spännande nybyggnadsprojekt i Västra Hamnen. Projektet omfattar cirka 8 000 kvm kontorsyta med fokus på hållbarhet och moderna arbetsmiljöer.', 'testforetag'); ?></p>
                    <ul>
                        <li><?php _e('BREEAM Excellent-certifiering', 'testforetag'); ?></li>
                        <li><?php _e('Solceller och gröna tak', 'testforetag'); ?></li>
                        <li><?php _e('Flexibla planlösningar', 'testforetag'); ?></li>
                        <li><?php _e('Planerad inflyttning Q3 2025', 'testforetag'); ?></li>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary"><?php _e('Kontakta oss för mer info', 'testforetag'); ?></a>
                </div>
                <div class="intro-image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/cta-background.jpg" alt="<?php esc_attr_e('Aktuellt projekt', 'testforetag'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Completed Projects Gallery -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Genomförda projekt', 'testforetag'); ?></h2>
                <p><?php _e('Ett urval av våra tidigare projektutvecklingar', 'testforetag'); ?></p>
            </div>

            <div class="gallery gallery-3">
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-1.jpg" alt="<?php esc_attr_e('Projekt 1', 'testforetag'); ?>">
                </div>
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-2.jpg" alt="<?php esc_attr_e('Projekt 2', 'testforetag'); ?>">
                </div>
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/hero-facade.jpg" alt="<?php esc_attr_e('Projekt 3', 'testforetag'); ?>">
                </div>
            </div>

            <?php
            // Show project posts if they exist
            $projects_query = new WP_Query(array(
                'post_type' => 'projekt',
                'posts_per_page' => 6,
            ));

            if ($projects_query->have_posts()) :
            ?>
            <div class="grid grid-3 mt-8">
                <?php
                while ($projects_query->have_posts()) : $projects_query->the_post();
                ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="card-image">
                        <?php the_post_thumbnail('card-image'); ?>
                    </div>
                    <?php endif; ?>
                    <div class="card-content">
                        <h3 class="card-title"><?php the_title(); ?></h3>
                        <p class="card-description"><?php echo get_the_excerpt(); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm"><?php _e('Läs mer', 'testforetag'); ?></a>
                    </div>
                </article>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="cta-band">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/cta-background.jpg" alt="" class="cta-band-image">
        <div class="cta-band-overlay"></div>
        <div class="cta-band-content container">
            <h2><?php _e('Har du ett projektförslag?', 'testforetag'); ?></h2>
            <p><?php _e('Vi är alltid intresserade av nya möjligheter och samarbeten', 'testforetag'); ?></p>
            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary btn-lg"><?php _e('Kontakta oss', 'testforetag'); ?></a>
        </div>
    </section>

</main>

<?php
get_footer();
