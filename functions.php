<?php
/**
* Status theme functions
*/

/***** these misc items are more for testing and likely will be removed ******/
$profile_sidebar = false; //disable the main sidebar in profile member accounts

/****  end misc stuff *******/

// buddybar is being ditched instruction is to define use wp admin bar - likely we don't want 
// adminbar but keeping this here commented out
//define( 'BP_USE_WP_ADMIN_BAR', true );

/*** redirect requests for BP component pages ***/

function status_redirects() { 
	if ( bp_is_groups_component() || bp_is_forums_component() ) bp_core_redirect( bp_get_root_domain() ); 
	} 
add_action( 'bp_actions', 'status_redirects' );

/**** Register functions & regions ****/

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
	if (!is_admin()){
	wp_enqueue_style( 'normalize',  get_stylesheet_directory_uri() . '/_inc/css/normalize.css', array(), status_get_file_last_mod('normalize.css') );
	wp_enqueue_style( 'status-main',  get_stylesheet_directory_uri() . '/_inc/css/status-main.css', array(), status_get_file_last_mod('status-main.css') );
	}
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

/*** activity comments staus show comments ***/
function status_show_comments() {
	if( bp_activity_get_comment_count() ){
	echo '<a class="button bp-primary-action show-comments" title="' . __('View comments to this entry', 'status') . '">' . __('Show Comments', 'status') . '</a>' ;
	echo ' <a class="button bp-primary-action close-comments" title="' . __('Hide these comments', 'status') . '" >' . __('Close Comments', 'status') . '</a>';
	}
}
add_action('bp_activity_entry_meta', 'status_show_comments');

// Add Custom Menu Option
add_action('init', 'status_adminbar_nav');
function status_adminbar_nav() {

		register_nav_menus( array(
			'admin_bar_nav' => __( 'Admin Bar Menu' ),
		) );

}

add_action('admin_bar_init', 'status_adminbar_menu_init');
function status_adminbar_menu_init() {
	if (!is_super_admin() || !is_admin_bar_showing() )
		return;
 	add_action( 'admin_bar_menu', 'status_admin_bar_menu', 1000 );
}

function status_admin_bar_menu() {
	global $wp_admin_bar;

		$menu_name = 'admin_bar_nav';
		if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
			$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

		    $menu_items = wp_get_nav_menu_items( $menu->term_id );
		    if ($menu_items) {
			    $wp_admin_bar->add_menu( array(
			        'id' => 'status-admin-menu-0',
			        'title' => 'Navigation',
					'href' => '#' ) );
			    foreach ( $menu_items as $menu_item ) {
			        $wp_admin_bar->add_menu( array(
			            'id' => 'status-admin-menu-' . $menu_item->ID,
			            'parent' => 'status-admin-menu-' . $menu_item->menu_item_parent,
			            'title' => $menu_item->title,
			            'href' => $menu_item->url,
			            'meta' => array(
			                'title' => $menu_item->attr_title,
			                'target' => $menu_item->target,
			                'class' => implode( ' ', $menu_item->classes ),
			            ),
			        ) );
			    }
		    }
		}
}
?>