    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <!-- Contact Widget -->
                <div class="footer-widget">
                    <h4><?php _e('Kontakt', 'testforetag'); ?></h4>
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <p><?php echo esc_html(get_theme_mod('company_address', 'Storgatan 1, 211 34 Malmö')); ?></p>
                        <p><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('company_phone', '040-123 456'))); ?>"><?php echo esc_html(get_theme_mod('company_phone', '040-123 456')); ?></a></p>
                        <p><a href="mailto:<?php echo esc_attr(get_theme_mod('company_email', 'info@testforetag.se')); ?>"><?php echo esc_html(get_theme_mod('company_email', 'info@testforetag.se')); ?></a></p>
                    <?php endif; ?>
                </div>

                <!-- Quick Links Widget -->
                <div class="footer-widget">
                    <h4><?php _e('Snabblänkar', 'testforetag'); ?></h4>
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_id' => 'footer-menu',
                            'container' => false,
                            'fallback_cb' => 'testforetag_footer_menu_fallback',
                            'depth' => 1,
                        ));
                        ?>
                    <?php endif; ?>
                </div>

                <!-- Newsletter Widget -->
                <div class="footer-widget">
                    <h4><?php _e('Nyhetsbrev', 'testforetag'); ?></h4>
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <p><?php _e('Prenumerera på vårt nyhetsbrev för att få de senaste nyheterna.', 'testforetag'); ?></p>
                        <form class="newsletter-form" action="#" method="post">
                            <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Din e-postadress', 'testforetag'); ?>" required>
                            <button type="submit"><?php _e('Prenumerera', 'testforetag'); ?></button>
                        </form>
                    <?php endif; ?>
                </div>

                <!-- Social Widget -->
                <div class="footer-widget">
                    <h4><?php _e('Följ oss', 'testforetag'); ?></h4>
                    <?php if (is_active_sidebar('footer-4')) : ?>
                        <?php dynamic_sidebar('footer-4'); ?>
                    <?php else : ?>
                        <ul class="social-links">
                            <?php if (get_theme_mod('social_facebook')) : ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('social_facebook')); ?>" target="_blank" rel="noopener noreferrer">Facebook</a></li>
                            <?php endif; ?>
                            <?php if (get_theme_mod('social_instagram')) : ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('social_instagram')); ?>" target="_blank" rel="noopener noreferrer">Instagram</a></li>
                            <?php endif; ?>
                            <?php if (get_theme_mod('social_linkedin')) : ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('social_linkedin')); ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a></li>
                            <?php endif; ?>
                            <?php if (get_theme_mod('social_twitter')) : ?>
                                <li><a href="<?php echo esc_url(get_theme_mod('social_twitter')); ?>" target="_blank" rel="noopener noreferrer">Twitter</a></li>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_theme_mod('company_name', get_bloginfo('name'))); ?>. <?php _e('Alla rättigheter förbehållna.', 'testforetag'); ?></p>
                <div class="footer-links">
                    <a href="<?php echo esc_url(get_privacy_policy_url()); ?>"><?php _e('Integritetspolicy', 'testforetag'); ?></a>
                    <a href="#" id="cookie-settings-link"><?php _e('Cookies', 'testforetag'); ?></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cookie Consent -->
    <div id="cookie-consent" class="cookie-consent">
        <div class="container">
            <div class="cookie-consent-inner">
                <p><?php echo esc_html(get_theme_mod('cookie_message', 'Vi använder cookies för att förbättra din upplevelse på vår webbplats.')); ?></p>
                <div class="cookie-buttons">
                    <button class="btn btn-primary btn-sm" id="cookie-accept"><?php _e('Acceptera', 'testforetag'); ?></button>
                    <button class="btn btn-ghost btn-sm" id="cookie-reject"><?php _e('Avvisa', 'testforetag'); ?></button>
                    <button class="btn btn-outline btn-sm" id="cookie-settings"><?php _e('Inställningar', 'testforetag'); ?></button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cookie Settings Modal -->
    <div id="cookie-modal" class="modal">
        <div class="modal-content">
            <button class="modal-close" aria-label="<?php esc_attr_e('Stäng', 'testforetag'); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div class="modal-header">
                <h3><?php _e('Cookie-inställningar', 'testforetag'); ?></h3>
            </div>
            <div class="modal-body">
                <p><?php _e('Här kan du hantera dina cookie-preferenser.', 'testforetag'); ?></p>
                
                <div class="cookie-option">
                    <label>
                        <input type="checkbox" checked disabled>
                        <span><strong><?php _e('Nödvändiga cookies', 'testforetag'); ?></strong> - <?php _e('Krävs för webbplatsens grundläggande funktioner.', 'testforetag'); ?></span>
                    </label>
                </div>
                
                <div class="cookie-option">
                    <label>
                        <input type="checkbox" name="analytics_cookies" id="analytics-cookies">
                        <span><strong><?php _e('Analyticscookies', 'testforetag'); ?></strong> - <?php _e('Hjälper oss förstå hur besökare använder webbplatsen.', 'testforetag'); ?></span>
                    </label>
                </div>
                
                <div class="cookie-option">
                    <label>
                        <input type="checkbox" name="marketing_cookies" id="marketing-cookies">
                        <span><strong><?php _e('Marknadsföringscookies', 'testforetag'); ?></strong> - <?php _e('Används för att visa relevanta annonser.', 'testforetag'); ?></span>
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-ghost" id="modal-close"><?php _e('Avbryt', 'testforetag'); ?></button>
                <button class="btn btn-primary" id="save-cookie-settings"><?php _e('Spara inställningar', 'testforetag'); ?></button>
            </div>
        </div>
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Fallback footer menu
 */
function testforetag_footer_menu_fallback() {
    ?>
    <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php _e('Hem', 'testforetag'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/om-oss/')); ?>"><?php _e('Om oss', 'testforetag'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/fastigheter/')); ?>"><?php _e('Fastigheter', 'testforetag'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/projektutveckling/')); ?>"><?php _e('Projektutveckling', 'testforetag'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/lediga-lokaler/')); ?>"><?php _e('Lediga lokaler', 'testforetag'); ?></a></li>
    </ul>
    <?php
}
?>
