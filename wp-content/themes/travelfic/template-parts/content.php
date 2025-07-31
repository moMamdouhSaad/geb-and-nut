<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travelfic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php travelfic_post_thumbnail(); ?>
    <header class="entry-header">
        <?php
		if (is_singular()) :


			the_title('<h1 class="entry-title">', '</h1>');

		else :
			the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a>');
		endif;
		?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
		$travelfic_post_content = get_the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'travelfic'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);
		if (!is_single()) {
			$travelfic_trimmed_content = wp_trim_words($travelfic_post_content, 40, '<a href="' . get_permalink() . '"> ...[ read more ]</a>');
			echo '<p>' . wp_kses_post( $travelfic_trimmed_content ) . '</p>';
		} else {
			echo '<p>' . wp_kses_post( $travelfic_post_content ) . '</p>';
		}
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'travelfic'),
				'after' => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="tft-entry-footer-meta-outter tft-flex tft-f-sb">
            <div class="entry-footer-meta tft-flex tft-f-cg-20">
                <div class="tft-entry-footer-meta">
                    <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <i class="fas fa-calendar-alt"></i>
                        <?php travelfic_posted_on();
							travelfic_posted_by(); ?>
                    </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div>
                <div class="tft-entry-footer-meta">
                    <i class="far fa-comment"></i> <?php //travelfic_entry_footer(); ?>
					<a href="<?php comments_link(); ?>"><?php comments_number( 'Leave a Comment', '1 Comment', '% Comments' ); ?></a>
                </div>
            </div>
            <div class="tft-entry-footer-social">
				<div class="tft_social_share">
					<?php travelfic_social_share(get_the_ID()); ?>
				</div>
            </div>
        </div>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->