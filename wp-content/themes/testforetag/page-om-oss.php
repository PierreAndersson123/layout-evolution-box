<?php
/**
 * Template Name: Om oss
 * 
 * The template for displaying the About page
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/about-hero.jpg" alt="<?php esc_attr_e('Om Testföretag', 'testforetag'); ?>" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php _e('Om oss', 'testforetag'); ?></h1>
            <p class="hero-subtitle"><?php _e('Långsiktigt och hållbart fastighetsägande sedan 1985', 'testforetag'); ?></p>
        </div>
    </section>

    <!-- Philosophy Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Vår filosofi', 'testforetag'); ?></h2>
            </div>
            
            <div class="grid grid-2">
                <div>
                    <h3><?php _e('Vision', 'testforetag'); ?></h3>
                    <p><?php _e('Vår vision är att vara den ledande fastighetsaktören i Malmöregionen, känd för vårt långsiktiga engagemang och våra hållbara fastighetslösningar.', 'testforetag'); ?></p>
                    <p><?php _e('Vi strävar efter att skapa miljöer där människor trivs och företag kan växa, samtidigt som vi tar ansvar för vår påverkan på miljön och samhället.', 'testforetag'); ?></p>
                </div>
                <div>
                    <h3><?php _e('Värderingar', 'testforetag'); ?></h3>
                    <p><?php _e('Våra kärnvärderingar genomsyrar allt vi gör: långsiktighet, hållbarhet, kvalitet och personligt engagemang.', 'testforetag'); ?></p>
                    <p><?php _e('Vi tror på att bygga starka relationer med våra hyresgäster, leverantörer och samarbetspartners. Genom öppen kommunikation och ömsesidig respekt skapar vi värde för alla parter.', 'testforetag'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="section bg-secondary">
        <div class="container">
            <div class="section-header">
                <h2><?php _e('Vår historia', 'testforetag'); ?></h2>
                <p><?php _e('En resa genom tiden – från start till idag', 'testforetag'); ?></p>
            </div>

            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-year">1985</div>
                    <div class="timeline-content">
                        <h4><?php _e('Grundandet', 'testforetag'); ?></h4>
                        <p><?php _e('Testföretag grundas i Malmö med fokus på kommersiella fastigheter i centrala lägen.', 'testforetag'); ?></p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">1995</div>
                    <div class="timeline-content">
                        <h4><?php _e('Expansion', 'testforetag'); ?></h4>
                        <p><?php _e('Portföljen växer till att omfatta över 50 000 kvm lokalyta. Etablering i Lund och Helsingborg.', 'testforetag'); ?></p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2005</div>
                    <div class="timeline-content">
                        <h4><?php _e('Hållbarhetsfokus', 'testforetag'); ?></h4>
                        <p><?php _e('Lansering av hållbarhetsprogram med mål att minska energiförbrukningen med 30% till 2015.', 'testforetag'); ?></p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2015</div>
                    <div class="timeline-content">
                        <h4><?php _e('Certifieringar', 'testforetag'); ?></h4>
                        <p><?php _e('Första fastigheterna miljöcertifieras enligt BREEAM. Fortsatt tillväxt i Malmöregionen.', 'testforetag'); ?></p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h4><?php _e('Idag', 'testforetag'); ?></h4>
                        <p><?php _e('Över 100 000 kvm förvaltad yta och ett 20-tal fastigheter i Malmöregionen. Fortsatt fokus på hållbar utveckling.', 'testforetag'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Methods Section -->
    <section class="section">
        <div class="container">
            <div class="intro-section">
                <div class="intro-content">
                    <h2><?php _e('Vårt arbetssätt', 'testforetag'); ?></h2>
                    <p><?php _e('Vi arbetar med ett kundfokuserat förhållningssätt där hyresgästens behov alltid står i centrum.', 'testforetag'); ?></p>
                    <ul>
                        <li><?php _e('Personlig kontakt och tillgänglig förvaltning', 'testforetag'); ?></li>
                        <li><?php _e('Snabb och professionell hantering av ärenden', 'testforetag'); ?></li>
                        <li><?php _e('Löpande underhåll och förbättringsarbete', 'testforetag'); ?></li>
                        <li><?php _e('Flexibla lokallösningar efter behov', 'testforetag'); ?></li>
                        <li><?php _e('Hållbara val i drift och utveckling', 'testforetag'); ?></li>
                    </ul>
                </div>
                <div class="intro-image">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/office-interior-2.jpg" alt="<?php esc_attr_e('Kontorsinteriör', 'testforetag'); ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="cta-band">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/cta-background.jpg" alt="" class="cta-band-image">
        <div class="cta-band-overlay"></div>
        <div class="cta-band-content container">
            <h2><?php _e('Vill du veta mer?', 'testforetag'); ?></h2>
            <p><?php _e('Kontakta oss för att diskutera hur vi kan hjälpa dig', 'testforetag'); ?></p>
            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary btn-lg"><?php _e('Kontakta oss', 'testforetag'); ?></a>
        </div>
    </section>

</main>

<?php
get_footer();
