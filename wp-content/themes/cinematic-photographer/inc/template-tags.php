<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function cinematic_photographer_categorized_blog() {
	$cinematic_photographer_category_count = get_transient( 'cinematic_photographer_categories' );

	if ( false === $cinematic_photographer_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$cinematic_photographer_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$cinematic_photographer_category_count = count( $cinematic_photographer_categories );

		set_transient( 'cinematic_photographer_categories', $cinematic_photographer_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $cinematic_photographer_category_count > 1;
}

if ( ! function_exists( 'cinematic_photographer_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Cinematic Photographer
 */
function cinematic_photographer_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in cinematic_photographer_categorized_blog.
 */
function cinematic_photographer_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'cinematic_photographer_categories' );
}
add_action( 'edit_category', 'cinematic_photographer_category_transient_flusher' );
add_action( 'save_post',     'cinematic_photographer_category_transient_flusher' );
