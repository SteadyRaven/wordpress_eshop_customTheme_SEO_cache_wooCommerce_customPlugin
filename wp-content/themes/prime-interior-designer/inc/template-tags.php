<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Prime Interior Designer
 */

if ( ! function_exists( 'prime_interior_designer_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function prime_interior_designer_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	if( is_single() ){
		$author_setting  = prime_interior_designer_get_option( 'prime_interior_designer_post_author_setting' );
		if ( $author_setting ){
			$byline = sprintf(
		        esc_html_x( 'By %s', 'post author', 'prime-interior-designer' ),
		        '<span class="author vcard"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" class="url" itemprop="url">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a></span>'
		    );
		    echo '<span class="byline">' . $byline . '</span>';
	    }
	}
	$date_setting  = prime_interior_designer_get_option( 'prime_interior_designer_post_date_setting' );
		if ( $date_setting ){
		echo '<span class="date">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}

}
endif;

if ( ! function_exists( 'prime_interior_designer_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function prime_interior_designer_entry_meta() {
	$cat_setting  = prime_interior_designer_get_option( 'prime_interior_designer_post_categories_setting' );
		if ( $cat_setting ){
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'prime-interior-designer' ) );
			if ( $categories_list && prime_interior_designer_categorized_blog() ) {
				printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}

	if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		$comment_setting  = prime_interior_designer_get_option( 'prime_interior_designer_post_comment_setting' );
		if ( $comment_setting ){
			echo '<span class="comments-link">';
			/* translators: %s: post title */
			comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'prime-interior-designer' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
			echo '</span>';
		}
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function prime_interior_designer_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'prime_interior_designer_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'prime_interior_designer_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so prime_interior_designer_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so prime_interior_designer_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in prime_interior_designer_categorized_blog.
 */
function prime_interior_designer_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'prime_interior_designer_categories' );
}
add_action( 'edit_category', 'prime_interior_designer_category_transient_flusher' );
add_action( 'save_post',     'prime_interior_designer_category_transient_flusher' );