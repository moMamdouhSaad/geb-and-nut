<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travelfic
 */

get_header();
$travelfic_prefix = 'travelfic_customizer_settings_';
$travelfic_sidebar = get_theme_mod($travelfic_prefix.'single_sidebar', 'right');

if( $travelfic_sidebar == 'none' ){  
	$travelfic_content_wrap_class = 'tft-no-sidebar';
} elseif($travelfic_sidebar == 'left'){ 
	$travelfic_content_wrap_class = 'tft-left-sidebar';
}elseif($travelfic_sidebar == 'right'){
	$travelfic_content_wrap_class = 'tft-right-sidebar';
}else{
	$travelfic_content_wrap_class = 'tft-right-sidebar';
}


?>

<div id="site-content" class="tft-site-content tft-single-post ">
	<div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?> <?php echo esc_attr( $travelfic_content_wrap_class ); ?>">		
		<?php get_template_part('template-parts/blog', 'details'); ?>
		<?php         
			if( $travelfic_sidebar != 'none'){
				get_sidebar();						
			} 
		?>
		</div>
	</div>

<?php

get_footer();
