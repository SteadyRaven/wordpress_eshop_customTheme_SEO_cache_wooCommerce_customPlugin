<?php 
/**
 * Template part for displaying Featured Courses Section
 *
 * @package Prime Interior Designer
 */
    $featured_services_section_title      = prime_interior_designer_get_option( 'featured_services_section_title' );
    
    ?>
    <?php if( !empty($featured_services_section_title) ):?>
    <div class="section-title">
        <h4><?php echo esc_html($featured_services_section_title);?></h4>
    </div>
    <?php endif;?>
    <div id="service-section" class="section-content">        
        <div class="owl-carousel">
            <?php if(class_exists('woocommerce')){ ?>
                <?php
                $prod_categories = get_terms( 'product_cat', array(
                  'number'     => 20,
                  'orderby'    => 'name',
                  'order'      => 'ASC',
                  'hide_empty' => 0
                ));
                foreach( $prod_categories as $prod_cat ) :
                  $cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
                  $cat_thumb_url = wp_get_attachment_thumb_url( $cat_thumb_id );
                  $term_link = get_term_link( $prod_cat, 'product_cat' );
                ?>
                <div class="product_cat_box text-center py-5 px-3">
                    <div class="product_cat_image">
                        <img src="<?php echo esc_url($cat_thumb_url); ?>" alt="<?php echo esc_html($prod_cat->name); ?>" />
                        <div class="product_cat_btn">
                            <a href="<?php echo esc_url($term_link); ?>"><?php esc_html_e('SHOP COLLECTION','prime-interior-designer'); ?></a>
                        </div>
                    </div>
                    <p><?php echo esc_html($prod_cat->name); ?></p>
                </div>
              <?php endforeach; wp_reset_query(); ?>
            <?php }?>
        </div>
    </div><!-- .section-content -->