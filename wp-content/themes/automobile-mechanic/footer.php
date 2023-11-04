<?php
/**
 * The template for displaying the footer
 * @subpackage Automobile Mechanic
 * @since 1.0
 * @version 0.1
 */

?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-overlay"></div>
		<div class="container">
			<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
		</div>
		<div class="copyright"> 
			<div class="container">
				<div class="row">
					<div class="col-md-8"><?php get_template_part( 'template-parts/footer/site', 'info' ); ?></div>
					<div class="col-md-4">
						<?php if(get_theme_mod('automobile_mechanic_facebook_url') != '' || get_theme_mod('automobile_mechanic_twitter_url') != '' || get_theme_mod('automobile_mechanic_instagram_url') != '' || get_theme_mod('automobile_mechanic_pinterest_url') != ''){ ?>
							<div class="social-icons">
								<?php if(get_theme_mod('automobile_mechanic_facebook_url') != ''){?>
									<a href="<?php echo esc_url(get_theme_mod('automobile_mechanic_facebook_url')) ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'automobile-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('automobile_mechanic_twitter_url') != ''){?>
									<a href="<?php echo esc_url(get_theme_mod('automobile_mechanic_twitter_url')) ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'automobile-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('automobile_mechanic_instagram_url') != ''){?>
									<a href="<?php echo esc_url(get_theme_mod('automobile_mechanic_instagram_url')) ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'automobile-mechanic'); ?></span></a>
								<?php }?>
								<?php if(get_theme_mod('automobile_mechanic_pinterest_url') != ''){?>
									<a href="<?php echo esc_url(get_theme_mod('automobile_mechanic_pinterest_url')) ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'automobile-mechanic'); ?></span></a>
								<?php }?>
							</div>
							<?php }?>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<?php if (get_theme_mod('automobile_mechanic_show_back_totop',true) != ''){ ?>
		<button role="tab" class="back-to-top"><span class="back-to-top-text"><?php echo esc_html('Top', 'automobile-mechanic'); ?></span></button>
	<?php }?>

<?php wp_footer(); ?>
</body>
</html>