<?php
/**
 * The sidebar containing the main widget area
 * @package Cinematic Photographer
 * @subpackage cinematic_photographer
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'cinematic-photographer' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>