<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Prime Interior Designer
 */

if ( ! function_exists( 'prime_interior_designer_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function prime_interior_designer_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'prime_interior_designer_action_doctype', 'prime_interior_designer_doctype', 10 );


if ( ! function_exists( 'prime_interior_designer_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function prime_interior_designer_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif;
}
endif;
add_action( 'prime_interior_designer_action_head', 'prime_interior_designer_head', 10 );

if ( ! function_exists( 'prime_interior_designer_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function prime_interior_designer_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'prime-interior-designer' ); ?></a><?php
	}
endif;

add_action( 'prime_interior_designer_action_before', 'prime_interior_designer_page_start', 10 );

if ( ! function_exists( 'prime_interior_designer_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function prime_interior_designer_header_start() {
	
	?>
	<?php

	 $prime_interior_designer_sticky_header = prime_interior_designer_get_option('prime_interior_designer_sticky_header');
     ?>
		<header id="masthead" class="site-header" data-sticky="<?php echo $prime_interior_designer_sticky_header; ?>" role="banner"><?php
	}
endif;
add_action( 'prime_interior_designer_action_before_header', 'prime_interior_designer_header_start' );

if ( ! function_exists( 'prime_interior_designer_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function prime_interior_designer_header_end() {

		?>
		</header> <!-- header ends here --><?php
	}
endif;
add_action( 'prime_interior_designer_action_header', 'prime_interior_designer_header_end', 15 );

if ( ! function_exists( 'prime_interior_designer_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function prime_interior_designer_content_start() { 
	?>
	<div id="content-page" class="site-content">
	<?php 

	}
endif;

add_action( 'prime_interior_designer_action_before_content', 'prime_interior_designer_content_start', 10 );

if ( ! function_exists( 'prime_interior_designer_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function prime_interior_designer_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<?php
	}
endif;
add_action( 'prime_interior_designer_action_before_footer', 'prime_interior_designer_footer_start' );

if ( ! function_exists( 'prime_interior_designer_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function prime_interior_designer_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'prime_interior_designer_action_after_footer', 'prime_interior_designer_footer_end' );
