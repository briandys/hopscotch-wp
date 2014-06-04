<?php

//------------------------- HopScotch Setup
function hopscotch_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'hopscotch' ) );
}
add_action( 'after_setup_theme', 'hopscotch_setup' );


/*------------------------- Widgets -------------------------*/
function fed_widgets_init() {
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
		'name'          => __( 'Secondary Sidebar', 'hopscotch' ),
		'id'            => 'sidebar-secondary',
		'description'   => __( 'Secondary content at the body', 'hopscotch' ),
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
add_action( 'widgets_init', 'fed_widgets_init' );


//------------------------- Featured Image
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 160, 160, true );
}


//------------------------- content_width
if ( ! isset( $content_width ) ) {
    $content_width = 960;
}


//------------------------- Editor Style
function hopscotch_add_editor_styles() {
    add_editor_style( get_template_directory_uri() ); 
}
add_action( 'init', 'hopscotch_add_editor_styles' );


//------------------------- Components Directory
function hopscotch_components_directory() {
    global $comdir;
    $comdir = 'components';
    return $comdir;
}


//------------------------- Page Title
function hopscotch_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'hopscotch' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'hopscotch_wp_title', 10, 2 );


//------------------------- Register Google Fonts
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
	// Temp Exclude wp_enqueue_style( 'hopscotch-font-raleway' );
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


//------------------------- Show Home Link by Default
function hopscotch_home_nav( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'hopscotch_home_nav' );


//------------------------- Add Admin Nav
if (!function_exists('hopscotch_admin_nav')) :
    function hopscotch_admin_nav( $items, $args ) {
        if (is_user_logged_in() && $args->theme_location == 'primary') {
            $items .= '<li class="sign-out-link"><a href="'. wp_logout_url( get_permalink() ) .'">Sign out</a></li>';
        }
        elseif (!is_user_logged_in() && $args->theme_location == 'primary') {
            $items .= '<li class="sign-in-link"><a href="'. wp_login_url() .'">Sign in</a></li>';
        }
        return $items;
    }
    add_filter( 'wp_nav_menu_items', 'hopscotch_admin_nav', 10, 2 );
endif;



//------------------------- Allow SVG Files Upload
function hopscotch_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';    
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'hopscotch_mime_types' );




//------------------------- Page Navigation
if ( ! function_exists( 'hopscotch_paging_nav' ) ) :
function hopscotch_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 4,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '<span class="label">Previous Page</span>', 'hopscotch' ),
		'next_text' => __( '<span class="label">Next Page</span>', 'hopscotch' ),
	) );

	if ( $links ) :

	?>
	<nav class="action-items content-navigation page-navigation-action page-navigation" role="navigation">
		<h1 class="assistive-text"><?php _e( 'Page Navigation', 'hopscotch' ); ?></h1>
		<div class="acton-list content-navigation-list page-navigation-list">
			<?php echo $links; ?>
		</div>
	</nav><!-- action-items -->
	
    <?php
	endif;
}
endif;


//------------------------- Post Navigation
if (!function_exists('hopscotch_post_nav')) :
	function hopscotch_post_nav() {
        ?>
		<?php get_template_part( ''.hopscotch_components_directory().'/post-navigation' ); ?>
		<?php
	}
endif;


/*------------------------- Entry Date -------------------------*/
if ( ! function_exists( 'hopscotch_entry_date' ) ) :
	function hopscotch_entry_date( $echo = true ) {
		
		if ( has_post_format( array( 'chat', 'status' ) ) )
			$format_prefix = _x( '%2$s', '1: post format name. 2: date', 'hopscotch' );
		else
			$format_prefix = '%2$s';
	
			$date = sprintf( '<div class="timestamp entry-timestamp"><span class="label">Published on</span> <a class="timestamp-link entry-timestamp-link" href="%1$s" title="%2$s" rel="bookmark"><time class="entry-timestamp-time" datetime="%3$s" title="%2$s"><span class="entry-date"><span class="date-month">%4$s</span> <span class="date-day">%5$s</span>, <span class="date-year">%6$s</span></span></time></a></div><!-- .entry-timestamp -->',
				esc_url( get_permalink() ),
				esc_attr( sprintf( __( 'Permalink to %s', 'hopscotch' ), the_title_attribute( 'echo=0' ) ) ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date( 'F' ) ) ),
				esc_html( sprintf( get_the_date('j') ) ),
				esc_html( sprintf( get_the_date('Y') ) )
			);
	
		if ( $echo )
			echo $date;
	
		return $date;
	}
endif;


//------------------------- Entry Byline
if ( ! function_exists( 'hopscotch_entry_byline' ) ) :
    function hopscotch_entry_byline() {
        // Post author
        if ( 'post' == get_post_type() ) {
            printf( '<div class="entry-byline"><span class="label">By</span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_attr( sprintf( __( 'View all posts by %s', 'hopscotch' ), get_the_author() ) ),
                get_the_author()
            );
        }

        // Translators: used between list items, there is a space after the comma.
        $categories_list = get_the_category_list( __( ', ', 'twentythirteen' ) );
        if ( $categories_list ) {
            echo ' <span class="mid-label">on</span>';
            echo ' <span class="categories-links">' . $categories_list . '</span></div><!-- .entry-byline -->';
        }
    }
endif;


//------------------------- Edit Entry
if ( ! function_exists( 'hopscotch_entry_action_edit' ) ) :
    function hopscotch_entry_action_edit() {
    ?>
        <?php if ( current_user_can('edit_posts') ) : ?>
        <?php get_template_part( ''.hopscotch_components_directory().'/entry-action-edit' ); ?>
        <?php endif; ?>
    <?php }
endif;


//------------------------- Comment on Entry
if ( ! function_exists( 'hopscotch_entry_action_comment' ) ) :
    function hopscotch_entry_action_comment() {
    ?>
        <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>            
            <?php get_template_part( ''.hopscotch_components_directory().'/entry-action-comment' ); ?>
        <?php endif; ?>
    <?php }
endif;


//------------------------- Entry Thumbnail
// Custom Field
// The option to use an external image source as Featured Image (instead of from the Media Library)
// Between the Custom Field and Featured Image from the Library, Custom Field is priority
// Usage:
// Key: entry-thumbnail
// Value: Absolute path of image. E.g., http://path/filename.img
function hopscotch_entry_thumbnail() {
?>
	<?php get_template_part( ''.hopscotch_components_directory().'/entry-thumbnail' ); ?>
<?php }


//------------------------- Entry Class
// Description: You can add a custom class via Custom Field
// Usage:
// Key: entry-class
// Value: Class name

function hopscotch_entry_class($classes) {
?>    
<?php if ( get_post_meta( get_the_ID(), 'entry-class', true ) ) : ?>
    <?php $entry_class = ' hopscotch-' . get_post_meta( get_the_ID(), 'entry-class', true ); ?>
<?php endif; ?>
<?php
$classes[] = $entry_class;
return $classes;
}
add_filter('post_class','hopscotch_entry_class');


//------------------------- HTML Class
if (!function_exists('hopscotch_html_default_class')) :
	function hopscotch_html_default_class() {
		echo 'html site-default status-main-nav-inactive';
    }
add_action( 'hopscotch_html_class', 'hopscotch_html_default_class');
endif;


//------------------------- Body Class
function hopscotch_body_class( $classes ) {
	global $post, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    
    // Post Slug as Class
    if ( isset( $post ) &&  !is_home() ) {		
		$classes[] = $post->post_type . '-' . $post->post_name;		
	}
    
    // Post Category as Class
    if ( is_single() ) {
		foreach((get_the_category( $post->ID )) as $category)
        $classes[] = 'category-' .$category->category_nicename;
    }
    
    // Browser Detection
    if($is_lynx) $classes[] = 'browser-lynx';
	elseif($is_gecko) $classes[] = 'browser-gecko';
	elseif($is_opera) $classes[] = 'browser-opera';
	elseif($is_NS4) $classes[] = 'browser-ns4';
	elseif($is_safari) $classes[] = 'browser-safari';
	elseif($is_chrome) $classes[] = 'browser-chrome';
	elseif($is_IE) $classes[] = 'browser-ie';
	else $classes[] = 'browser-unknown';

	if($is_iphone) $classes[] = 'device-iphone';
    
    // Sidebar Class Toggle
    if( is_active_sidebar( 'sidebar-header' ) ) $classes[] = 'header-sidebar-active';
	else $classes[] = 'header-sidebar-inactive';
    
    // Sidebar Class Toggle
    if( is_active_sidebar( 'sidebar-secondary' ) ) $classes[] = 'secondary-sidebar-active';
	else $classes[] = 'secondary-sidebar-inactive';
	
    if( is_active_sidebar( 'sidebar-tertiary' ) ) $classes[] = 'tertiary-sidebar-active';
	else $classes[] = 'tertiary-sidebar-inactive';
    
    // Custom Field: entry-template; Usage: Custom Field Name: entry-template; Custom Field Value: [any class name you want]
    if ( get_post_meta( get_the_ID(), 'entry-template', true ) ) $classes[] = 'hopscotch-template-'.get_post_meta( get_the_ID(), 'entry-template', true );
	
    return $classes;
}
add_filter('body_class','hopscotch_body_class');


//------------------------- Is Child Conditional
function hopscotch_is_child($page_id_or_slug) { 
	global $post; 
	if(!is_int($page_id_or_slug)) {
		$page = get_page_by_path($page_id_or_slug);
		$page_id_or_slug = $page->ID;
	} 
	if(is_page() && $post->post_parent == $page_id_or_slug ) {
       		return true;
	} else { 
       		return false; 
	}
}


//------------------------- Post More Label
if ( ! function_exists( 'hopscotch_more_link' ) ) :
    function hopscotch_more_link( $more_link, $more_link_text ) {
        return str_replace( $more_link_text, 'Continue Reading', '<div class="show-more-content">' .$more_link .'</div>' );
    }
    add_filter( 'the_content_more_link', 'hopscotch_more_link', 10, 2 );
endif;


//------------------------- Excerpt Length
if ( ! function_exists( 'hopscotch_excerpt_length' ) ) :
    function hopscotch_excerpt_length( $length ) {
        return 24;
    }
    add_filter( 'excerpt_length', 'hopscotch_excerpt_length', 999 );
endif;


//------------------------- Excerpt Ellipsis
function hopscotch_excerpt_more( $more ) {
return '&hellip;'; // nicer without the brackets
}
add_filter( 'excerpt_more', 'hopscotch_excerpt_more' );


//------------------------- Excerpt More Label
if ( ! function_exists( 'hopscotch_more_content_link' ) ) :
    function hopscotch_more_content_link($output) {
        global $post;
        return $output . '<div class="show-more-content"><a class="more-link" href="'. get_permalink($post->ID) . '"> Continue Reading</a></div>';
    }
    add_filter('the_excerpt', 'hopscotch_more_content_link');
endif;


//------------------------- Hide Admin Toolbar
add_filter('show_admin_bar', '__return_false');


//------------------------- Main Customizer
function hopscotch_customize_register_main($wp_customize){
    
    $wp_customize->add_section('hopscotch_customize_main', array(
        'title'    => __('HopScotch Main Customizer', 'hopscotch'),
        'priority' => 0,
    ) );
	
	// Max Content Width
	$wp_customize->add_setting( 'hopscotch_customize_main[max_content_width]', array(
		'default'        => '',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'type' => 'option' ,
	) );
	
	$wp_customize->add_control( 'hopscotch_max_content_width', array(
		'label'      => __( 'Maximum Content Width (em, %, px)', 'hopscotch' ),
		'section'    => 'hopscotch_customize_main',
		'settings'   => 'hopscotch_customize_main[max_content_width]',
	) );
	
	// Google Analytics
	$wp_customize->add_setting( 'hopscotch_customize_main[google_analytics]', array(
		'default'        => 'UA-XXXXX-X',
		'type'           => 'option',
		'capability'     => 'edit_theme_options',
		'type' => 'option' ,
	) );
	
	$wp_customize->add_control( 'hopscotch_google_analytics', array(
		'label'      => __( 'Google Analytics ID', 'hopscotch' ),
		'section'    => 'hopscotch_customize_main',
		'settings'   => 'hopscotch_customize_main[google_analytics]',
	) );
}
add_action('customize_register', 'hopscotch_customize_register_main');


//------------------------- Main CSS
function hopscotch_customize_main_css() {
    $options_main = get_option(hopscotch_customize_main);
	?>
    <style type="text/css">
        .entry-cr,
        .comments-cr,
        .page-nav,
        #secondary-cr,
        .main-content-hr-cr {
            max-width: <?php echo $options_main['max_content_width']; ?>;
        }
     </style>
    <?php
}
add_action( 'wp_head', 'hopscotch_customize_main_css');


//------------------------- Theme Customizer
function hopscotch_customize_register_theme($wp_customize){
    
    $wp_customize->add_section('hopscotch_customize_theme', array(
        'title'    => __('HopScotch Theme Customizer', 'hopscotch'),
        'priority' => 0,
    ) );
	
	// Primary Color
	$wp_customize->add_setting('hopscotch_customize_theme[theme_primary_color]', array(
        'default'           => '#3778CC',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		'type' => 'option' ,
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_primary_color', array(
        'label'    => __('Theme Header Color', 'hopscotch'),
        'section'  => 'hopscotch_customize_theme',
        'settings' => 'hopscotch_customize_theme[theme_primary_color]',
    )) );
	
	// Navigation Color
	$wp_customize->add_setting('hopscotch_customize_theme[theme_nav_color]', array(
        'default'           => '#3778CC',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		'type' => 'option' ,
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_nav_color', array(
        'label'    => __('Theme Navigation Color', 'hopscotch'),
        'section'  => 'hopscotch_customize_theme',
        'settings' => 'hopscotch_customize_theme[theme_nav_color]',
    )) );
	
	// Link Color
	$wp_customize->add_setting('hopscotch_customize_theme[theme_link_color]', array(
        'default'           => '#3778CC',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
		'type' => 'option' ,
    ) );
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'theme_link_color', array(
        'label'    => __('Theme Link Color', 'hopscotch'),
        'section'  => 'hopscotch_customize_theme',
        'settings' => 'hopscotch_customize_theme[theme_link_color]',
    )) );
}
add_action('customize_register', 'hopscotch_customize_register_theme');


//------------------------- Theme CSS
function hopscotch_customize_theme_css() {
    $options_theme = get_option(hopscotch_customize_theme);
	?>
    <style type="text/css">
        .site-header {
            background-color: <?php echo $options_theme['theme_primary_color']; ?>;
        }

        .site-header,
        .page-nav-links a:hover,
        .page-links a:hover,
        .menu-toggle,
        .menu-active div.nav-menu > ul,
        .menu-active div.nav-menu li,
        .nav-menu .children,
        .nav-menu .sub-menu,
        input[type="submit"],
        .site-header .search-form,
        .site-header .search-bar-title {
            background-color: <?php echo $options_theme['theme_nav_color']; ?>;
        }

        .entry-hr a:hover,
        .entry-title,
        .entry-title-link,
        .entry-ct a,
        .entry-fr a:hover,
        .widget-area a,
        .comment-hr a:hover,
        .comment-form-admin a:hover,
        .comment-ct a,
        .entry-actions a,
        .comment-actions a,
        .entry-ct .more-link {
            color: <?php echo $options_theme['theme_link_color']; ?>;
        }
     </style>
    <?php
}
add_action( 'wp_head', 'hopscotch_customize_theme_css');


//------------------------- Comment Form Fields
if ( ! function_exists( 'hopscotch_comment_form_fields' ) ) :
    function hopscotch_comment_form_fields($fields){
        $commenter = wp_get_current_commenter();
        $req = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );    
        $fields['author'] = '<div class="field field-author">' . '<label for="author">' . __( 'Name', 'hopscotch' ) . '</label> ' . ( $req ? '' : '' ) . '<input id="author" class="input-text" name="author" type="text" placeholder="Nickname" required title="Name" value="' . esc_attr( $commenter['comment_author'] ) . '" size="32"' . $aria_req . '></div>';
        $fields['email'] = '<div class="field field-email">' . '<label for="email">' . __( 'Email', 'hopscotch' ) . '</label> ' . ( $req ? '' : '' ) . '<input id="email" class="input-text" name="email" type="email" placeholder="email@address.com" required title="Email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="32"' . $aria_req . '></div>';
        $fields['url'] = '<div class="field field-url">' . '<label for="url">' . __( 'Website <span class="note-optional">(optional)</span>', 'hopscotch' ) . '</label> ' . '<input id="url" class="input-text" name="url" type="url" placeholder="URL" title="URL" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="32"></div>';
        return $fields;
    }
    add_filter( 'comment_form_default_fields', 'hopscotch_comment_form_fields' );
endif;


//------------------------- Comment List
if ( ! function_exists( 'hopscotch_comments' ) ) :
    function hopscotch_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ( 'div' == $args['style'] ) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
    ?>
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent-comment') ?> id="comment-<?php comment_ID() ?>">

        <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-cr">
        <?php endif; ?>

            <header class="comment-hr">            
                <div class="comment-meta">                                                                        
                    <div class="comment-meta-cr">
                        <div class="timestamp comment-timestamp">
                            <span class="assistive-text label">Commented on</span>
                            <a class="timestamp-link comment-timestamp-link" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" rel="bookmark">
                                <?php printf( __('<time class="comment-time" datetime="%1$s"><span class="comment-date">%1$s</span> <span class="comment-time">%2$s</span></time>'), get_comment_date('m/d'),  get_comment_time('H:i')) ?>
                            </a>
                        </div>
                    </div><!-- comment-timestamp -->
                </div><!-- comment-meta -->
                
                <div class="comment-author vcard">
                    <div class="comment-author-name"><span class="assistive-text label">Comment by</span> <?php comment_author_link(); ?></div>
                    <div class="author-avatar">
                        <a href="<?php if ( get_comment_author_url( $comment->comment_ID ) ) { echo get_comment_author_url( $comment->comment_ID ); } else echo '#'; ?>"><?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?></a>
                    </div><!-- author-avatar -->
                </div><!-- comment-author -->
            </header>

            <div class="comment-ct">
                <?php if ($comment->comment_approved == '0') : ?>
                    <p class="comment-pending"><?php _e('Your comment is awaiting moderation.') ?></p>
                <?php endif; ?>
                <blockquote class="comment-message"><?php comment_text() ?></blockquote>
            </div><!-- .comment-content -->
            
            <?php if ( is_user_logged_in() || comments_open() ) : ?>
            <div class="action-items comment-action">
                <ul class="action-list comment-action-list">
                    <?php if ( current_user_can('edit_posts') ) : ?>
                    <li class="action-item action-edit comment-action-edit"><?php edit_comment_link(__('Edit'),'  ','' ); ?>
                    <?php endif; ?>
                    <?php if ( comments_open() ) : ?>
                    <li class="action-item action-reply comment-action-reply"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => 1, 'max_depth' => $args['max_depth']))) ?>
                    <?php endif; ?>
                </ul>
            </div><!-- action-items -->
            <?php endif; ?>

        <?php if ( 'div' != $args['style'] ) : ?>
        </div><!--.comment-cr-->
        <?php endif; ?>

    <?php }
endif;


//------------------------- FixImageMargins
// by Justin Adie, Version: 0.1.0, http://rathercurious.net
class fixImageMargins{
    public $xs = 0; //change this to change the amount of extra spacing

    public function __construct(){
        add_filter('img_caption_shortcode', array(&$this, 'fixme'), 10, 3);
    }
    public function fixme($x=null, $attr, $content){

        extract(shortcode_atts(array(
                'id'    => '',
                'align'    => 'alignnone',
                'width'    => '',
                'caption' => ''
            ), $attr));

        if ( 1 > (int) $width || empty($caption) ) {
            return $content;
        }

        if ( $id ) $id = 'id="' . $id . '" ';

    return '<div ' . $id . 'class="wp-caption ' . $align . '" style="width: ' . ((int) $width + $this->xs) . 'px">'
    . $content . '<p class="wp-caption-text">' . $caption . '</p></div>';
    }
}
$fixImageMargins = new fixImageMargins();


//------------------------- Remove Read More Link Skip
function hopscotch_remove_more_skip_link($link) { 
	$offset = strpos($link, '#more-');
		if ($offset) {
			$end = strpos($link, '"',$offset);
		}
		if ($end) {
			$link = substr_replace($link, '', $offset, $end-$offset);
		}
	return $link;
}
add_filter('the_content_more_link', 'hopscotch_remove_more_skip_link');


//------------------------- Controlling the Post Count on Archive & Category Widgets
function hopscotch_cat_count($links) {
	$links = str_replace('</a> (', ' </a> <span class="item-count entry-count">', $links);
	$links = str_replace(')', '</span>', $links);
	return $links;
}
add_filter('wp_list_categories', 'hopscotch_cat_count');

function hopscotch_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="item-count entry-count">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'hopscotch_archive_count');


//------------------------- Custom Fields via Shortcode
// Insert a piece of widget or code anywhere in your content by using Custom Fields and Shortcode
// Usage:
// Key: [hopscotch]whatever[/hopscotch]
// Value: whatever
function hopscotch_custom_fields_shortcode($atts, $text, $content = null) {
	global $post;
	
	extract(shortcode_atts(array(
	  'label' => '',
	  'class' => 'hopscotch-shortcode'
	), $atts));
	
	return '<div class="'.$class.'">' .$label .get_post_meta($post->ID, $text, true) .'</div>';
}

add_shortcode('hopscotch','hopscotch_custom_fields_shortcode');


//------------------------- HopScotch Credits
if (!function_exists('hopscotch_site_info_ir')) :
	function hopscotch_site_info_ir() {
		?>
		<?php get_template_part( ''.hopscotch_components_directory().'/web-designer' ); ?>
		<?php
	}
	add_action( 'hopscotch_web_designer', 'hopscotch_site_info_ir');
endif;

if (!function_exists('hopscotch_site_info_olrayt')) :
	function hopscotch_site_info_olrayt() {
		?>
		<span class="olrayt">All rights reserved.</span>
		<?php
	}
	add_action( 'hopscotch_copyright', 'hopscotch_site_info_olrayt');
endif;


//------------------------- Auto Copyright Year
function hopscotch_copyright_range($year = 'auto'){
	if (intval($year) == 'auto'){ $year = date('Y'); }
	elseif (intval($year) == date('Y')){ echo intval($year); }
	elseif (intval($year) < date('Y')){ echo intval($year) . ' &ndash; ' . date('Y'); }
	elseif (intval($year) > date('Y')){ echo date('Y'); }
}
add_action( 'hopscotch_auto_copyright', 'hopscotch_copyright_range');


//------------------------- Adding class to plain images
function hopscotch_image_class($content) {
  return preg_replace('/<p[^>]*>\\s*?(<a.*?><img.*?><\\/a>|<img.*?>)?\\s*<\/p>/', '<p class="image-cr">$1</p>', $content);
}
add_filter('the_content', 'hopscotch_image_class');


//------------------------- Class for Featured Image
function hopscotch_thumbnail_class($classes) {
	if(current_theme_supports('post-thumbnails'))
		if ( has_post_thumbnail() || get_post_meta( get_the_ID(), 'entry-thumbnail', true ) )
			$classes[] = "entry-thumbnail-active";
	return $classes;
}
add_filter('post_class', "hopscotch_thumbnail_class");


//------------------------- Get Page ID via Slug
// http://erikt.tumblr.com/post/278953342/get-a-wordpress-page-id-with-the-slug
function hopscotch_get_page_ID($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

// Temp Exclude
/*------------------------- Google Analytics -------------------------
function hopscotch_google_analytics() {
	$options_main = get_option(hopscotch_customize_main);
	?>
	<script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','<?php echo $options_main['google_analytics']; ?>');ga('send','pageview');
    </script>
    <?php
}
add_action( 'wp_footer', 'hopscotch_google_analytics' );*/

?>