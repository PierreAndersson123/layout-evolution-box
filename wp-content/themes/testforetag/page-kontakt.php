<?php
/**
 * Template Name: Kontakt
 * 
 * The template for displaying the Contact page
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero" style="min-height: 40vh;">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/office-interior-2.jpg" alt="<?php esc_attr_e('Kontakta oss', 'testforetag'); ?>" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php _e('Kontakta oss', 'testforetag'); ?></h1>
            <p class="hero-subtitle"><?php _e('Vi finns här för att hjälpa dig', 'testforetag'); ?></p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section">
        <div class="container">
            <div class="intro-section">
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <h2><?php _e('Skicka ett meddelande', 'testforetag'); ?></h2>
                    <p class="text-muted mb-4"><?php _e('Fyll i formuläret nedan så återkommer vi så snart som möjligt.', 'testforetag'); ?></p>
                    
                    <?php
                    // Check if Contact Form 7 is active
                    if (shortcode_exists('contact-form-7')) :
                        // Display CF7 form if available
                        echo do_shortcode('[contact-form-7 id="contact-form" title="Kontaktformulär"]');
                    else :
                    ?>
                    <form id="contact-form" class="contact-form" method="post" action="">
                        <?php wp_nonce_field('testforetag_contact', 'contact_nonce'); ?>
                        
                        <div class="form-group">
                            <label for="contact-name"><?php _e('Namn', 'testforetag'); ?> *</label>
                            <input type="text" id="contact-name" name="contact_name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-email"><?php _e('E-post', 'testforetag'); ?> *</label>
                            <input type="email" id="contact-email" name="contact_email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-phone"><?php _e('Telefon', 'testforetag'); ?></label>
                            <input type="tel" id="contact-phone" name="contact_phone">
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-subject"><?php _e('Ämne', 'testforetag'); ?></label>
                            <select id="contact-subject" name="contact_subject">
                                <option value=""><?php _e('Välj ämne...', 'testforetag'); ?></option>
                                <option value="lokaler"><?php _e('Lediga lokaler', 'testforetag'); ?></option>
                                <option value="fastigheter"><?php _e('Fastigheter', 'testforetag'); ?></option>
                                <option value="projekt"><?php _e('Projektutveckling', 'testforetag'); ?></option>
                                <option value="hyresgast"><?php _e('Befintlig hyresgäst', 'testforetag'); ?></option>
                                <option value="ovrigt"><?php _e('Övrigt', 'testforetag'); ?></option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact-message"><?php _e('Meddelande', 'testforetag'); ?> *</label>
                            <textarea id="contact-message" name="contact_message" rows="5" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="contact_gdpr" required>
                                <?php printf(__('Jag godkänner att mina uppgifter behandlas enligt <a href="%s">integritetspolicyn</a>', 'testforetag'), esc_url(get_privacy_policy_url())); ?>
                            </label>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg"><?php _e('Skicka meddelande', 'testforetag'); ?></button>
                    </form>
                    <?php endif; ?>
                </div>
                
                <!-- Contact Info -->
                <div class="contact-info">
                    <h2><?php _e('Kontaktuppgifter', 'testforetag'); ?></h2>
                    
                    <div class="contact-info-item">
                        <h4>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                            <?php _e('Besöksadress', 'testforetag'); ?>
                        </h4>
                        <p><?php echo esc_html(get_theme_mod('company_address', 'Storgatan 1, 211 34 Malmö')); ?></p>
                    </div>
                    
                    <div class="contact-info-item">
                        <h4>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                            <?php _e('Telefon', 'testforetag'); ?>
                        </h4>
                        <p><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '040-123 456'))); ?>"><?php echo esc_html(get_theme_mod('company_phone', '040-123 456')); ?></a></p>
                    </div>
                    
                    <div class="contact-info-item">
                        <h4>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                            <?php _e('E-post', 'testforetag'); ?>
                        </h4>
                        <p><a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@testforetag.se')); ?>"><?php echo esc_html(get_theme_mod('company_email', 'info@testforetag.se')); ?></a></p>
                    </div>
                    
                    <div class="contact-info-item">
                        <h4>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <?php _e('Öppettider', 'testforetag'); ?>
                        </h4>
                        <p><?php _e('Måndag - Fredag: 08:00 - 17:00', 'testforetag'); ?></p>
                    </div>

                    <!-- Map placeholder -->
                    <div class="contact-map mt-8">
                        <h4><?php _e('Hitta hit', 'testforetag'); ?></h4>
                        <div style="background: hsl(var(--secondary)); height: 250px; border-radius: var(--radius); display: flex; align-items: center; justify-content: center;">
                            <p class="text-muted"><?php _e('Karta laddas här (Google Maps)', 'testforetag'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<style>
.contact-form-wrapper,
.contact-info {
    padding: 2rem;
}

.contact-info-item {
    margin-bottom: 1.5rem;
}

.contact-info-item h4 {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: hsl(var(--primary));
}

.contact-info-item p {
    margin-left: 1.75rem;
    margin-bottom: 0;
}

.contact-info-item a {
    color: hsl(var(--foreground));
    transition: color 0.2s ease;
}

.contact-info-item a:hover {
    color: hsl(var(--primary));
}

@media (min-width: 768px) {
    .intro-section {
        grid-template-columns: 1.2fr 1fr;
        gap: 4rem;
    }
}
</style>

<?php
get_footer();
