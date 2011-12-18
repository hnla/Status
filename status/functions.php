<?php
/**
* Status theme functions
*/

if ( !function_exists( 'status_setup' ) ) :
function status_setup() {
	unregister_nav_menu('primary');
	remove_custom_image_header();
	remove_action( 'widgets_init', 'bp_dtheme_widgets_init' );
	add_action( 'wp_enqueue_scripts', 'status_load_scripts' );
	add_action( 'wp_enqueue_scripts', 'bp_dtheme_enqueue_styles');
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote', 'status', 'chat' ) );
}
add_action( 'after_setup_theme', 'status_setup' );
endif;

if ( ! function_exists( 'bp_dtheme_enqueue_styles()' ) ) :
function bp_dtheme_enqueue_styles(){
	if (!is_admin()){
	wp_enqueue_style( 'status',  get_stylesheet_directory_uri() . '/_inc/css/status.css', array(), status_get_file_last_mod('status.css') );
	}
}
endif;

if ( ! function_exists( 'status_load_scripts' ) ) :
function status_load_scripts() {
	if ( !is_admin() ) { 
		wp_enqueue_script("jquery");
		wp_enqueue_script('modernizr', get_stylesheet_directory_uri() . '/_inc/scripts/modernizr.js', array("jquery"), '2.0');
		//wp_enqueue_script('status-scripts', get_stylesheet_directory_uri() . '/_inc/scripts/status-scripts.js', array("jquery"), status_get_file_last_mod('status-scripts.js'));
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
			'admin_bar_nav' => __( 'Admin Bar Custom Navigation Menu' ),
		) );

}

// Add Custom Menu to the Admin bar
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

function status_widgets_init() {
	register_sidebar( array(
		'name'          => 'Blog sidebar',
		'id'            => 'sidebar',
		'description'   => __( 'The sidebar widget area', 'status' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">', 	  
		'after_widget' => '</aside>',
   		'before_title' => '<h3 class="widgettitle">',
   		'after_title' => '</h3>'
	) );
	
	register_sidebar( array(
		'name'          => 'BuddyPress sidebar',
		'id'            => 'sidebar-buddypress',
		'description'   => __( 'The sidebar widget area', 'status' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">', 	  
		'after_widget' => '</aside>',
   		'before_title' => '<h3 class="widgettitle">',
   		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'status_widgets_init' );

function status_blog_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type )
		return false;

	if ( 1 == $depth )
		$avatar_size = 50;
	else
		$avatar_size = 25;
	?>

	<li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-avatar-box">
			<div class="avb">
				<a href="<?php echo get_comment_author_url() ?>" rel="nofollow">
					<?php if ( $comment->user_id ) : ?>
						<?php echo bp_core_fetch_avatar( array( 'item_id' => $comment->user_id, 'width' => $avatar_size, 'height' => $avatar_size, 'email' => $comment->comment_author_email ) ) ?>
					<?php else : ?>
						<?php echo get_avatar( $comment, $avatar_size ) ?>
					<?php endif; ?>
				</a>
			</div>
		</div>

		<div class="comment-content">
			<div class="comment-meta">
				<p>
					<?php
						/* translators: 1: comment author url, 2: comment author name, 3: comment permalink, 4: comment date/timestamp*/
						printf( __( '<a href="%1$s" rel="nofollow">%2$s</a> said on <a href="%3$s"><span class="time-since">%4$s</span></a>', 'status' ), get_comment_author_url(), get_comment_author(), get_comment_link(), get_comment_date() );
					?>
				</p>
			</div>

			<div class="comment-entry">
				<?php if ( $comment->comment_approved == '0' ) : ?>
				 	<em class="moderate"><?php _e( 'Your comment is awaiting moderation.', 'status' ); ?></em>
				<?php endif; ?>

				<?php comment_text() ?>
			</div>

			<div class="comment-options">
					<?php if ( comments_open() ) : ?>
						<?php comment_reply_link( array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ); ?>
					<?php endif; ?>

					<?php if ( current_user_can( 'edit_comment', $comment->comment_ID ) ) : ?>
						<?php printf( '<a class="button comment-edit-link bp-secondary-action" href="%1$s" title="%2$s">%3$s</a> ', get_edit_comment_link( $comment->comment_ID ), esc_attr__( 'Edit comment', 'status' ), __( 'Edit', 'status' ) ) ?>
					<?php endif; ?>

			</div>

		</div>

<?php
}
?>