<?php
/**
 * Manofbytes theme functions
 *
 * @package manofbytes
 */

if ( ! function_exists( 'manofbytes_setup' ) ) :
	/**
	 * Setup theme defaults and
	 * register support for various WordPress features.
	 */
	function manofbytes_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WP manage the doc title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'manofbytes' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
	}
endif;
add_action( 'after_setup_theme', 'manofbytes_setup' );


/**
 * Set custom img sizes
 */
function mob_images() {
	update_option( 'thumbnail_size_w', 360 );
	update_option( 'thumbnail_size_h', 220 );
	update_option( 'thumbnail_crop', 1 );

	update_option( 'medium_size_w', 654 );
	update_option( 'medium_size_h', 9999 );
	update_option( 'medium_crop', 0 );

	update_option( 'medium_large_size_w', 0 );
	update_option( 'medium_large_size_h', 0 );

	update_option( 'large_size_w', 850 );
	update_option( 'large_size_h', 400 );
	update_option( 'large_crop', 1 );

	add_image_size( 'archive-blog', 360, 170, true );	
}
add_action( 'after_setup_theme', 'mob_images' );


/**
 * Add responsive container to embeds
 */
function mob_responsive_container( $html ) {
	return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'mob_responsive_container', 10, 3 );


/**
 * Clean WP head
 */
function manofbytes_cleanup() {
	// Really Simple Discovery.
	remove_action( 'wp_head', 'rsd_link' );

	// Windows live writer.
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// Meta tag showing WP version.
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'manofbytes_cleanup' );

/**
 * Remove WP version from RSS
 */
function manofbytes_hide_wp_version() {
	return '';
}
add_filter( 'the_generator', 'manofbytes_hide_wp_version' );


/**
 * Remove WP version from css and scripts
 */
function manofbytes_remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'manofbytes_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'manofbytes_remove_wp_ver_css_js', 9999 );


/**
 * Remove emojicons
 */
function manofbytes_remove_emoji() {
	 // All actions related to emojis.
	 remove_action( 'admin_print_styles', 'print_emoji_styles' );
	 remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	 remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	 remove_action( 'wp_print_styles', 'print_emoji_styles' );
	 remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	 remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	 remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

	 // Filter to remove TinyMCE emojis.
	 add_filter( 'tiny_mce_plugins', 'maofbytes_emojicons_tinymce' );
}


/**
 * Remove more emojicons
 */
function maofbytes_emojicons_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
add_action( 'init', 'manofbytes_remove_emoji' );


// Remove pre-ffetch link for emoji.
add_filter( 'emoji_svg_url', '__return_false' );


/**
 * Enque scripts, styles, fonts
 */
function manofbytes_enque() {
	// Fonts and styles.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Montserrat:700|Source+Sans+Pro:400,400i,700', array(), null );
	wp_enqueue_style( 'manofbytes-style', get_stylesheet_uri() );

	// Replace jQuery from WP with CDN.
	wp_deregister_script( 'jquery' ); // Triggers warning with WP-DEBUG on.
	wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.1.1.min.js', array(), false, true );

	// Bootstrap JS.
	wp_enqueue_script( 'manofbytes-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '', true );

	// ScrollMagic.
	if ( is_singular( 'post' ) ) {
		wp_enqueue_script( 'scrollMagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array(), '', true );

		// Debug Scroll Magic.
		// wp_enqueue_script( 'scrollMagicDebug', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/debug.addIndicators.min.js', array(), '', true );
	}

	// Manofbytes JS.
	wp_enqueue_script( 'manofbytes-js', get_template_directory_uri() . '/js/manofbytes.js', array(), '', true );

	// Macke ajax url avail. to our js.
	wp_localize_script( 'manofbytes-js', 'mob_subscribe', array( 'ajax' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'manofbytes_enque' );


/**
 * Prevent auto loading of contact form 7 files
 * we load them manually in the templates that need it
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );


/**
 * Clean captions
 */
function cleaner_caption( $output, $attr, $content ) {
	// We're not worried abut captions in feeds, so just return the output here.
	if ( is_feed() ) {
		return $output;
	}

	// Set up the default arguments.
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => '',
	);

	// Merge the defaults with user input.
	$attr = shortcode_atts( $defaults, $attr );

	/*
	* If the width is less than 1 or there is no caption, return the content
	* wrapped between the [caption]< tags
	*/
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) ){
		return $content;
	}

	// Set up the attributes for the caption <figure>.
	$attributes = ( ! empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
	$attributes .= ' class="caption-wrapper ' . esc_attr( $attr['align'] ) . '"';

	// Open the caption <figure>.
	$output = '<figure' . $attributes . '>';

	// Allow shortcodes for the content the caption was created for.
	$output .= do_shortcode( $content );

	// Append the caption text.
	$output .= '<span class="post-img-caption">' . $attr['caption'] . '</span>';

	// Close the caption </div>.
	$output .= '</figure>';

	// Return the formatted, clean caption.
	return $output;
}
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );


// Add portfolio custom post type.
require_once get_template_directory() . '/inc/portfolio-functions.php';


// Handle subscription forms.
require_once get_template_directory() . '/inc/subscription-functions.php';
