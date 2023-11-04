<?php
/*
* Display Logo and contact details
*/
?>

<?php
$cinematic_photographer_sticky = get_theme_mod('cinematic_photographer_sticky');
  $cinematic_photographer_data_sticky = "false";
  if ($cinematic_photographer_sticky) {
  $cinematic_photographer_data_sticky = "true";
  }
  global $wp_customize;
?>

<div class="headerbox <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($cinematic_photographer_data_sticky); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-12 align-self-center text-lg-left">
        <?php $cinematic_photographer_logo_settings = get_theme_mod( 'cinematic_photographer_logo_settings','Different Line');
        if($cinematic_photographer_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) cinematic_photographer_the_custom_logo(); ?>
            <?php if( get_theme_mod('cinematic_photographer_site_title_text',true) == 1){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $cinematic_photographer_description = get_bloginfo( 'description', 'display' );
            if ( $cinematic_photographer_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('cinematic_photographer_site_tagline_text',false)){ ?>
                <p class="site-description"><?php echo esc_html($cinematic_photographer_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($cinematic_photographer_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-center">
                <?php if( has_custom_logo() ) cinematic_photographer_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-center">
                <?php if( get_theme_mod('cinematic_photographer_site_title_text',true) == 1){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $cinematic_photographer_description = get_bloginfo( 'description', 'display' );
                if ( $cinematic_photographer_description || is_customize_preview() ) : ?>
                  <?php if( get_theme_mod('cinematic_photographer_site_tagline_text',false)){ ?>
                    <p class="site-description"><?php echo esc_html($cinematic_photographer_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-7 col-md-4 col-6 align-self-center text-md-center">
        <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
      </div>
      <div class="col-lg-2 col-md-4 col-6 align-self-center text-lg-right text-md-right">
        <?php if( get_theme_mod( 'cinematic_photographer_header_button_link' ) != '' || get_theme_mod( 'cinematic_photographer_header_button' ) != '') { ?>
          <div class="more-btn head-btn">
            <a href="<?php echo esc_url( get_theme_mod( 'cinematic_photographer_header_button_link','' ) ); ?>"><?php echo esc_html( get_theme_mod( 'cinematic_photographer_header_button','' ) ); ?></a>
          </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
