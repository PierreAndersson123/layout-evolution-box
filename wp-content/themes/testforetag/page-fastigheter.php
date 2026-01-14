<?php
/**
 * Template Name: Fastigheter
 * 
 * The template for displaying the Properties page
 *
 * @package Testforetag
 */

get_header();
?>

<main id="primary" class="site-main">
    
    <!-- Hero Section -->
    <section class="hero">
        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-hero.jpg" alt="<?php esc_attr_e('Våra fastigheter', 'testforetag'); ?>" class="hero-image">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title"><?php _e('Fastigheter', 'testforetag'); ?></h1>
            <p class="hero-subtitle"><?php _e('Upptäck vårt fastighetsbestånd i Malmöregionen', 'testforetag'); ?></p>
        </div>
    </section>

    <!-- Filter Bar -->
    <section class="section">
        <div class="container">
            <div class="filter-bar">
                <form id="property-filter-form" class="filter-row">
                    <div class="filter-group">
                        <label for="filter-omrade"><?php _e('Område', 'testforetag'); ?></label>
                        <select id="filter-omrade" name="omrade">
                            <option value=""><?php _e('Alla områden', 'testforetag'); ?></option>
                            <?php
                            $omraden = get_terms(array(
                                'taxonomy' => 'omrade',
                                'hide_empty' => false,
                            ));
                            if (!is_wp_error($omraden)) :
                                foreach ($omraden as $omrade) :
                                    echo '<option value="' . esc_attr($omrade->slug) . '">' . esc_html($omrade->name) . '</option>';
                                endforeach;
                            else :
                            ?>
                                <option value="centrum">Malmö Centrum</option>
                                <option value="vastra-hamnen">Västra Hamnen</option>
                                <option value="hyllie">Hyllie</option>
                                <option value="triangeln">Triangeln</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filter-typ"><?php _e('Typ', 'testforetag'); ?></label>
                        <select id="filter-typ" name="fastighetstyp">
                            <option value=""><?php _e('Alla typer', 'testforetag'); ?></option>
                            <?php
                            $typer = get_terms(array(
                                'taxonomy' => 'fastighetstyp',
                                'hide_empty' => false,
                            ));
                            if (!is_wp_error($typer)) :
                                foreach ($typer as $typ) :
                                    echo '<option value="' . esc_attr($typ->slug) . '">' . esc_html($typ->name) . '</option>';
                                endforeach;
                            else :
                            ?>
                                <option value="kontor">Kontor</option>
                                <option value="handel">Handel</option>
                                <option value="lager">Lager</option>
                                <option value="industri">Industri</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    
                    <div class="filter-group">
                        <label for="filter-search"><?php _e('Sök', 'testforetag'); ?></label>
                        <input type="text" id="filter-search" name="search" placeholder="<?php esc_attr_e('Sök fastighet...', 'testforetag'); ?>">
                    </div>
                </form>
                
                <div class="filter-tags">
                    <button type="button" class="filter-tag active" data-filter="all"><?php _e('Alla', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="kontor"><?php _e('Kontor', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="handel"><?php _e('Handel', 'testforetag'); ?></button>
                    <button type="button" class="filter-tag" data-filter="lager"><?php _e('Lager', 'testforetag'); ?></button>
                </div>
            </div>

            <!-- Properties Grid -->
            <div id="properties-grid" class="grid grid-3">
                <?php
                $properties_query = new WP_Query(array(
                    'post_type' => 'fastighet',
                    'posts_per_page' => -1,
                ));

                if ($properties_query->have_posts()) :
                    while ($properties_query->have_posts()) : $properties_query->the_post();
                        get_template_part('template-parts/card', 'fastighet');
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Demo cards if no properties exist
                    $demo_properties = array(
                        array('title' => 'Stortorget 12', 'location' => 'Malmö Centrum', 'area' => '2 500', 'type' => 'Kontor', 'image' => 'property-1.jpg'),
                        array('title' => 'Västra Hamnen 8', 'location' => 'Västra Hamnen', 'area' => '1 800', 'type' => 'Kontor', 'image' => 'property-2.jpg'),
                        array('title' => 'Triangeln 5', 'location' => 'Triangeln', 'area' => '3 200', 'type' => 'Handel', 'image' => 'property-3.jpg'),
                        array('title' => 'Hyllie Boulevard 15', 'location' => 'Hyllie', 'area' => '4 500', 'type' => 'Kontor', 'image' => 'property-4.jpg'),
                        array('title' => 'Malmö Central 3', 'location' => 'Malmö Centrum', 'area' => '5 200', 'type' => 'Handel', 'image' => 'property-1.jpg'),
                        array('title' => 'Dockan 22', 'location' => 'Västra Hamnen', 'area' => '2 100', 'type' => 'Kontor', 'image' => 'property-2.jpg'),
                    );
                    
                    foreach ($demo_properties as $property) :
                    ?>
                    <article class="card property-card" data-type="<?php echo esc_attr(strtolower($property['type'])); ?>">
                        <div class="card-image">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_attr($property['image']); ?>" alt="<?php echo esc_attr($property['title']); ?>">
                            <span class="card-badge"><?php echo esc_html($property['type']); ?></span>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title"><?php echo esc_html($property['title']); ?></h3>
                            <p class="card-description"><?php _e('Modern fastighet i attraktivt läge med goda kommunikationer.', 'testforetag'); ?></p>
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
                            <button class="btn btn-outline btn-sm open-property-modal" data-title="<?php echo esc_attr($property['title']); ?>" data-location="<?php echo esc_attr($property['location']); ?>" data-area="<?php echo esc_attr($property['area']); ?>" data-type="<?php echo esc_attr($property['type']); ?>" data-image="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/<?php echo esc_attr($property['image']); ?>"><?php _e('Läs mer', 'testforetag'); ?></button>
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
            <h2><?php _e('Letar du efter lokal?', 'testforetag'); ?></h2>
            <p><?php _e('Se våra lediga lokaler och hitta din nya adress', 'testforetag'); ?></p>
            <a href="<?php echo esc_url(home_url('/lediga-lokaler/')); ?>" class="btn btn-primary btn-lg"><?php _e('Se lediga lokaler', 'testforetag'); ?></a>
        </div>
    </section>

</main>

<!-- Property Modal -->
<div id="property-modal" class="modal">
    <div class="modal-content">
        <button class="modal-close" aria-label="<?php esc_attr_e('Stäng', 'testforetag'); ?>">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <div class="modal-image">
            <img id="modal-property-image" src="" alt="">
        </div>
        <div class="modal-header">
            <h3 id="modal-property-title"></h3>
        </div>
        <div class="modal-body">
            <div class="card-meta mb-4">
                <span class="card-meta-item" id="modal-property-location"></span>
                <span class="card-meta-item" id="modal-property-area"></span>
                <span class="card-meta-item" id="modal-property-type"></span>
            </div>
            <p><?php _e('Modern fastighet i attraktivt läge med goda kommunikationer och närhet till service. Fastigheten erbjuder flexibla lokallösningar för olika verksamheter.', 'testforetag'); ?></p>
            
            <h4><?php _e('Galleri', 'testforetag'); ?></h4>
            <div class="gallery gallery-3">
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-1.jpg" alt="">
                </div>
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-2.jpg" alt="">
                </div>
                <div class="gallery-item">
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/property-3.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-ghost modal-close-btn"><?php _e('Stäng', 'testforetag'); ?></button>
            <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="btn btn-primary"><?php _e('Kontakta oss', 'testforetag'); ?></a>
        </div>
    </div>
</div>

<?php
get_footer();
