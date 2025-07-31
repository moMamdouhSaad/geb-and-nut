<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package travelfic
 */

get_header();
?>
	<div id="site-content" class="tft-site-content tft-single-page tft-404">	
		<div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
			<main id="tf-site-content" class="primary site-main">
				<?php get_template_part( 'template-parts/travelfic', '404' ); ?>
			</main> 
		</div>
	</div>

<?php
get_footer();
