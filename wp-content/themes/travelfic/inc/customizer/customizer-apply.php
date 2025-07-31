<?php
// travelfic Customizer Options
function travelfic_customizer_style()
{
$prefix = 'travelfic_customizer_settings_';
$stiky_bg_color = get_theme_mod($prefix.'stiky_header_bg_color', '#fff');
$stiky_bg_blur = get_theme_mod($prefix.'stiky_header_blur', '24');
$stiky_menu_color = get_theme_mod($prefix.'stiky_header_menu_text_color', '#000');
$primary_color = get_theme_mod($prefix.'primary_color', '#F15D30');

$footer_bg = get_theme_mod($prefix.'footer_bg_color', '#fff');
$footer_text_color = get_theme_mod($prefix.'footer_text_color', '#222');
// Fonts Family
$travelfic_heading_font_family = !empty(get_theme_mod($prefix.'heading_font_family', '')) ? str_replace('_', ' ', get_theme_mod($prefix.'heading_font_family', '')) : '';
$travelfic_body_font_family = !empty(get_theme_mod($prefix.'body_font_family', '')) ? str_replace('_', ' ', get_theme_mod($prefix.'body_font_family', '')) : '';
?>

<style>

    /* Default Background Color  */
    .tft-theme-bg,
    .tft-footer-social-link ul li a,
    .single-form-inner .tft-form-title,
    .tf-sidebar .wp-block-search__button,
    .tft-pagination .page-numbers.current, 
    .tft-fields-subscriptions .wpcf7-submit,
    .tft-sidebar .wp-block-search__button,
    .wpcf7-form .wpcf7-submit {
        background: <?php echo !empty($primary_color) ? esc_attr( $primary_color ): '#F15D30'; ?> !important;
    }

    /* Default Font Color  */
    .tft-footer-contact ul li i,
    .tft-search-box .tft-tour-serach-fields-wrap .tf_input-inner *,
    .tft-tour-serach-fields-wrap .tf_input-inner,
    .tft-hero-slider-selector .slider__counter,
    .tft-meta-info i,
    .tft-single-tour-info .important-single-info i,
    article i,
    .tft-pagination .nav-links>a ,
    .tft-site-navigation ul li a:hover,
    .tft-header-search a:hover,
    .widget_nav_menu ul li a:hover,
    .tft-destination-wrapper .tft-destination-details ul li a:hover{
        color: <?php echo !empty($primary_color) ? esc_attr( $primary_color ) : '#F15D30';
        ?> !important;
    }

    .navbar-shrink {
        background-color: <?php echo !empty($stiky_bg_color) ? esc_attr( $stiky_bg_color ) : '#ffff'; ?>;
        backdrop-filter: blur(<?php echo !empty($stiky_bg_blur.'px') ? esc_attr( $stiky_bg_blur ).'px' : '24px'; ?>);
    }

    .navbar-shrink .tft-site-navigation ul li a, .navbar-shrink a i {
        color: <?php echo !empty($stiky_menu_color) ? esc_attr( $stiky_menu_color ) : '#000'; ?>;
    }

    .tft-site-footer {
        background-color: <?php echo !empty($footer_bg) ? esc_attr( $footer_bg ) : '#fff'; ?>;
    }
    .tft-site-footer p{
        color: <?php echo !empty($footer_text_color) ? esc_attr( $footer_text_color ) : '#222'; ?>;
    }
    .tft-full-width {
        width: 100% !important;
    }
    #tft-site-main-body{
        <?php if(!empty($travelfic_body_font_family)){  ?>
		font-family: "<?php echo $travelfic_body_font_family; ?>", sans-serif !important;
        <?php } ?>
    }
    #tft-site-main-body h1,
    #tft-site-main-body h2,
    #tft-site-main-body h3,
    #tft-site-main-body h4,
    #tft-site-main-body h5,
    #tft-site-main-body h6,
    .tft-design-2 .tft-menus-section .tft-flex .tft-logo a{
        <?php if(!empty($travelfic_heading_font_family)){  ?>
		font-family: "<?php echo $travelfic_heading_font_family; ?>", sans-serif !important;
        <?php } ?>
    }
</style>

<?php
}
add_action('wp_head', 'travelfic_customizer_style');
