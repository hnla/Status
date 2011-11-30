<?php
/**
* Status theme functions
*/


// Register functions & regions

if ( !function_exists( 'status_setup' ) ) :
function status_setup() {
	add_action( 'wp_enqueue_scripts', 'status_load_scripts' );
	
	register_nav_menus( array(
		'footer' => __( 'Footer Navigation', 'status' ),
	) );
}
add_action( 'after_setup_theme', 'status_setup' );
endif;

if ( ! function_exists( 'bp_dtheme_enqueue_styles()' ) ) :
function bp_dtheme_enqueue_styles(){
	wp_enqueue_style( 'normalize',  get_stylesheet_directory_uri() . '/_inc/css/normalize.css', array(), status_get_file_last_mod('normalize.css') );
	wp_enqueue_style( 'status-main',  get_stylesheet_directory_uri() . '/_inc/css/status-main.css', array( 'normalize' ), status_get_file_last_mod('status-main.css') );
	wp_enqueue_style( 'status-tamstyles',  get_stylesheet_directory_uri() . '/_inc/css/status-tamstyles.css', array( 'tamstyles' ), status_get_file_last_mod('status-tamstyles.css') );
}
endif;

if ( ! function_exists( 'status_load_scripts' ) ) :
function status_load_scripts() {
	if ( !is_admin() ) { 
		wp_enqueue_script("jquery");
		wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/_inc/scripts/modernizr.js', array("jquery"), '2.0');
		if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
			wp_enqueue_script( 'comment-reply' );
	}
}
endif;

// Cache busting dynamically
function status_get_file_last_mod($filename) {
 $filename = dirname(__FILE__) . '/_inc/css/' . $filename;
	if( file_exists($filename) ){
		$version =  date ("M d Y H:i:s.", filemtime($filename));
	}else{
		// manual cache busting
		$version = 'V1.0';
	}
	return $version;
}
?>