<?php

$cinematic_photographer_tp_theme_css = "";

//body layout//

$cinematic_photographer_theme_lay = get_theme_mod( 'cinematic_photographer_tp_body_layout_settings','Full');
if($cinematic_photographer_theme_lay == 'Container'){
$cinematic_photographer_tp_theme_css .='body{';
	$cinematic_photographer_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$cinematic_photographer_tp_theme_css .='}';
$cinematic_photographer_tp_theme_css .='.page-template-front-page .menubar{';
	$cinematic_photographer_tp_theme_css .='position: static;';
$cinematic_photographer_tp_theme_css .='}';
$cinematic_photographer_tp_theme_css .='.scrolled{';
	$cinematic_photographer_tp_theme_css .='width: auto; left:0; right:0;';
$cinematic_photographer_tp_theme_css .='}';
}else if($cinematic_photographer_theme_lay == 'Container Fluid'){
$cinematic_photographer_tp_theme_css .='body{';
	$cinematic_photographer_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$cinematic_photographer_tp_theme_css .='}';
$cinematic_photographer_tp_theme_css .='.page-template-front-page .menubar{';
	$cinematic_photographer_tp_theme_css .='width: 99%';
$cinematic_photographer_tp_theme_css .='}';
$cinematic_photographer_tp_theme_css .='.scrolled{';
	$cinematic_photographer_tp_theme_css .='width: auto; left:0; right:0;';
$cinematic_photographer_tp_theme_css .='}';
}else if($cinematic_photographer_theme_lay == 'Full'){
$cinematic_photographer_tp_theme_css .='body{';
	$cinematic_photographer_tp_theme_css .='max-width: 100%;';
$cinematic_photographer_tp_theme_css .='}';
}

//scroll-top-alignmemt
$cinematic_photographer_scroll_position = get_theme_mod( 'cinematic_photographer_scroll_top_position','Right');
if($cinematic_photographer_scroll_position == 'Right'){
$cinematic_photographer_tp_theme_css .='#return-to-top{';
    $cinematic_photographer_tp_theme_css .='right: 20px;';
$cinematic_photographer_tp_theme_css .='}';
}else if($cinematic_photographer_scroll_position == 'Left'){
$cinematic_photographer_tp_theme_css .='#return-to-top{';
    $cinematic_photographer_tp_theme_css .='left: 20px;';
$cinematic_photographer_tp_theme_css .='}';
}else if($cinematic_photographer_scroll_position == 'Center'){
$cinematic_photographer_tp_theme_css .='#return-to-top{';
    $cinematic_photographer_tp_theme_css .='right: 50%;left: 50%;';
$cinematic_photographer_tp_theme_css .='}';
}


//Social icon Font size
$cinematic_photographer_social_icon_fontsize = get_theme_mod('cinematic_photographer_social_icon_fontsize');
$cinematic_photographer_tp_theme_css .='.media-links a i{';
	$cinematic_photographer_tp_theme_css .='font-size: '.esc_attr($cinematic_photographer_social_icon_fontsize).'px;';
$cinematic_photographer_tp_theme_css .='}';

// site title font size option
$cinematic_photographer_site_title_font_size = get_theme_mod('cinematic_photographer_site_title_font_size', 20);{
$cinematic_photographer_tp_theme_css .='.logo h1 a, .logo p a{';
	$cinematic_photographer_tp_theme_css .='font-size: '.esc_attr($cinematic_photographer_site_title_font_size).'px;';
$cinematic_photographer_tp_theme_css .='}';
}

// site tagline font size option
$cinematic_photographer_site_tagline_font_size = get_theme_mod('cinematic_photographer_site_tagline_font_size', 15);{
$cinematic_photographer_tp_theme_css .='.logo p{';
	$cinematic_photographer_tp_theme_css .='font-size: '.esc_attr($cinematic_photographer_site_tagline_font_size).'px;';
$cinematic_photographer_tp_theme_css .='}';
}

// return to header mobile width
$cinematic_photographer_return_to_header_mob = get_theme_mod( 'cinematic_photographer_return_to_header_mob',false);
if($cinematic_photographer_return_to_header_mob == true && get_theme_mod( 'cinematic_photographer_return_to_header',true) != true){
$cinematic_photographer_tp_theme_css .='.return-to-header{';
	$cinematic_photographer_tp_theme_css .='display:none;';
$cinematic_photographer_tp_theme_css .='} ';
}
if($cinematic_photographer_return_to_header_mob == true){
$cinematic_photographer_tp_theme_css .='@media screen and (max-width:575px) {';
$cinematic_photographer_tp_theme_css .='.return-to-header{';
	$cinematic_photographer_tp_theme_css .='display:block;';
$cinematic_photographer_tp_theme_css .='} }';
}else if($cinematic_photographer_return_to_header_mob == false){
$cinematic_photographer_tp_theme_css .='@media screen and (max-width:575px){';
$cinematic_photographer_tp_theme_css .='.return-to-header{';
	$cinematic_photographer_tp_theme_css .='display:none;';
$cinematic_photographer_tp_theme_css .='} }';
}

// slider button mobile width
$cinematic_photographer_slider_buttom_mob = get_theme_mod( 'cinematic_photographer_slider_buttom_mob',true);
if($cinematic_photographer_slider_buttom_mob == true && get_theme_mod( 'cinematic_photographer_slider_button',true) != true){
$cinematic_photographer_tp_theme_css .='#slider .more-btn{';
	$cinematic_photographer_tp_theme_css .='display:none;';
$cinematic_photographer_tp_theme_css .='} ';
}
if($cinematic_photographer_slider_buttom_mob == true){
$cinematic_photographer_tp_theme_css .='@media screen and (max-width:575px) {';
$cinematic_photographer_tp_theme_css .='#slider .more-btn{';
	$cinematic_photographer_tp_theme_css .='display:block;';
$cinematic_photographer_tp_theme_css .='} }';
}else if($cinematic_photographer_slider_buttom_mob == false){
$cinematic_photographer_tp_theme_css .='@media screen and (max-width:575px){';
$cinematic_photographer_tp_theme_css .='#slider .more-btn{';
	$cinematic_photographer_tp_theme_css .='display:none;';
$cinematic_photographer_tp_theme_css .='} }';
}

//footer bg image
$cinematic_photographer_footer_widget_image = get_theme_mod('cinematic_photographer_footer_widget_image');
if($cinematic_photographer_footer_widget_image != false){
$cinematic_photographer_tp_theme_css .='#footer{';
	$cinematic_photographer_tp_theme_css .='background: url('.esc_attr($cinematic_photographer_footer_widget_image).');';
$cinematic_photographer_tp_theme_css .='}';
}

//related products
$cinematic_photographer_related_product = get_theme_mod('cinematic_photographer_related_product',true);
if($cinematic_photographer_related_product == false){
	$cinematic_photographer_tp_theme_css .='.related.products{';
		$cinematic_photographer_tp_theme_css .='display: none;';
	$cinematic_photographer_tp_theme_css .='}';
}

//menu font size
$cinematic_photographer_menu_font_size = get_theme_mod('cinematic_photographer_menu_font_size', 15);{
$cinematic_photographer_tp_theme_css .='.main-navigation a{';
	$cinematic_photographer_tp_theme_css .='font-size: '.esc_attr($cinematic_photographer_menu_font_size).'px;';
$cinematic_photographer_tp_theme_css .='}';
}

// menu text transform
$cinematic_photographer_menu_text_tranform = get_theme_mod( 'cinematic_photographer_menu_text_tranform','Capitalize');
if($cinematic_photographer_menu_text_tranform == 'Uppercase'){
$cinematic_photographer_tp_theme_css .='.main-navigation a {';
	$cinematic_photographer_tp_theme_css .='text-transform: uppercase;';
$cinematic_photographer_tp_theme_css .='}';
}else if($cinematic_photographer_menu_text_tranform == 'Lowercase'){
$cinematic_photographer_tp_theme_css .='.main-navigation a {';
	$cinematic_photographer_tp_theme_css .='text-transform: lowercase;';
$cinematic_photographer_tp_theme_css .='}';
}
else if($cinematic_photographer_menu_text_tranform == 'Capitalize'){
$cinematic_photographer_tp_theme_css .='.main-navigation a {';
	$cinematic_photographer_tp_theme_css .='text-transform: capitalize;';
$cinematic_photographer_tp_theme_css .='}';
}