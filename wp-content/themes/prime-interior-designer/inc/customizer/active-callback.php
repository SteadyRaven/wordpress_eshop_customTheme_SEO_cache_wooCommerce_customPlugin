<?php
/**
 * Active callback functions.
 *
 * @package Prime Interior Designer
 */

function prime_interior_designer_featured_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function prime_interior_designer_featured_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( prime_interior_designer_featured_slider_active( $control ) && ( 'featured_slider_page' == $content_type ) );
}

function prime_interior_designer_featured_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( prime_interior_designer_featured_slider_active( $control ) && ( 'featured_slider_post' == $content_type ) );
}

function prime_interior_designer_featured_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

/**
 * Active Callback for top bar section
 */
function prime_interior_designer_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_discount_text]' && $show_contact_info ) return true;

    return false;
}

/**
 * Active Callback for Header button section
 */
function prime_interior_designer_button_info_ac( $control ) {

    $show_button_info = $control->manager->get_setting( 'theme_options[show_header_button_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_button_txt]' && $show_button_info ) return true;
    if ( $control_id == 'theme_options[header_button_url]' && $show_button_info ) return true;

    return false;
}
