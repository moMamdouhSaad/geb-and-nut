<?php
/**
 * travelfic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travelfic
 */

if ( ! defined( 'TRAVELFIC_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TRAVELFIC_VERSION', '1.1.5' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function travelfic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on travelfic, use a find and replace
		* to change 'travelfic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'travelfic', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );
	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary_menu' => esc_html__( 'Primary', 'travelfic' ),
			'secondary_menu' => __( 'Secondary Menu', 'travelfic' ),
			'footer_menu'  => __( 'Footer Menu', 'travelfic' ),
		)
	);
	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'travelfic_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor style
	add_editor_style( 'assets/css/editor-style.css' );

	// Add support for block style
	add_theme_support( "wp-block-styles" );
}
add_action( 'after_setup_theme', 'travelfic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function travelfic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travelfic_content_width', 640 );
}
add_action( 'after_setup_theme', 'travelfic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function travelfic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'travelfic' ),
			'id'            => 'tft-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'travelfic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="tft-widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets', 'travelfic' ),
			'id'            => 'footer_sideabr',
			'description'   => esc_html__( 'Add widgets here.', 'travelfic' ),
			'before_widget' => '<div id="%1$s" class="tft-footer-section %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="tft-widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'travelfic_widgets_init' );

/**
 * Include webfont-loader
 */
require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

/**
 * Enqueue scripts and styles.
 */
function travelfic_scripts() {
	// Enqueue Style
	wp_enqueue_style( 'google-fonts', wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap' ), array(), TRAVELFIC_VERSION, 'all' );

	wp_enqueue_style( 'travelfic-style', get_stylesheet_uri(), array(), TRAVELFIC_VERSION, 'all' );
	//Font Awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), TRAVELFIC_VERSION );
	wp_enqueue_style( 'travelfic-custom-style', get_template_directory_uri() . '/assets/css/travelfic-style.css', array(), TRAVELFIC_VERSION );
	wp_enqueue_script( 'travelfic-script', get_template_directory_uri() . '/assets/js/active.js', array('jquery'), TRAVELFIC_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'travelfic_scripts', 9999999 );


function travelfic_admin_scripts( $screen ) {
    wp_enqueue_style( 'travelfic-style', get_template_directory_uri() . '/assets/admin/css/admin-style.css', array(), TRAVELFIC_VERSION );
	wp_enqueue_script( 'travelfic-script', get_template_directory_uri() . '/assets/admin/js/admin-script.js', array('jquery'), TRAVELFIC_VERSION );
    wp_localize_script( 'travelfic-script', 'travelfic_script_params',
        array(
            'travelfic_theme_nonce'   => wp_create_nonce( 'updates' ),
            'ajax_url'       => admin_url( 'admin-ajax.php' ),
            'installing'     => __( 'Installing...', 'travelfic' ),
            'activating'     => __( 'Activating...', 'travelfic' ),
            'installed'      => __( 'Installed', 'travelfic' ),
            'activated'      => __( 'Activated', 'travelfic' ),
            'install_failed' => __( 'Install failed', 'travelfic' ),
            'redirect_url'   => admin_url('admin.php?page=travelfic-template-list'),
        )
    );
}
add_action( 'admin_enqueue_scripts', 'travelfic_admin_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function travelfic_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'travelfic_skip_link_focus_fix' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Starter Template Notice Functions
 */
require get_template_directory() . '/inc/template-notice.php';

/**
 * Travelfic Typography Functions
 */
require get_template_directory() . '/inc/travelfic-fonts-functions.php';

/**
 * Functions Walker Nav Menu
 */
require get_template_directory() . '/inc/class-travelfic-walker-menu.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-apply.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/sanitize-functions.php';
/**
 * Meta boxes.
 */
require get_template_directory() . '/inc/meta-boxes/travelfic-meta-boxes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Theme Functions
*/
require get_template_directory() . '/inc/travelfic-functions.php';

/**
 * TGM init
*/
require get_template_directory() . '/inc/tgm/tgm-init.php';

/*
* custom Widgets
*/

require get_template_directory() . '/inc/theme-widgets/widgets/travelfic-footer-info.php';
require get_template_directory() . '/inc/theme-widgets/widgets/travelfic-recent-posts.php';

// Travelfic Header

add_filter('travelfic_header', 'travelfic_header_callback');
function travelfic_header_callback($travelfic_header){
	$travelfic_prefix = 'travelfic_customizer_settings_';
    $travelfic_transparentHeader = get_theme_mod($travelfic_prefix.'transparent_header', 'disabled');
    $travelfic_archive_transparentHeader = get_theme_mod($travelfic_prefix.'archive_transparent_header', 'disabled');
    if(is_archive()  || is_single() || is_404() || is_search()){
        $travelfic_transparentHeader = $travelfic_archive_transparentHeader;
    }

    $travelfic_banner = get_theme_mod($travelfic_prefix . 'page_banner', 'banner');
    $travelfic_transparent_logo = get_theme_mod($travelfic_prefix . 'trasnparent_logo');
    $travelfic_disable_banner = get_post_meta( get_the_ID(), 'tft-pmb-banner', true );
    $travelfic_stiky = get_theme_mod($travelfic_prefix.'stiky_header', 'disabled');
    $travelfic_header_bg = get_theme_mod($travelfic_prefix.'header_bg_color');
    if( isset( $travelfic_stiky ) ){
        if( $travelfic_stiky != 'disabled' ){
            $travelfic_stiky_class = 'has_stiky';
        }else{
            $travelfic_stiky_class = '';
        }
    }

    if (is_page()) {
        $disable_single_page = get_post_meta( get_the_ID(), 'tft-pmb-transfar-header', true );
        if(!empty($disable_single_page)){
            $travelfic_transparentHeader = 'disabled';
        }
    }
    if (is_page('tf-search')) {
        $travelfic_transparentHeader = 'disabled';
    }
	ob_start();
	?>
	<header class="tft-site-header tft-customizer-typography <?php echo !empty($travelfic_transparentHeader) && $travelfic_transparentHeader == 'enabled' ? 'tft-theme-transparent-header' : ''; ?>" style="background: <?php echo $travelfic_transparentHeader != 'enabled' && !empty($travelfic_header_bg) ? esc_attr($travelfic_header_bg) : '' ?>">
    <div class="tft-header-inner <?php echo esc_attr( $travelfic_stiky_class ); ?>">
        <div class="tft-header-desktop">
            <div class="tft-main-header-wrapper <?php echo esc_attr( apply_filters( 'travelfic_header_tftcontainer', $travelfic_tftcontainer = '') ); ?> tft-container-grid align-center justify-sp-between">

                <!-- Site Branding/Logo -->
                <div class="tft-header-left site-header-section justify-content-start">
                    <div class="site--brand-logo">
                        <?php
                        if($travelfic_transparentHeader == 'enabled'){
                            if(!empty($travelfic_transparent_logo)){ ?>
                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                <img src="<?php echo esc_url($travelfic_transparent_logo); ?>" alt="<?php _e("Logo", "travelfic"); ?>">
                            </a>
                           <?php }else{ ?>
                            <div class="logo-text">
                                <a href="<?php echo esc_url(home_url('/')) ?>">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </div>
                            <?php
                            }
                        }else{
                        if (has_custom_logo()) {
                            if (function_exists('the_custom_logo')) {
                                the_custom_logo();
                            }
                        } else {
                        ?>
                        <div class="logo-text">
                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                        <?php
                        } }
                        ?>
                    </div>
                </div>

                <!-- Site Navigation Menu -->
                <div class="tft-header-center site-header-section justify-content-center">
                    <nav class="tft-site-navigation">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary_menu',
                                'menu_id'        => 'navigation',
                                'container'      => 'ul',
                                'menu_class'     => 'main--header-menu tft-flex'
                            ));
                        ?>
                    </nav>
                </div>
            </div>
        </div>
        <div class="tft-header-mobile">
            <div class="tft-main-header-wrapper <?php echo esc_attr( apply_filters( 'travelfic_header_tftcontainer', $travelfic_tftcontainer = '') ); ?> tft-container-flex align-center justify-sp-between">
                <!-- Site Branding/Logo -->
                <div class="tft-header-left site-header-section">
                    <div class="site--brand-logo">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else { ?>
                        <div class="logo-text">
                            <a href="<?php echo esc_url(home_url('/')) ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                        <?php  } ?>
                    </div>
                </div>
                <!-- Site Search Bar -->
                <div class="tft-header-center site-header-section">
                    <a href="#" class="tft-mobile_menubar">
                        <div class="tft-menubar-active">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="tft-menubar-close">
                            <i class="fas fa-times"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="<?php echo esc_attr( apply_filters( 'travelfic_header_tftcontainer', $travelfic_tftcontainer = '') ); ?> site-header-section tft-mobile-main-menu">
                <nav class="tft-site-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary_menu',
                        'menu_id'        => 'navigation',
                        'container' => 'ul',
                        'menu_class' => 'main--header-menu tft-flex',
                        'walker' => has_nav_menu('primary_menu') ? new Travelfic_Custom_Nav_Walker() : '',
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </div>
    <?php
    if( isset( $travelfic_stiky ) ){
        if( $travelfic_stiky != 'disabled' ){
           ?>
           <div class="tft-stiky-header-cover"></div>
           <?php
        }
    }
    ?>
</header>
<?php
$travelfic_header_data = ob_get_clean();
return $travelfic_header_data;
}

// Travelfic Footer

add_filter('travelfic_footer', 'travelfic_footer_callback');
function travelfic_footer_callback($travelfic_footer){
	ob_start();
?>
<footer class="tft-site-footer tft-customizer-typography">
    <?php if ( is_active_sidebar( 'footer_sideabr' ) ) { ?>
        <div class="tft-footer-inner <?php echo esc_attr( apply_filters( 'travelfic_footer_tftcontainer', $travelfic_tftcontainer = '') ); ?> tft-container-grid tft-grid-clmn-4">
            <?php dynamic_sidebar( 'footer_sideabr' ); ?>
        </div>
    <?php } ?>

    <div class="tft-footer-copyright">
        <div class="tft-copyrgith-inner <?php echo esc_attr( apply_filters( 'travelfic_footer_tftcontainer', $travelfic_tftcontainer = '') ); ?>">
            <p class="tft-center">
            <?php
                $current_year = date('Y');
                printf( esc_html__('© Copyright %1$s %2$s by %3$s All Rights Reserved.', 'travelfic'), esc_html($current_year), esc_html( get_bloginfo('name') ), '<a target="_blank" href="'.esc_url("https://themefic.com/").'">Themefic</a>');
            ?>
            </p>
        </div>
    </div>
</footer>
<?php
	$travelfic_footer_data = ob_get_clean();
	return $travelfic_footer_data;
}

// Travelfic Header tft-container Controller

add_filter('travelfic_header_tftcontainer', 'travelfic_header_tftcontainer_callback');
function travelfic_header_tftcontainer_callback($travelfic_tftcontainer){
    return 'tft-container';
}


// Travelfic Footer tft-container Controller

add_filter('travelfic_footer_tftcontainer', 'travelfic_footer_tftcontainer_callback');
function travelfic_footer_tftcontainer_callback($travelfic_tftcontainer){
    return 'tft-container';
}

// Travelfic Page tft-container Controller

add_filter('travelfic_page_tftcontainer', 'travelfic_page_tftcontainer_callback');
function travelfic_page_tftcontainer_callback($travelfic_tftcontainer){
    return 'tft-container';
}
