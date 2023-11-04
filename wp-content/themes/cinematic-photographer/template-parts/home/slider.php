<?php
/**
 * Template part for displaying slider section
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

?>
<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'cinematic_photographer_slider_arrows',false) != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $cinematic_photographer_slide_pages = array();
      for ( $cinematic_photographer_count = 1; $cinematic_photographer_count <= 4; $cinematic_photographer_count++ ) {
        $cinematic_photographer_mod = intval( get_theme_mod( 'cinematic_photographer_slider_page' . $cinematic_photographer_count ));
        if ( 'page-none-selected' != $cinematic_photographer_mod ) {
          $cinematic_photographer_slide_pages[] = $cinematic_photographer_mod;
        }
      }
      if( !empty($cinematic_photographer_slide_pages) ) :
        $cinematic_photographer_args = array(
          'post_type' => 'page',
          'post__in' => $cinematic_photographer_slide_pages,
          'orderby' => 'post__in'
        );
        $cinematic_photographer_query = new WP_Query( $cinematic_photographer_args );
        if ( $cinematic_photographer_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $cinematic_photographer_query->have_posts() ) : $cinematic_photographer_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
           <?php if(has_post_thumbnail()){ ?>
               <img src="<?php (the_post_thumbnail_url('full')); ?>"/> <?php }else {echo ('<img src="'.$static_image.'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php echo wp_trim_words( get_the_content(),15 );?></p>
              <?php if( get_theme_mod( 'cinematic_photographer_slider_button',true) != '' || get_theme_mod( 'cinematic_photographer_slider_buttom_mob',true) != '') { ?>
                <div class="more-btn">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Book Photoshoot Now','cinematic-photographer'); ?></a>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
