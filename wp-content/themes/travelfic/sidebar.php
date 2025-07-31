<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelfic
 */

?>

<aside id="secondary" class="widget-area tft-sidebar tft-customizer-typography">
	<?php 
		if( is_active_sidebar( 'tft-sidebar' ) ){
			dynamic_sidebar( 'tft-sidebar' );
		}
	?>
	
</aside><!-- #secondary -->
