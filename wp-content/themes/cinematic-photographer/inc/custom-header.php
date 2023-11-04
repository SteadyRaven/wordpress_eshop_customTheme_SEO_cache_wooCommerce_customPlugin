<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses cinematic_photographer_header_style()
 */
function cinematic_photographer_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'cinematic_photographer_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'  			 => true,
		'flex-height'  			 => true,
		'wp-head-callback'       => 'cinematic_photographer_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'cinematic_photographer_custom_header_setup' );

if ( ! function_exists( 'cinematic_photographer_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see cinematic_photographer_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'cinematic_photographer_header_style' );
function cinematic_photographer_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$cinematic_photographer_custom_css = "
        .headerbox,.header-img{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
			background-size: cover !important;
		}";
	   	wp_add_inline_style( 'cinematic-photographer-style', $cinematic_photographer_custom_css );
	endif;
}
endif;
