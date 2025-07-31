<?php 
// 404 Page template 
$travelfic_prefix = 'travelfic_customizer_settings_';
$travelfic_page_404_title = get_theme_mod($travelfic_prefix.'404_title', 'Oops! page not found');
$travelfic_page_404_sub_title = get_theme_mod($travelfic_prefix.'404_sub_title',  'The page you requested could not found or may be deleted from server.');
$travelfic_page_404_button_label = get_theme_mod($travelfic_prefix.'404_button_label', 'Back to home');
$travelfic_page_404_button_url = get_theme_mod($travelfic_prefix.'404_button_url', get_home_url());
$travelfic_page_404_image = get_theme_mod($travelfic_prefix.'tf_404_img', get_template_directory_uri() . "/assets/img/page-404.png");

?>

<div class="tft-404-container">
    <div class="tft-404-head">
        <h2 class="font-mdm font-blue"> <?php echo esc_html($travelfic_page_404_title) ?> </h2>
        <p><?php echo esc_html($travelfic_page_404_sub_title); ?></p>
        <a class="bttn tft-bttn-primary" href="<?php
            if ($travelfic_page_404_button_url != '') {
                echo esc_url($travelfic_page_404_button_url ); 
            }else{
                echo esc_url(home_url('/'));
            }
            ?>" tabindex="0">
            <div class="tft-custom-bttn">
                <span><?php echo esc_html( $travelfic_page_404_button_label ); ?></span>
            </div>
        </a>
    </div>
    <div class="tft-404-body">
        <img src="<?php 
            if( $travelfic_page_404_image != '' ){
                echo esc_url($travelfic_page_404_image);
            }else{
                echo esc_url( get_template_directory_uri().'/assets/img/page-404.png' );
            }
        
        ?>" alt="">
    </div>
</div>

