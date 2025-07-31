<?php
/**
 * Page Banner 
 */
if (!empty( get_post_meta( get_the_ID(), 'tft-pmb-background-img', true ) ) ) {
    $travelfic_bannerImageUrl = get_post_meta( get_the_ID(), 'tft-pmb-background-img', true );
} else {
    $travelfic_bannerImageUrl = get_template_directory_uri() . '/assets/img/page_header.png';
}

// Page Subtitle
$travelfic_page_sub_title =  get_post_meta( get_the_ID(), 'tft-pmb-subtitle', true ) ? get_post_meta( get_the_ID(), 'tft-pmb-subtitle', true ) : '';  


?>
<?php if ( class_exists( 'WooCommerce' ) &&  ( is_checkout() || is_cart() ) ) : ?>    
    <div class="tf-page-header-inner tft-page-banner woo-page-header woocommerce_check">
        <div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
            <div class="tft-page-banner">
                <?php 
                    the_title('<h1 class="entry-title">', '</h1>'); 
                ?>
                <?php 
                if( !empty($travelfic_page_sub_title) ){
                ?>
                <p><?php echo esc_html( $travelfic_page_sub_title ); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="tf-page-header-inner tft-page-banner" style="background-image:url('<?php echo esc_url( $travelfic_bannerImageUrl ); ?>');">
        <div class="<?php echo esc_attr( apply_filters( 'travelfic_page_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
            <div class="tft-page-banner">
                <?php 
                    the_title('<h1 class="entry-title">', '</h1>');
                ?>
                <?php 
                if( !empty($travelfic_page_sub_title) ){
                ?>
                <p><?php echo esc_html( $travelfic_page_sub_title ); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>



