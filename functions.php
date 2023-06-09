<?php
/**
 * Functions and definitions
 *
 * @package andreasjr
 * @subpackage Taffy
*/

// Actions
add_action( 'wp_enqueue_scripts', 'taffy_enqueue_scripts');
add_action( 'enqueue_block_editor_assets', 'taffy_enqueue_scripts' );
add_action( 'after_setup_theme', 'taffy_register_block_styles' );


// Enqueue scripts and styles
if (!function_exists('taffy_enqueue_scripts')) :
function taffy_enqueue_scripts() {
	wp_enqueue_style( 'taffy-buttons', get_template_directory_uri() . '/style.css', array(), filemtime(get_theme_file_path('/style.css')) );
}
endif;

// Register block styles
if (!function_exists('taffy_register_block_styles')) :
function taffy_register_block_styles() {

	// Register Call to Action button
	register_block_style(
		'core/navigation-link',
		array(
			'name'			=> 'call-to-action',
			'label'			=> __( 'Call to Action', 'taffy' )
		)
	);

	register_block_style(
		'core/cover',
		array(
			'name'			=> 'inner-full-width',
			'label'			=> __( 'Inner Full Width', 'taffy' ),
			'inline_style' => '.wp-block-cover.is-style-inner-full-width .wp-block-cover__inner-container {
				width: 100% !important;
			}'
		)
	);
}
endif;

add_filter( 'body_class', function( $classes ) {
	if (has_post_thumbnail()) $classes[] = 'has-post-thumbnail';
	return $classes;
} );