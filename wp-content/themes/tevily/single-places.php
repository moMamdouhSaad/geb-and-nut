<?php 
    $protocol = is_ssl() ? 'https' : 'http';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="<?php echo esc_attr($protocol) ?>://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php get_header(); ?>
            <section id="wp-main-content" class="clearfix main-page margin-top-50 margin-bottom-50">
                <div class="content-inner container">
                    <?php
                                while ( have_posts() ) :
                                    the_post();
                                    the_content();
                                endwhile;
                            ?>
                </div>    
            </section>
        <?php get_footer(); ?>
    </body>
</html>
 