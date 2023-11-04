<?php
/**
 * The front page template file
 *
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'cinematic_photographer_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'cinematic_photographer_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/capture' ); ?>
	<?php do_action( 'cinematic_photographer_after_capture' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'cinematic_photographer_after_home_content' ); ?>
</main>

<?php get_footer();
