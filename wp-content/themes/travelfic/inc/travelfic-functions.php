<?php

/**
 * Update Elementor Options
 */
function travelfic_load_elementor_options() {  
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );
}
add_action( 'elementor/loaded', 'travelfic_load_elementor_options' );

/**
 * Disable Getting Start - Elementor 
 */
function travelfic_elementor_loaded_function() {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
};
add_action( 'admin_init', 'travelfic_elementor_loaded_function', 1 );

/**
 * Posts Paginations
 */
if ( !function_exists('travelfic_posts_pagination') ) {
    function travelfic_posts_pagination(){
        the_posts_pagination( array(
            'mid_size'  => 1,
            'prev_text'          => '<i class="fas fa-arrow-left"></i>',
            'next_text'          => '<i class="fas fa-arrow-right"></i>',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'travelfic' ) . ' </span>',
        ) );
    } 
}

/**
 * Social Share
 */
if ( !function_exists('travelfic_social_share') ) {
function travelfic_social_share($post){ ?>    
    <ul class="share-buttons tft-flex">
        <li>
        <?php 
        $travelfic_facebook_url = "https://www.facebook.com/sharer/sharer.php?u=". get_the_permalink(); ?>
        <a target="_blank" class="share-button share-facebook" href="<?php echo esc_url($travelfic_facebook_url); ?>" title="<?php _e( 'Share on Facebook', 'travelfic' );?>"><i class="fab fa-facebook-f"></i></a>

        </li>
        <li>
            <?php 
            $travelfic_twitter_url = "https://twitter.com/intent/tweet?url=".get_the_permalink()."&text=".get_the_title(); ?>
            <a class="share-twitter" href="<?php echo esc_url($travelfic_twitter_url); ?>" title="<?php _e( 'Tweet this', 'travelfic' );?>" target="_blank">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li>
            <?php 
            $travelfic_pinterest_url = "https://www.pinterest.com/pin/create/%20button?url=".get_the_permalink()."&description=".get_the_title();
            ?>
            <a class="share-pinterest" href="<?php echo esc_url($travelfic_pinterest_url); ?>" target="_blank" title="<?php _e( 'Pin it', 'travelfic' );?>">
                <i class="fab fa-pinterest-p"></i>
            </a>
        </li>
        <li>
            <?php 
            $travelfic_linkedin_url = 'http://www.linkedin.com/shareArticle?mini=true&url='.get_the_permalink().'&title'.get_the_title();
            ?>
            <a class="share-linkedin" href="<?php echo esc_url($travelfic_linkedin_url); ?>" title="<?php _e( 'Share on Linkedin', 'travelfic' );?>" target="_blank">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </li>
    </ul>
<?php 
}
}

if ( ! function_exists( 'travelfic_archive_page_banner' ) ) {
    function travelfic_archive_page_banner(){
        $travelfic_prefix = 'travelfic_customizer_settings_';
        $travelfic_ImageUrl = get_theme_mod($travelfic_prefix.'tf_archive_header_img' , get_template_directory_uri() . '/assets/img/page_header.png');
        
        $travelfic_banner = get_theme_mod($travelfic_prefix . 'archive_banner', 'banner');
        $travelfic_disable_banner = get_post_meta( get_the_ID(), 'tft-pmb-banner', true );
        
        if( $travelfic_disable_banner != 1 && $travelfic_banner == 'banner' ){
            ?>
                <div class="tf-page-header-inner tft-page-banner blog" style="background-image:url('<?php echo esc_url( $travelfic_ImageUrl ); ?>');">
                    <div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
                        <?php  
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </div>
                </div>
            <?php
        }elseif( $travelfic_banner == 'title'){
            ?>
                <div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
                    <div class="tft-blog-header">
                        <header class="entry-header">
                            <?php  
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="archive-description">', '</div>' );
                            ?>
                        </header><!-- .entry-header -->
                    </div>
                </div>
            <?php
        }
    }
}

if ( ! function_exists( 'travelfic_blog_page_banner' ) ) {
    function travelfic_blog_page_banner(){
        $travelfic_prefix = 'travelfic_customizer_settings_';
        $travelfic_ImageUrl = get_theme_mod($travelfic_prefix.'tf_archive_header_img' , get_template_directory_uri() . '/assets/img/page_header.png');
        
        $travelfic_banner = get_theme_mod($travelfic_prefix . 'blog_banner', 'banner');
        $travelfic_disable_banner = get_post_meta( get_the_ID(), 'tft-pmb-banner', true );
        
        if( $travelfic_disable_banner != 1 && $travelfic_banner == 'banner' ){
            ?>
                <div class="tf-page-header-inner tft-page-banner blog" style="background-image:url('<?php echo esc_url( $travelfic_ImageUrl ); ?>');">
                    <h1 class="entry-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                </div>
            <?php
        }elseif( $travelfic_banner == 'title' || $travelfic_banner != 'empty' ){
            ?>
                <div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
                    <div class="tft-blog-header">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                        </header><!-- .entry-header -->
                    </div>
                </div>
            <?php
        }
    }
}