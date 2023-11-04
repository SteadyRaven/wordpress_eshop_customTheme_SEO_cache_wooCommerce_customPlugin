<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scuba Diving Sport
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'scuba-diving-sport' ); ?></a>

<div class="topheader py-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-md-9 col-sm-9 text-md-left text-center align-self-center">
				<?php if ( get_theme_mod('scuba_diving_sport_header_location') ) : ?>
					<span class="mr-4"><i class="fas fa-map-marker-alt mr-2"></i><?php echo esc_html( get_theme_mod('scuba_diving_sport_header_location' ) ); ?></span>
				<?php endif; ?>
				<?php if ( get_theme_mod('scuba_diving_sport_header_phone_number') ) : ?>
					<span class="mr-4"><i class="fas fa-phone mr-2"></i><?php echo esc_html( get_theme_mod('scuba_diving_sport_header_phone_number' ) ); ?></span>
				<?php endif; ?>
				<?php if ( get_theme_mod('scuba_diving_sport_header_opening_heading') ) : ?>
					<span><i class="fas fa-clock mr-2"></i><?php esc_html_e('Open Hours: ','scuba-diving-sport'); ?><?php echo esc_html( get_theme_mod('scuba_diving_sport_header_opening_heading' ) ); ?></span>
				<?php endif; ?>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
				<?php $scuba_diving_sport_settings = get_theme_mod( 'scuba_diving_sport_social_links_settings' ); ?>
				<div class="social-links text-center text-md-right">
					<?php if ( is_array($scuba_diving_sport_settings) || is_object($scuba_diving_sport_settings) ){ ?>
						<span class="mr-2"><?php esc_html_e('Contact With Us: ','scuba-diving-sport'); ?></span>
				    	<?php foreach( $scuba_diving_sport_settings as $scuba_diving_sport_setting ) { ?>
					        <a href="<?php echo esc_url( $scuba_diving_sport_setting['link_url'] ); ?>">
				            	<i class="<?php echo esc_attr( $scuba_diving_sport_setting['link_text'] ); ?> mr-2"></i>
					        </a>
				    	<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<header id="site-navigation" class="header text-center text-md-left py-2 <?php if( get_theme_mod( 'scuba_diving_sport_sticky_header',false) != '') { ?>sticky-header<?php } else { ?>close-sticky <?php } ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
				<div class="logo text-center text-md-left mb-3 mb-md-0">
		    		<div class="logo-image">
		    			<?php the_custom_logo(); ?>
			    	</div>
					<div class="logo-content">
						<?php
							if ( get_theme_mod('scuba_diving_sport_display_header_title', true) == true ) :
								echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
								echo esc_attr(get_bloginfo('name'));
								echo '</a>';
							endif;
							if ( get_theme_mod('scuba_diving_sport_display_header_text', false) == true ) :
								echo '<span>'. esc_attr(get_bloginfo('description')) . '</span>';
							endif;
						?>
					</div>
				</div>
		   	</div>
			<div class="col-lg-7 col-md-6 col-sm-6 align-self-center">
				<button class="menu-toggle my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
					<span aria-hidden="true"><?php esc_html_e( 'Menu', 'scuba-diving-sport' ); ?></span>
				</button>
				<nav id="main-menu" class="close-panal">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'main-menu',
							'container' => 'false'
						));
					?>
					<button class="close-menu my-2 p-2" type="button">
						<span aria-hidden="true"><i class="fa fa-times"></i></span>
					</button>
				</nav>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 align-self-center">
				<?php if ( get_theme_mod('scuba_diving_sport_header_button_url') || get_theme_mod('scuba_diving_sport_header_button_text') ) : ?>
				<div class="appoint-btn my-4 my-md-0">
					<a href="<?php echo esc_html( get_theme_mod('scuba_diving_sport_header_button_url' ) ); ?>"><?php echo esc_html( get_theme_mod('scuba_diving_sport_header_button_text' ) ); ?></a>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</header>