<?php
/**
 * Template part for displaying Capture Section
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

?>

<?php if( get_theme_mod( 'cinematic_photographer_capture_photograph_enable',false ) != '') { ?>

<section id="capture-photo">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
        <div class="capture-content pl-lg-5">
          <?php if( get_theme_mod( 'cinematic_photographer_capture_photograph_heading' ) != '') { ?>
            <h2><?php echo esc_html(get_theme_mod('cinematic_photographer_capture_photograph_heading')); ?></h2>
          <?php }?>
          <?php if( get_theme_mod( 'cinematic_photographer_capture_photograph_sub_heading' ) != '') { ?>
            <p class="mb-0"><?php echo esc_html(get_theme_mod('cinematic_photographer_capture_photograph_sub_heading')); ?></p>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
        <div class="pull-up-box">
          <div class="owl-carousel">
            <?php
              $cinematic_photographer_post_category = get_theme_mod('cinematic_photographer_capture_photograph_section_category');
              if($cinematic_photographer_post_category){
                $cinematic_photographer_page_query = new WP_Query(array( 'category_name' => esc_html( $cinematic_photographer_post_category ,'cinematic-photographer')));?>
                <?php while( $cinematic_photographer_page_query->have_posts() ) : $cinematic_photographer_page_query->the_post(); ?>
                <div class="box">
                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    <h3 class="title py-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                </div>
                <?php endwhile;
                wp_reset_postdata();
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php }?>
