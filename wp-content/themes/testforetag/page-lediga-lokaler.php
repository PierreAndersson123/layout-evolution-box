<?php
/**
 * Template Name: Lediga lokaler
 * 
 * The template for displaying the Available Premises page
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/premises-hero.jpg" alt="<?php esc_attr_e('Lediga lokaler', 'testforetag'); ?>" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php _e('Lediga lokaler', 'testforetag'); ?></h1>
            <p class="hero-subtitle"><?php _e('Hitta din nästa lokal i vårt bestånd', 'testforetag'); ?></p>
        </div>
    </section>

    <!-- Filter and Listings -->
    <section class="section">
        <div class="container">
            <div class="filter-bar">
                <form id="premises-filter-form" class="filter-row">
                    <div class="filter-group" style="flex: 2;">
                        <label for="premises-search"><?php _e('Sök', 'testforetag'); ?></label>
                        <input type="text" id="premises-search" name="search" placeholder="<?php esc_attr_e('Sök lokal, adress eller område...', 'testforetag'); ?>">
                    </div>
                    
                    <div class="filter-group">
                        <label for="premises-typ"><?php _e('Lokaltyp', 'testforetag'); ?></label>
                        <select id="premises-typ" name="lokaltyp">
                            <option value=""><?php _e('Alla typer', 'testforetag'); ?></option>
                            <?php
                            $typer = get_terms(array(
                                'taxonomy' => 'lokaltyp',
                                'hide_empty' => false,
                            ));
                            if (!is_wp_error($typer) && !empty($typer)) :
                                foreach ($typer as $typ) :
                                    echo '<option value="' . esc_attr($typ->slug) . '">' . esc_html($typ->name) . '</option>';
                                endforeach;
                            else :
                            ?>
                                <option value="kontor">Kontor</option>
                                <option value="butik">Butik</option>
                                <option value="lager">Lager</option>
                                <option value="coworking">Coworking</option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label for="premises-sort"><?php _e('Sortera', 'testforetag'); ?></label>
                        <select id="premises-sort" name="sort">
                            <option value="date"><?php _e('Senast tillagda', 'testforetag'); ?></option>
                            <option value="area-asc"><?php _e('Yta (minst först)', 'testforetag'); ?></option>
                            <option value="area-desc"><?php _e('Yta (störst först)', 'testforetag'); ?></option>
                            <option value="rent-asc"><?php _e('Hyra (lägst först)', 'testforetag'); ?></option>
                        </select>
                    </div>
                </form>
                
                <div class="filter-tags">
                    <button type="button" class="filter-tag active" data-filter="all"><?php _e('Alla', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="kontor"><?php _e('Kontor', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="butik"><?php _e('Butik', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="lager"><?php _e('Lager', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="coworking"><?php _e('Coworking', 'testforetag'); ?></button>
                </div>
            </div>

            <!-- Results count -->
            <p class="text-muted mb-4" id="results-count">
                <?php
                $lokaler_query = new WP_Query(array(
                    'post_type' => 'lokal',
                    'posts_per_page' => -1,
                ));
                $count = $lokaler_query->found_posts;
                wp_reset_postdata();
                
                if ($count > 0) :
                    printf(_n('%s lokal hittad', '%s lokaler hittade', $count, 'testforetag'), $count);
                else :
                    _e('4 lokaler hittade', 'testforetag'); // Demo count
                endif;
                ?>
            </p>

            <!-- Premises Grid -->
            <div id="premises-grid" class="grid grid-2">
                <?php
                $lokaler_query = new WP_Query(array(
                    'post_type' => 'lokal',
                    'posts_per_page' => -1,
                ));

                if ($lokaler_query->have_posts()) :
                    while ($lokaler_query->have_posts()) : $lokaler_query->the_post();
                        get_template_part('template-parts/card', 'lokal');
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Demo cards if no lokaler exist
                    $demo_lokaler = array(
                        array('title' => 'Moderna kontorslokaler', 'address' => 'Stortorget 12, Malmö', 'area' => '450', 'rent' => '2 100', 'type' => 'Kontor', 'availability' => 'Omgående', 'image' => 'premises-1.jpg'),
                        array('title' => 'Butik i A-läge', 'address' => 'Södra Förstadsgatan 8, Malmö', 'area' => '120', 'rent' => '3 500', 'type' => 'Butik', 'availability' => '2024-03-01', 'image' => 'premises-2.jpg'),
                        array('title' => 'Coworking-plats', 'address' => 'Västra Hamnen, Malmö', 'area' => '25', 'rent' => '4 500', 'type' => 'Coworking', 'availability' => 'Omgående', 'image' => 'premises-3.jpg'),
                        array('title' => 'Flexibelt kontorshotell', 'address' => 'Hyllie Boulevard 15, Malmö', 'area' => '800', 'rent' => '1 800', 'type' => 'Kontor', 'availability' => '2024-04-01', 'image' => 'office-interior-1.jpg'),
                    );
                    
                    foreach ($demo_lokaler as $lokal) :
                    ?>
                    <article class="card premises-card" data-type="<?php echo esc_attr(strtolower($lokal['type'])); ?>">
                        <div class="card-image">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_attr($lokal['image']); ?>" alt="<?php echo esc_attr($lokal['title']); ?>">
                            <span class="card-badge"><?php echo esc_html($lokal['type']); ?></span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?php echo esc_html($lokal['title']); ?></h3>
                            <p class="card-description"><?php echo esc_html($lokal['address']); ?></p>
                            <div class="card-meta">
                                <span class="card-meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                                    <?php echo esc_html($lokal['area']); ?> m²
                                </span>
                                <span class="card-meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                    <?php echo esc_html($lokal['rent']); ?> kr/m²/år
                                </span>
                                <span class="card-meta-item">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <?php echo esc_html($lokal['availability']); ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-outline btn-sm open-premises-modal" 
                                data-title="<?php echo esc_attr($lokal['title']); ?>" 
                                data-address="<?php echo esc_attr($lokal['address']); ?>" 
                                data-area="<?php echo esc_attr($lokal['area']); ?>" 
                                data-rent="<?php echo esc_attr($lokal['rent']); ?>"
                                data-type="<?php echo esc_attr($lokal['type']); ?>"
                                data-availability="<?php echo esc_attr($lokal['availability']); ?>"
                                data-image="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_attr($lokal['image']); ?>">
                                <?php _e('Läs mer', 'testforetag'); ?>
                            </button>
                            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary btn-sm"><?php _e('Boka visning', 'testforetag'); ?></a>
                        </div>
                    </article>
                    <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- CTA Band -->
    <section class="cta-band">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/cta-background.jpg" alt="" class="cta-band-image">
        <div class="cta-band-overlay"></div>
        <div class="cta-band-content container">
            <h2><?php _e('Hittar du inte rätt lokal?', 'testforetag'); ?></h2>
            <p><?php _e('Kontakta oss så hjälper vi dig att hitta den perfekta lokalen', 'testforetag'); ?></p>
            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary btn-lg"><?php _e('Kontakta oss', 'testforetag'); ?></a>
        </div>
    </section>

</main>

<!-- Premises Modal -->
<div id="premises-modal" class="modal">
    <div class="modal-content">
        <button class="modal-close" aria-label="<?php esc_attr_e('Stäng', 'testforetag'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="modal-image">
            <img id="modal-premises-image" src="" alt="">
        </div>
        <div class="modal-header">
            <h3 id="modal-premises-title"></h3>
        </div>
        <div class="modal-body">
            <p id="modal-premises-address" class="text-muted"></p>
            
            <div class="card-meta mb-4">
                <span class="card-meta-item" id="modal-premises-area"></span>
                <span class="card-meta-item" id="modal-premises-rent"></span>
                <span class="card-meta-item" id="modal-premises-type"></span>
                <span class="card-meta-item" id="modal-premises-availability"></span>
            </div>
            
            <h4><?php _e('Beskrivning', 'testforetag'); ?></h4>
            <p><?php _e('Ljus och modern lokal i attraktivt läge. Lokalen har öppen planlösning med möjlighet till anpassning efter hyresgästens behov. Närhet till kollektivtrafik och service.', 'testforetag'); ?></p>
            
            <h4><?php _e('Galleri', 'testforetag'); ?></h4>
            <div class="gallery gallery-3">
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/premises-1.jpg" alt="">
                </div>
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/premises-2.jpg" alt="">
                </div>
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/premises-3.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-ghost modal-close-btn"><?php _e('Stäng', 'testforetag'); ?></button>
            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary"><?php _e('Boka visning', 'testforetag'); ?></a>
        </div>
    </div>
</div>

<?php
get_footer();
