<?php
/**
 * Template for displaying search forms
 *
 * @package Prime Interior Designer
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'prime-interior-designer' ) ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search ...', 'placeholder', 'prime-interior-designer' ) ?>" value="<?php the_search_query() ?>" name="s" title="<?php echo esc_attr( 'Search for:', 'label', 'prime-interior-designer' ) ?>" />
    </label>
    <button type="submit" class="search-submit" value="<?php echo esc_attr( 'Search', 'submit button', 'prime-interior-designer' ) ?>"><i class="fas fa-search"></i></button>
</form>