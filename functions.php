<?php

//------------------------- HopScotch Setup
function hopscotch_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'hopscotch' ) );
    remove_filter('term_description','wpautop');
}
add_action( 'after_setup_theme', 'hopscotch_setup' );


//------------------------- Featured Image
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 160, 160, true );
}


//------------------------- Content Width
if ( ! isset( $content_width ) ) {
    $content_width = 960;
}


//------------------------- Editor Style
function hopscotch_add_editor_styles() {
    add_editor_style( get_template_directory_uri() ); 
}
add_action( 'init', 'hopscotch_add_editor_styles' );


//------------------------- Hide Admin Toolbar
add_filter('show_admin_bar', '__return_false');


//------------------------- Widgets
function hopscotch_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-secondary',
		'description'   => __( 'Secondary content at the body', 'hopscotch' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-header',
		'description'   => __( 'Secondary content at the header', 'hopscotch' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Tertiary Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-tertiary',
		'description'   => __( 'Secondary content at the footer', 'hopscotch' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'hopscotch_widgets_init' );


//------------------------- Register Fonts
if (!function_exists('hopscotch_fonts')) :
    function hopscotch_fonts() {
        /* translators: If there are characters in your language that are not supported
           by this font, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'hopscotch' ) ) {

            $protocol = is_ssl() ? 'https' : 'http';

            wp_register_style( 'hopscotch-font-raleway', "$protocol://fonts.googleapis.com/css?family=Raleway:400,700", array(), null );

        }
    }
    add_action( 'init', 'hopscotch_fonts' );
endif;


//------------------------- CSS
function hopscotch_styles() {
	wp_enqueue_style( 'hopscotch-font-raleway' );
    wp_enqueue_style( 'hopscotch-application', get_template_directory_uri() . '/css/app.css', array(), '1.0', 'all' );
}
add_action('wp_enqueue_scripts', 'hopscotch_styles');


//------------------------- Favicon
if (!function_exists('hopscotch_favicon')) :
	function hopscotch_favicon() {
		$favicon_directory = get_template_directory_uri();
		echo '<link rel="shortcut icon" href="'.$favicon_directory.'/img/favicon.ico">' . "\n";
	}
	add_action( 'wp_head', 'hopscotch_favicon' );
endif;


//------------------------- JS
function hopscotch_js() {
	wp_enqueue_script( 'hopscotch-js-modernizr', get_template_directory_uri() . '/js/vendor/modernizr.custom.min.js', array(), '1.0', false );
	wp_enqueue_script( 'hopscotch-js-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'hopscotch-js-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), '1.0', true );
	
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
	wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'hopscotch_js' );


//------------------------- Components Directory
function hopscotch_components_directory() {
    global $comdir;
    $comdir = 'components';
    return $comdir;
}


// Customizer
require get_template_directory() . '/functions/customizer-structure.php';
//require get_template_directory() . '/functions/customizer-theme.php';

// Header
require get_template_directory() . '/functions/home-link.php';
require get_template_directory() . '/functions/admin-nav.php';

// Navigation
require get_template_directory() . '/functions/page-navigation.php';
require get_template_directory() . '/functions/post-navigation.php';

// Entry
require get_template_directory() . '/functions/page-title.php';
require get_template_directory() . '/functions/entry-edit.php';
require get_template_directory() . '/functions/entry-action-comment.php';
require get_template_directory() . '/functions/entry-date.php';
require get_template_directory() . '/functions/entry-byline.php';
require get_template_directory() . '/functions/entry-thumbnail.php';
require get_template_directory() . '/functions/more-content.php';
require get_template_directory() . '/functions/excerpt.php';
require get_template_directory() . '/functions/more-content-link-skip.php';

// Classes
require get_template_directory() . '/functions/html-class.php';
require get_template_directory() . '/functions/body-class.php';
require get_template_directory() . '/functions/shortcode-entry-class.php';
require get_template_directory() . '/functions/shortcode-entry-subtitle.php';
require get_template_directory() . '/functions/plain-image-class.php';

// Shortcodes
require get_template_directory() . '/functions/shortcode-custom-fields.php';

// Comments
require get_template_directory() . '/functions/comment-form.php';
require get_template_directory() . '/functions/comment-list.php';

// Footer
require get_template_directory() . '/functions/site-info.php';
require get_template_directory() . '/functions/auto-copyright-year.php';

// Functionalities
require get_template_directory() . '/functions/conditional-is-child.php';
require get_template_directory() . '/functions/post-count-format.php';
require get_template_directory() . '/functions/image-margin-fix.php';
require get_template_directory() . '/functions/entry-thumbnail-state.php';
require get_template_directory() . '/functions/page-id-via-slug.php';
require get_template_directory() . '/functions/google-analytics.php';
require get_template_directory() . '/functions/svg-enable.php';