<?php
/**
 * Theme functions and definitions
 *
 * @package Softinn
 */

/**
 * After setup theme hook
 */
function softinn_theme_setup(){
    /*
     * Make child theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'softinn' );	
}
add_action( 'after_setup_theme', 'softinn_theme_setup' );

/**
 * Load assets.
 */

function softinn_theme_css() {
	wp_enqueue_style( 'softinn-parent-theme-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'softinn_theme_css', 99);

require get_stylesheet_directory() . '/theme-functions/controls/class-customize.php';

/**
 * Import Options From Parent Theme
 *
 */
function softinn_parent_theme_options() {
	$softme_mods = get_option( 'theme_mods_softme' );
	if ( ! empty( $softme_mods ) ) {
		foreach ( $softme_mods as $softme_mod_k => $softme_mod_v ) {
			set_theme_mod( $softme_mod_k, $softme_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'softinn_parent_theme_options' );