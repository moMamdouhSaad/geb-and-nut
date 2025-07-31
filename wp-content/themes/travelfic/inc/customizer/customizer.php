<?php
/**
 * travelfic Theme Customizer
 *
 * @package travelfic
 *
 *
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function travelfic_customize_register($wp_customize)
{
    $prefix = "travelfic_customizer_settings_";
    class Travelfic_Separator_Control extends WP_Customize_Control
    {
        public function render_content()
        {
            ?>
			 <br><hr>
			<?php
        }
    }
    class Travelfic_Info_Control extends WP_Customize_Control {
        public function render_content() {
            ?>
            <label style="font-size: 14px;">
                <span style="font-weight:bold"><?php echo esc_html( $this->label ); ?>:</span>                
                <span><?php echo esc_html( $this->description ); ?></span>
            </label>
            <?php
        }
    }


    
    $wp_customize->get_setting("blogname")->transport = "postMessage";
    $wp_customize->get_setting("blogdescription")->transport = "postMessage";
    $wp_customize->get_setting("header_textcolor")->transport = "postMessage";
    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial("blogname", [
            "selector" => ".site-title a",
            "render_callback" => "travelfic_customize_partial_blogname",
        ]);
        $wp_customize->selective_refresh->add_partial("blogdescription", [
            "selector" => ".site-description",
            "render_callback" => "travelfic_customize_partial_blogdescription",
        ]);
    }
    
    /*
     * Customizer settings start
     */
    // Travelfic panel
    $wp_customize->add_panel("travelfic_customizer_settings", [
        "title" => __("Travelfic Settings", "travelfic"),
        "priority" => 100,
    ]);

    /*----------------------------------------
			Customizer section -- Header
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_header", [
        "title" => __("Header Builder", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    /*---- Header fields ------*/

    //Sticky Header
    $wp_customize->add_setting($prefix . "stiky_header", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'disabled'
    ]);
    $wp_customize->add_control($prefix . "stiky_header", [
        "label" => __("Sticky Header", "travelfic"),
        "section" => "travelfic_customizer_header",
        "type" => "radio",
        "choices" => [
            "enabled" => __("Enabled", "travelfic"),
            "disabled" => __("Disabled", "travelfic"),
        ],
        'priority' => 14,
    ]);

    //Sticky Header Background color
    $wp_customize->add_setting($prefix . "stiky_header_bg_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#fff'
    ]);
    $wp_customize->add_control($prefix . "stiky_header_bg_color", [
        "label" => __("Sticky Header Background", "travelfic"),
        "section" => "travelfic_customizer_header",
        "type" => "color",
        'priority' => 15,
    ]);

    //Sticky Header Background Blur
    $wp_customize->add_setting($prefix . "stiky_header_blur", [
        "transport" => "refresh",
        "sanitize_callback" => "absint",
        "default" => '24'
    ]);
    $wp_customize->add_control($prefix . "stiky_header_blur", [
        "label" => __("Sticky Header Background blur", "travelfic"),
        "section" => "travelfic_customizer_header",
        "type" => "number",
        'priority' => 16,
    ]);

    //Sticky Header Menu text Color
    $wp_customize->add_setting($prefix . "stiky_header_menu_text_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#000'
    ]);
    $wp_customize->add_control($prefix . "stiky_header_menu_text_color", [
        "label" => __("Sticky Header Menu Color", "travelfic"),
        "section" => "travelfic_customizer_header",
        "type" => "color",
        'priority' => 17,
    ]);

    //Turn Off Transparent Header
    $wp_customize->add_setting($prefix . "transparent_header", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'disabled'
    ]);
    $wp_customize->add_control($prefix . "transparent_header", [
        "label" => __("Transparent Header", "travelfic"),
        "section" => "travelfic_customizer_header",
        "type" => "radio",
        "choices" => [
            "enabled" => __("Enabled", "travelfic"),
            "disabled" => __("Disabled", "travelfic"),
        ],
        'priority' => 18,
    ]);

    /*----------------------------------------
			Customizer section -- Footer
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_footer", [
        "title" => __("Footer Builder", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Footer Background Color
    $wp_customize->add_setting($prefix . "footer_bg_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#fff'
    ]);
    $wp_customize->add_control($prefix . "footer_bg_color", [
        "label" => __("Footer Background Color", "travelfic"),
        "section" => "travelfic_customizer_footer",
        "type" => "color",
    ]);

    //Footer Text Color
    $wp_customize->add_setting($prefix . "footer_text_color", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_hex_color",
        "default" => '#222'
    ]);
    $wp_customize->add_control($prefix . "footer_text_color", [
        "label" => __("Footer Text Color", "travelfic"),
        "section" => "travelfic_customizer_footer",
        "type" => "color",
    ]);

    /*----------------------------------------
			Typography section -- Typography
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_typography", [
        "title" => __("Typography", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Heading Font Family
    $wp_customize->add_setting($prefix . "heading_font_family", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_select",
    ]);
    $wp_customize->add_control($prefix . "heading_font_family", [
        "label" => __("Heading Font Family", "travelfic"),
        "section" => "travelfic_customizer_typography",
        "type" => "select",
        'choices' => function_exists( 'travelfic_google_fonts_list' ) ? travelfic_google_fonts_list() : ['']
    ]);

    //Body Font Family
    $wp_customize->add_setting($prefix . "body_font_family", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_select",
    ]);
    $wp_customize->add_control($prefix . "body_font_family", [
        "label" => __("Body Font Family", "travelfic"),
        "section" => "travelfic_customizer_typography",
        "type" => "select",
        'choices' => function_exists( 'travelfic_google_fonts_list' ) ? travelfic_google_fonts_list() : ['']
    ]);
    
    /*----------------------------------------
			Customizer section -- Page
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_page", [
        "title" => __("Page", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Blog Page Sidebar
    $wp_customize->add_setting($prefix . "page_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'right'
    ]);

    $wp_customize->add_control($prefix . "page_sidebar", [
        "label" => __("Page Sidebar", "travelfic"),
        "section" => "travelfic_customizer_page",
        "type" => "radio",
        "choices" => [
            'left' => __("Left", "travelfic"),
            'right' => __("Right", "travelfic"),
            'none' => __("None", "travelfic"),
        ],
    ]);

    //Page Hero Banner
    $wp_customize->add_setting($prefix . "page_banner", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'banner'
    ]);

    $wp_customize->add_control($prefix . "page_banner", [
        "label" => __("Page Title style", "travelfic"),
        "section" => "travelfic_customizer_page",
        "type" => "radio",
        "choices" => [
            'banner' => __("Banner", "travelfic"),
            'title' => __("Title only", "travelfic"),
        ],
    ]);


    /*----------------------------------------
			Customizer section -- Blog
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_blog", [
        "title" => __("Blogs", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Blog Page Sidebar
    $wp_customize->add_setting($prefix . "blog_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'none'
    ]);

    $wp_customize->add_control($prefix . "blog_sidebar", [
        "label" => __("Blog Sidebar", "travelfic"),
        "section" => "travelfic_customizer_blog",
        "type" => "radio",
        "choices" => [
            'left' => __("Left", "travelfic"),
            'right' => __("Right", "travelfic"),
            'none' => __("None", "travelfic"),
        ],
    ]);

    //Blogs Page Banner
    $wp_customize->add_setting($prefix . "blog_banner", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'banner'
    ]);

    $wp_customize->add_control($prefix . "blog_banner", [
        "label" => __("Blog page title style", "travelfic"),
        "section" => "travelfic_customizer_blog",
        "type" => "radio",
        "choices" => [
            'banner' => __("Banner", "travelfic"),
            'title'  => __("Title", "travelfic"),            
            'empty'  => __("No title", "travelfic"),
        ],
    ]);

    
    /*----------------------------------------
			Customizer section -- Blog details
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_blog_details", [
        "title" => __("Blog details", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    //Blog Details Sidebar
    $wp_customize->add_setting($prefix . "single_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'right'
    ]);

    $wp_customize->add_control($prefix . "single_sidebar", [
        "label" => __("Blog Details Sidebar", "travelfic"),
        "section" => "travelfic_customizer_blog_details",
        "type" => "radio",
        "choices" => [
            'left' => __("Left", "travelfic"),
            'right' => __("Right", "travelfic"),
            'none' => __("None", "travelfic"),
        ],
    ]);


    /*----------------------------------------
			Customizer section -- Archive
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_archive_page", [
        "title" => __("Archive", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);

    // Control - 
    $wp_customize->add_setting($prefix . "archive_sidebar", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'right'
    ]);

    $wp_customize->add_control($prefix . "archive_sidebar", [
        "label" => __("Archive Page Sidebar", "travelfic"),
        "section" => "travelfic_customizer_archive_page",
        "type" => "radio",
        "choices" => [
            'left' => __("Left", "travelfic"),
            'right' => __("Right", "travelfic"),
            'none' => __("None", "travelfic"),
        ],
    ]);

    //Archive Page Banner
    $wp_customize->add_setting($prefix . "archive_banner", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'banner'
    ]);

    $wp_customize->add_control($prefix . "archive_banner", [
        "label" => __("Archive page title style", "travelfic"),
        "section" => "travelfic_customizer_archive_page",
        "type" => "radio",
        "choices" => [
            'banner' => __("Banner", "travelfic"),
            'title'  => __("Title", "travelfic"),            
            'empty'  => __("No title", "travelfic"),
        ],
    ]);

    //Archive Page Transparent Header
    $wp_customize->add_setting($prefix . "archive_transparent_header", [
        "transport" => "refresh",
        "sanitize_callback" => "travelfic_sanitize_radio",
        "default" => 'disabled'
    ]);

    $wp_customize->add_control($prefix . "archive_transparent_header", [
        "label" => __("Archive Page Transparent Header", "travelfic"),
        "section" => "travelfic_customizer_archive_page",
        "type" => "radio",
        "choices" => [
            "enabled" => __("Enabled", "travelfic"),
            "disabled" => __("Disabled", "travelfic"),
        ],
    ]);
    
    //Background Image
    $wp_customize->add_setting($prefix . "tf_archive_header_img", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_url",
        "default" => get_template_directory_uri() . '/assets/img/page_header.png'
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            $prefix . "tf_archive_header_img",
            [
                "label" => __("Background Image", "travelfic"),
                "section" => "travelfic_customizer_archive_page",
                "settings" => $prefix . "tf_archive_header_img",
            ]
        )
    );

    
    /*----------------------------------------
			Customizer section -- 404
	------------------------------------------*/
    $wp_customize->add_section("travelfic_customizer_404_Page", [
        "title" => __("404 Page", "travelfic"),
        "panel" => "travelfic_customizer_settings",
    ]);
    //404 Page Title
    $wp_customize->add_setting($prefix . "404_title", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_text_field",
        "default" => 'Oops! page not found'
    ]);

    $wp_customize->add_control($prefix . "404_title", [
        "label" => __("404 Page Title", "travelfic"),
        "section" => "travelfic_customizer_404_Page",
        "type" => "text",
    ]);
    //404 Page Sub Title
    $wp_customize->add_setting($prefix . "404_sub_title", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_text_field",
        "default" => 'The page you requested could not found or may be deleted from server.'
    ]);
    $wp_customize->add_control($prefix . "404_sub_title", [
        "label" => __("404 Page Sub Title", "travelfic"),
        "section" => "travelfic_customizer_404_Page",
        "type" => "text",
    ]);
    //404 Button Label
    $wp_customize->add_setting($prefix . "404_button_label", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_text_field",
        "default" => 'Back to home'
    ]);
    $wp_customize->add_control($prefix . "404_button_label", [
        "label" => __("404 Button Label", "travelfic"),
        "section" => "travelfic_customizer_404_Page",
        "type" => "text",
    ]);
    //404 Button URL
    $wp_customize->add_setting($prefix . "404_button_url", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_url",
        "default" => get_home_url()
    ]);
    $wp_customize->add_control($prefix . "404_button_url", [
        "label" => __("404 Button URL", "travelfic"),
        "section" => "travelfic_customizer_404_Page",
        "type" => "url",
    ]);

    //Background Image
    $wp_customize->add_setting($prefix . "tf_404_img", [
        "transport" => "refresh",
        "sanitize_callback" => "sanitize_url",
        "default" => get_template_directory_uri() . "/assets/img/page-404.png"
    ]);

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, $prefix . "tf_404_img", [
            "label" => __("Background Image", "travelfic"),
            "section" => "travelfic_customizer_404_Page",
            "settings" => $prefix . "tf_404_img",
        ])
    );

    function travelfic_sanitize_radio( $input, $setting ){

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                          
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }
    function travelfic_sanitize_select( $input, $setting ){

        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_text_field($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                          
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
          
    }
}
add_action("customize_register", "travelfic_customize_register");
/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function travelfic_customize_partial_blogname()
{
    bloginfo("name");
}
/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function travelfic_customize_partial_blogdescription()
{
    bloginfo("description");
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function travelfic_customize_preview_js() {
	wp_enqueue_script( 'travelfic-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), TRAVELFIC_VERSION, true );
}
add_action( 'customize_preview_init', 'travelfic_customize_preview_js' );