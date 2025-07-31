<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelfic
 */

get_header();

$travelfic_prefix = 'travelfic_customizer_settings_';
$travelfic_sidebar = get_theme_mod($travelfic_prefix.'page_sidebar', 'right');
$travelfic_disable_sidebar = get_post_meta( get_the_ID(), 'tft-pmb-disable-sidebar', true );

if($travelfic_disable_sidebar == 1){
	$travelfic_content_wrap_class = 'tft-no-sidebar';
}else{
	if( $travelfic_sidebar == 'none' ){  
		$travelfic_content_wrap_class = 'tft-no-sidebar';
	} elseif($travelfic_sidebar == 'left'){ 
		$travelfic_content_wrap_class = 'tft-left-sidebar';
	}elseif($travelfic_sidebar == 'right'){
		$travelfic_content_wrap_class = 'tft-right-sidebar';
	}else{
		$travelfic_content_wrap_class = 'tft-right-sidebar';
	}
}

$travelfic_banner = get_theme_mod($travelfic_prefix . 'page_banner', 'banner');
$travelfic_disable_banner = get_post_meta( get_the_ID(), 'tft-pmb-banner', true );

?>
	<div id="site-content" class="tft-site-content tft-single-page">
		<div class="tf-page-header tft-customizer-typography">
			<?php 
				if( $travelfic_disable_banner != 1 && $travelfic_banner == 'banner' ){
					get_template_part( 'template-parts/travelfic', 'banner' );
				}
			?>
		</div>
		<div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?> <?php echo esc_attr( $travelfic_content_wrap_class ); ?>">
				
			<main id="tf-site-content" class="primary site-main">

				<?php
				
				while ( have_posts() ) :

					the_post();

					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
			
			<?php 
				if( $travelfic_disable_sidebar != 1){
					if( $travelfic_sidebar == 'left' || $travelfic_sidebar == 'right'){
						get_sidebar();						
					}
				}
			?> 
		</div>
	</div>
	

<?php

get_footer();
