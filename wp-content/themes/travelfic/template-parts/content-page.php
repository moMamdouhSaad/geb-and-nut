<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelfic
 */

 $travelfic_prefix = 'travelfic_customizer_settings_';
 $travelfic_banner = get_theme_mod($travelfic_prefix . 'page_banner', 'banner');
 $travelfic_disable_banner = get_post_meta( get_the_ID(), 'tft-pmb-banner', true );
 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( $travelfic_disable_banner == 1 || $travelfic_banner == 'title' ):?>
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

    <?php travelfic_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'travelfic'),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <?php if (get_edit_post_link()) : ?>
    <footer class="entry-footer">
        <?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__('Edit <span class="screen-reader-text">%s</span>', 'travelfic'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->