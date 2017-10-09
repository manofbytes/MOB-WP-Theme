<?php
/**
 * Portfolio custom post type
 *
 * @package manofbytes
 */

 /**
  * Register Portfolio custom post type
  */
function manofbytes_porftolio() {

		$rewrite = array(
			'slug'                  => 'case-studies',
			'with_front'            => false,
			'pages'                 => true,
			'feeds'                 => true,
		);

		$args = array(
			'label'                 => 'Case studies',
			'name'                  => 'Case studies',
			'singular_name'         => 'Case study',
			'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-portfolio',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'page',
		);

		register_post_type( 'mob_portfolio', $args );
}
add_action( 'init', 'manofbytes_porftolio', 0 );


/**
 * Add instructions meta box
 */
function mob_portfolio_instructions() {
	add_meta_box(
		'portfolio-insctructions',
		'Instructions',
		'add_portfolio_instructions',
		'mob_portfolio',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'mob_portfolio_instructions' );

/**
 * Add img size reminder in admin interface
 */
function add_portfolio_instructions() {
	echo '<p>Featured image size 1140x400</p>
		<p>Screenshot img width 1366</p>
	';
}
