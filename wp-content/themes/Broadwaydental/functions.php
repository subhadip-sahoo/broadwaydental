<?php
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'broadwaydental_setup' ) ) :

function broadwaydental_setup() {
    load_theme_textdomain( 'broadwaydental', get_template_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    register_nav_menus( array(
        'primary' => __( 'Header Menu',      'broadwaydental' ),
        'quick_links_1'  => __( 'Quick Links Menu 1', 'broadwaydental' ),
        'quick_links_2'  => __( 'Quick Links Menu 2', 'broadwaydental' ),
        'dental_treatment_1'  => __( 'Dental Treatment Menu 1', 'broadwaydental' ),
        'dental_treatment_2'  => __( 'Dental Treatment Menu 2', 'broadwaydental' ),
    ) );

    add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );

    $color_scheme  = broadwaydental_get_color_scheme();
    $default_color = trim( $color_scheme[0], '#' );

    add_theme_support( 'custom-background', apply_filters( 'broadwaydental_custom_background_args', array(
            'default-color'      => $default_color,
            'default-attachment' => 'fixed',
    ) ) );

    
    add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', broadwaydental_fonts_url() ) );
    
    /* adding theme image sizes */
    add_image_size('home_gallery_image', 186, 140);
    add_image_size('home_advertise_image', 172, 85);
}
endif; 
add_action( 'after_setup_theme', 'broadwaydental_setup' );

/**
 * Register widget area.
 *
 * @since Broadway Dental 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function broadwaydental_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'broadwaydental' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'broadwaydental' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Secondary Widget Area', 'broadwaydental' ),
        'id'            => 'sidebar-2',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'broadwaydental' ),

        'before_widget' => '<aside  id="%1$s" class="widget %2$s block_left_nav">',

        'before_widget' => '<aside id="%1$s" class="widget %2$s sidebar_nav">',

        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'broadwaydental_widgets_init' );

if ( ! function_exists( 'broadwaydental_fonts_url' ) ) :
/**
 * Register Google fonts for Broadway Dental.
 *
 * @since Broadway Dental 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function broadwaydental_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'broadwaydental' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'broadwaydental' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'broadwaydental' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'broadwaydental' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Broadway Dental 1.1
 */
function broadwaydental_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'broadwaydental_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Broadway Dental 1.0
 */
function broadwaydental_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'broadwaydental-fonts', broadwaydental_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );

	// Load our main stylesheet.
	wp_enqueue_style( 'broadwaydental-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'broadwaydental-ie', get_template_directory_uri() . '/css/ie.css', array( 'broadwaydental-style' ), '20141010' );
	wp_style_add_data( 'broadwaydental-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'broadwaydental-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'broadwaydental-style' ), '20141010' );
	wp_style_add_data( 'broadwaydental-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'broadwaydental-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'broadwaydental-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}
        
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
        wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/js/broadwaydental.js', array('jquery'), '1.0', true );
	wp_localize_script( 'theme-js', 'template', array(
            'url'   => get_template_directory_uri(),
            'ajaxurl' => admin_url('admin-ajax.php')
	) );
        
//        wp_enqueue_script( 'broadwaydental-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
//	wp_localize_script( 'broadwaydental-script', 'screenReaderText', array(
//		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'broadwaydental' ) . '</span>',
//		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'broadwaydental' ) . '</span>',
//	) );
}
add_action( 'wp_enqueue_scripts', 'broadwaydental_scripts' );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Broadway Dental 1.0
 *
 * @see wp_add_inline_style()
 */
function broadwaydental_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
                    .post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
                    .post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
                    .post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
            $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
            $css .= '
                    .post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
                    .post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
                    .post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
            ';
	}

	wp_add_inline_style( 'broadwaydental-style', $css );
}
add_action( 'wp_enqueue_scripts', 'broadwaydental_post_nav_background' );

function broadwaydental_nav_description( $item_output, $item, $depth, $args ) {
    if ( 'primary' == $args->theme_location && $item->description ) {
        $item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
    }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'broadwaydental_nav_description', 10, 4 );

function broadwaydental_search_form_modify( $html ) {
    return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'broadwaydental_search_form_modify' );
//pagination function starts here
function wpbeginner_numeric_posts_nav() {

	 

	    if( is_singular() )

	        return;

	 

	    global $wp_query;

	 

	    /** Stop execution if there's only 1 page */

	    if( $wp_query->max_num_pages <= 1 )

	        return;

	 

	    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

	    $max   = intval( $wp_query->max_num_pages );

	 

	    /** Add current page to the array */

	    if ( $paged >= 1 )

	        $links[] = $paged;

	 

	    /** Add the pages around the current page to the array */

	    if ( $paged >= 3 ) {

	        $links[] = $paged - 1;

	        $links[] = $paged - 2;

	    }

	 

	    if ( ( $paged + 2 ) <= $max ) {

	        $links[] = $paged + 2;

	        $links[] = $paged + 1;

	    }
	    echo '<div class="navigation"><ul>' . "\n";

	 

	    /** Previous Post Link */

	    if ( get_previous_posts_link() )

	        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	 

	    /** Link to first page, plus ellipses if necessary */

	    if ( ! in_array( 1, $links ) ) {

	        $class = 1 == $paged ? ' class="active"' : '';

	 

	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

	 

	        if ( ! in_array( 2, $links ) )

	            echo '<li>�</li>';

	    }

	 

	    /** Link to current page, plus 2 pages in either direction if necessary */

	    sort( $links );

	    foreach ( (array) $links as $link ) {

	        $class = $paged == $link ? ' class="active"' : '';

	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );

	    }

	 

	    /** Link to last page, plus ellipses if necessary */

	    if ( ! in_array( $max, $links ) ) {

	        if ( ! in_array( $max - 1, $links ) )

	            echo '<li>�</li>' . "\n";

	 

	        $class = $paged == $max ? ' class="active"' : '';

	        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );

	    }

	 

	    /** Next Post Link */

	    if ( get_next_posts_link() )

	        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	    echo '</ul></div>' . "\n";


	}
//pagination function ends here
require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/customizer.php';

/* Theme Post Types */
require get_template_directory() . '/inc/post-types.php';

/* Bootstrap Nav Menu Dropdown Walker */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

function custom_pagination($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
        $pagerange = 2;
    }

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == '') {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if(!$numpages) {
            $numpages = 1;
        }
    }

    $pagination_args = array(
        'base'            => get_pagenum_link(1) . '%_%',
        'format'          => 'page/%#%',
        'total'           => $numpages,
        'current'         => $paged,
        'show_all'        => False,
        'end_size'        => 1,
        'mid_size'        => $pagerange,
        'prev_next'       => True,
        'prev_text'       => __('&laquo;'),
        'next_text'       => __('&raquo;'),
        'type'            => 'plain',
        'add_args'        => false,
        'add_fragment'    => ''
    );

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='custom-pagination'>";
        echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
        echo $paginate_links;
        echo "</nav>";
    }
}
add_filter('excerpt_more', 'custom_excrpt');

function custom_excrpt($more){    
	global $post;	
    return '... &nbsp;<a href="'.get_the_permalink($post->ID).'">READ MORE</a>';
} 

