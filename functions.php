<?php
/**
* Status theme functions
*/

/***** these misc items are more for testing and likely will be removed ******/
$profile_sidebar = false; //disable the main sidebar in profile member accounts

/****  end misc stuff *******/

// Register functions & regions

if ( !function_exists( 'status_setup' ) ) :
function status_setup() {
	
	add_action( 'wp_enqueue_scripts', 'status_load_scripts' );
	add_action( 'wp_print_styles', 'bp_dtheme_enqueue_styles');
	
	register_nav_menus( array(
		'footer' => __( 'Footer Navigation', 'status' ),
	) );
}
add_action( 'after_setup_theme', 'status_setup' );
endif;

if ( ! function_exists( 'bp_dtheme_enqueue_styles()' ) ) :
function bp_dtheme_enqueue_styles(){
	wp_enqueue_style( 'normalize',  get_stylesheet_directory_uri() . '/_inc/css/normalize.css', array(), status_get_file_last_mod('normalize.css') );
	wp_enqueue_style( 'status-main',  get_stylesheet_directory_uri() . '/_inc/css/status-main.css', array(), status_get_file_last_mod('status-main.css') );
}
endif;

if ( ! function_exists( 'status_load_scripts' ) ) :
function status_load_scripts() {
	if ( !is_admin() ) { 
		wp_enqueue_script("jquery");
		wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/_inc/scripts/modernizr.js', array("jquery"), '2.0');
		wp_enqueue_script('status-scripts', get_stylesheet_directory_uri() . '/_inc/scripts/status-scripts.js', array("jquery"), status_get_file_last_mod('status-scripts.js'));
		if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
			wp_enqueue_script( 'comment-reply' );
	}
}
endif;

// Cache busting dynamically
function status_get_file_last_mod($filename) {
	// what type of file? get the last bit after the dot
	$filetype = explode('.', $filename);
	//echo $filetype[1];
	if($filetype[1] == 'css'){
 	$filename = dirname(__FILE__) . '/_inc/css/' . $filename;
	}elseif($filetype[1] == 'js'){
		$filename = dirname(__FILE__) . '/_inc/scripts/' . $filename;
	}
	if( file_exists($filename) ){
		$version =  date ("M d Y H:i:s.", filemtime($filename));
	}else{
		// manual cache busting
		$version = 'V1.0';
	}
	return $version;
}

// test to seee what options for merging admin/bp, nav menus are available
function m() {
echo '<ul><li>say stuff here</li></ul>';
}
//add_action('bp_nav_items', 'm');


/*** activity comments staus show comments ***/
function status_show_comments() {
	if( bp_activity_get_comment_count() ){
	echo '<a class="button bp-primary-action show-comments" >' . __('Show Comments', 'status') . '</a>' ;
	echo ' <a class="button bp-primary-action close-comments" >' . __('Close Comments', 'status') . '</a>';
	}
}
add_action('bp_activity_entry_meta', 'status_show_comments');
?>