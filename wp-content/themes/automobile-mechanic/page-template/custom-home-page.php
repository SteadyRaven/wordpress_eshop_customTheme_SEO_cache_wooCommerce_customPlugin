<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'automobile_mechanic_above_slider' ); ?>

	<?php if( get_theme_mod('automobile_mechanic_slider_hide_show') != ''){ ?>

	<div id="ht-home-slider-section">
		<!-- <div class="slider-img"></div> -->
		<div class="slider-overlay"></div>
		<div class="slider-gride"></div> 
		<div id="big" class="owl-carousel owl-theme">
			<?php $automobile_mechanic_slider_pages = array();
				for ( $count = 1; $count <= 5; $count++ ) {
					$mod = intval( get_theme_mod( 'automobile_mechanic_slider'. $count ));
					if ( 'page-none-selected' != $mod ) {
						$automobile_mechanic_slider_pages[] = $mod;
					}
				}
				if( !empty($automobile_mechanic_slider_pages) ) :
					$args = array(
						'post_type' => 'page',
						'post__in' => $automobile_mechanic_slider_pages,
						'orderby' => 'post__in'
					);
					$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
					$i = 1;
			?>    

			<?php  while ( $query->have_posts() ) : $query->the_post(); ?>

					<div class="item row">
						<div class="sliderimg ">
							<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
						</div> 
						<!-- <div class="col-md-8"> -->
						<div class="ht-slide-caption">
						<div class="ht-slide-cap-title"><?php the_title(); ?></div>
						<div class="sliderbtn">	
							<div class="ht-slide-cap-descmore">	
								<a href="<?php the_permalink(); ?>" class="read-btn">
									<div class="btn-brd"></div>
									<span><?php echo esc_html('CONTACT US','automobile-mechanic'); ?></span><span class="screen-reader-text"><?php echo esc_html('CONTACT US','automobile-mechanic'); ?>
									</span>
								</a>
							</div>
						</div>
						</div>
						<!-- </div> -->
					</div>


				<?php $i++; endwhile; wp_reset_postdata();?>
			<?php else : ?>
				<div class="no-postfound"></div>
			<?php endif; endif;?>

		</div>
		<div class="thumb-area">
			<div class="container pd-0">
				<div class="row">
					<div class="col-md-5 col-sm-1">
					</div>
					<div class="col-md-7 col-sm-11 col-xs-12">
						<div class="thumb-slide">
							<div class="thumb-content">
								<div id="thumbs" class="owl-carousel owl-theme">
									<?php
										 $args = array('post_type' => 'slider');
									    while ($query->have_posts()) : $query->the_post();
									      $slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
									      $id = get_the_ID();
						 			?>
									  <div class="item" data-item="0">
									  	<div class="thumb-img">
									  		<?php
							                    if (has_post_thumbnail()) {
							                      $image_url = $slider_image[0];
							                    } else {
							                      $image_url = get_template_directory_uri() . '/images/default.png';
							                    }
							                ?>
							                <img  src="<?php echo esc_url($image_url); ?>" alt="<?php the_title(); ?>" />
									  	</div>
									  </div>
						 			<?php
									    endwhile;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php }?>

	<?php do_action('automobile_mechanic_below_slider'); ?>

	<section id="aboutus-section" class="py-5">
		<div class="container"> 
			<div class="row "> 
				<div class="col-lg-7 col-md-12 col-sm-12">
					<h1><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutusheading')); ?></h1>
					<h2><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutustitle')); ?></h2>
					<p><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutusdescription')); ?></p>

					<div class="row "> 
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="row tmbx"> 
								<div class="col-lg-3 col-md-3 col-sm-12">
									<i class="far fa-clock"></i>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-12">
									<h2><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutus_box1_title')); ?></h2>
									<p><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutus_box1_description')); ?></p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="row tmbx">
								<div class="col-lg-3 col-md-3 col-sm-12">
									<i class="far fa-clock"></i>
								</div>
								<div class="col-lg-9 col-md-9 col-sm-12">
									<h2><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutus_box2_title')); ?></h2>
									<p><?php echo esc_html(get_theme_mod('automobile_mechanic_aboutus_box2_description')); ?></p>
								</div>
							</div>
						</div>
					</div>
					<a href="<?php echo esc_html(get_theme_mod('automobile_mechanic_aboutus_btnlink')); ?>" class="read-btn"><?php echo esc_html('READ MORE','automobile-mechanic'); ?></a>
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12">
					<div class="aboutus-image">
						<div class="abtimg-brd"></div>
						<?php 
							$automobile_mechanic_aboutus_rightimage = get_theme_mod('automobile_mechanic_aboutus_rightimage');

							if(!empty($automobile_mechanic_aboutus_rightimage)){
								echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($automobile_mechanic_aboutus_rightimage).'" class="img-responsive secondry-bg-img" />';
							}else{
								echo '<img alt="automobile_mechanic_aboutus_rightimage" src="'.get_template_directory_uri().'/assets/images/about.jpg" class="img-responsive" />';
							}
						?>
					</div>
				</div>
				
			</div>
		</div>
	</section>
	
	<?php do_action('automobile_mechanic_below_aboutus'); ?>

	<?php if( get_theme_mod('automobile_mechanic_features_category_setting') != '' ){?>
		<section id="feature-section" class="py-5">
			<div class="container"> 
				<div class="head">
					<h1><?php echo esc_html(get_theme_mod('automobile_mechanic_featureheading')); ?></h1>
					<p><?php echo esc_html(get_theme_mod('automobile_mechanic_featuresubheading')); ?></p>
				</div>

	        	<div class="row "> 
					<div class="col-lg-5 col-md-12 col-sm-12">
						<div class="feature-image">
							<?php 
								$automobile_mechanic_feature_leftimage = get_theme_mod('automobile_mechanic_feature_leftimage');

								if(!empty($automobile_mechanic_feature_leftimage)){
									echo '<img alt="'. esc_html(get_the_title()) .'" src="'.esc_url($automobile_mechanic_feature_leftimage).'" class="img-responsive secondry-bg-img" />';
								}else{
									echo '<img alt="automobile_mechanic_feature_leftimage" src="'.get_template_directory_uri().'/assets/images/fea.png" class="img-responsive" />';
								}
							?>
						</div>
					</div>
					<div class="col-lg-7 col-md-12 col-sm-12">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12 f-box-l">
								<?php $automobile_mechanic_catData1 =  get_theme_mod('automobile_mechanic_features_category_setting');
								if($automobile_mechanic_catData1){ 
									$args = array(
										'post_type' => 'post',
										'category_name' => $automobile_mechanic_catData1,
										'posts_per_page' => get_theme_mod('automobile_mechanic_features_number',3)
									);
									$i=1; ?>
									<?php $query = new WP_Query( $args );
									if ( $query->have_posts() ) :
										while( $query->have_posts() ) : $query->the_post(); ?>
										<div class="feature-box row">
											<div class="col-lg-9 col-md-9 col-sm-12">	
												<div class="feature-content">
													<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
													<p class="mb-0">
														<?php $automobile_mechanic_excerpt = get_the_excerpt(); echo esc_html( automobile_mechanic_string_limit_words( $automobile_mechanic_excerpt,18 ) ); ?> <?php echo esc_html('...', 'automobile-mechanic'); ?>
														<!-- <a href="</?php the_permalink(); ?>"></?php echo esc_html('Read More', 'automobile-mechanic'); ?><span class="screen-reader-text"></?php echo esc_html('Read More', 'automobile-mechanic'); ?></span></a> -->
													</p>
												</div>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-12 pd-0">
												<div class="feature-icon">
													<i class="<?php echo esc_attr(get_theme_mod('automobile_mechanic_feature_icon' . $i, 'far fa-user')); ?>"></i>
												</div>
											</div>
										</div>

										<?php $i++; endwhile; 
										wp_reset_postdata(); ?>
									<?php else : ?>
								<div class="no-postfound"></div>
									<?php endif; ?>
								<?php }?>
							</div>
							
							<div class="col-lg-6 col-md-12 col-sm-12 f-box-r">
							<?php $automobile_mechanic_catData1right =  get_theme_mod('automobile_mechanic_features_category_settingright');
								if($automobile_mechanic_catData1right){ 
									$args = array(
										'post_type' => 'post',
										'category_name' => $automobile_mechanic_catData1right,
										'posts_per_page' => get_theme_mod('automobile_mechanic_features_numberright',3)
									);
									$i=1; ?>
									<?php $query = new WP_Query( $args );
									if ( $query->have_posts() ) :
										while( $query->have_posts() ) : $query->the_post(); ?>

										<div class="feature-box row">
											<div class="col-lg-3 col-md-3 col-sm-12 pd-0">
												<div class="feature-icon">
													<i class="<?php echo esc_attr(get_theme_mod('automobile_mechanic_feature_iconright' . $i, 'far fa-user')); ?>"></i>
												</div>
											</div>
											<div class="col-lg-9 col-md-9 col-sm-12">
												<div class="feature-content">
													<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
													<p class="mb-0">
														<?php $automobile_mechanic_excerpt = get_the_excerpt(); echo esc_html( automobile_mechanic_string_limit_words( $automobile_mechanic_excerpt,18 ) ); ?> <?php echo esc_html('...', 'automobile-mechanic'); ?>
														<!-- <a href="</?php the_permalink(); ?>"></?php echo esc_html('Read More', 'automobile-mechanic'); ?><span class="screen-reader-text"></?php echo esc_html('Read More', 'automobile-mechanic'); ?></span></a> -->
													</p>
												</div>
											</div>
										</div>
							
									<?php $i++; endwhile; 
									wp_reset_postdata(); ?>
								<?php else : ?>
								<div class="no-postfound"></div>
								<?php endif; ?>
							<?php }?>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>
	<?php }?>

	<?php do_action('automobile_mechanic_below_features_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>



<script>
	$(document).ready(function() {
	  var bigimage = $("#big");
	  var thumbs = $("#thumbs");
	  //var totalslides = 10;
	  var syncedSecondary = true;

	  bigimage
	    .owlCarousel({
	    items: 1,
	    slideSpeed: 4000,
	    nav: true,
	    autoplay: true,
	    dots: false,
	    loop: true,
	    responsiveRefreshRate: 200,
	    animateOut: 'fadeOutRight',
    	animateIn: 'fadeInLeft',
	    navText: [
	      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
	      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
	    ]
	  })
	    .on("changed.owl.carousel", syncPosition);

	  thumbs
	    .on("initialized.owl.carousel", function() {
	    thumbs
	      .find(".owl-item")
	      .eq(0)
	      .addClass("current");
	  })
	    .owlCarousel({
	    items: 5,
	    dots: false,
	    nav: true,
	    navText: [
	      '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
	      '<i class="fa fa-angle-double-right" aria-hidden="true"></i>'
	    ],
	    smartSpeed: 200,
	    slideSpeed: 500,
	    slideBy: 4,
	    responsiveRefreshRate: 100
	  })
	    .on("changed.owl.carousel", syncPosition2);

	  function syncPosition(el) {

	    //to disable loop, comment this block
	    var count = el.item.count - 1;
	    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

	    if (current < 0) {
	      current = count;
	    }
	    if (current > count) {
	      current = 0;
	    }
	    //to this
	    thumbs
	      .find(".owl-item")
	      .removeClass("current")
	      .eq(current)
	      .addClass("current");
	    var onscreen = thumbs.find(".owl-item.active").length - 1;
	    var start = thumbs
	    .find(".owl-item.active")
	    .first()
	    .index();
	    var end = thumbs
	    .find(".owl-item.active")
	    .last()
	    .index();

	    if (current > end) {
	      thumbs.data("owl.carousel").to(current, 100, true);
	    }
	    if (current < start) {
	      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
	    }
	  }

	  function syncPosition2(el) {
	    if (syncedSecondary) {
	      var number = el.item.index;
	      bigimage.data("owl.carousel").to(number, 100, true);
	    }
	  }

	  thumbs.on("click", ".owl-item", function(e) {
	    e.preventDefault();
	    var number = $(this).index();
	    bigimage.data("owl.carousel").to(number, 300, true);
	  });
	});
</script>