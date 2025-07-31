<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelfic
 */

get_header();

$travelfic_prefix = 'travelfic_customizer_settings_';

$travelfic_sidebar = get_theme_mod($travelfic_prefix.'blog_sidebar', 'none');
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



?>  

<div id="site-content" class="tft-site-content tft-single-page tft-blog-archive tft-customizer-typography">
    <div class="tf-page-header">
        <?php travelfic_blog_page_banner(); ?>
    </div>

    <div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?> <?php echo esc_attr( $travelfic_content_wrap_class ); ?>">
		<?php get_template_part('template-parts/blog', 'list'); ?>
    <?php 
      if( $travelfic_disable_sidebar != 1 ){
        if( $travelfic_sidebar != 'none'){
          get_sidebar();						
        }
      }
    ?> 

    </div>
</div>

<?php

get_footer();