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
	if ( bp_is_groups_component() || bp_is_members_component() || bp_is_forums_component() ) bp_core_redirect( bp_get_root_domain() ); 
	} 
add_action( 'bp_actions', 'status_redirects' );

/**** Register functions & regions ****/

if ( !function_exists( 'status_setup' ) ) :
function status_setup() {
	unregister_nav_menu('primary');
	remove_custom_image_header();
	remove_action( 'widgets_init', 'bp_dtheme_widgets_init' );
	add_action( 'wp_enqueue_scripts', 'status_load_scripts' );
	add_action( 'wp_print_styles', 'bp_dtheme_enqueue_styles');
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote', 'status', 'chat' ) );
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

/** Access status nav area through add_actions 
* - use to add in BP profile links etc 
* Hooks:
* 'status_before_nav_ul'
* 'status_inside_nav_ul'
* 'status_after_nav_ul'
*/
function site_logo() {

	echo '<ul id="site-title">';
	echo '<li><a href="/">site title/logo</a></li>';
	echo '</ul>';
}
function status_core_user_links() {
global $bp;
	
	echo '<ul id="user-profile-menu" class="main-nav">';
	
		// login / sign up links
		if ( !is_user_logged_in() ) {

			echo '<li class="bp-login no-arrow"><a href="' . bp_get_root_domain() . '/wp-login.php?redirect_to=' . urlencode( bp_get_root_domain() ) . '">' . __( 'Log In', 'status' ) . '</a></li>';

			// Show "Sign Up" link if user registrations are allowed
			if ( bp_get_signup_allowed() ) {
			echo '<li class="bp-signup no-arrow"><a href="' . bp_get_signup_page(false) . '">' . __( 'Sign Up', 'status' ) . '</a></li>';	
	 	}
			echo '</ul>';
		}// close logged out links			
			
		// user profile links

	if ( !$bp->bp_nav || !is_user_logged_in() )
		return false;

	echo '<li id="bp-adminbar-account-menu"><a href="' . bp_loggedin_user_domain() . '">';
	echo __( 'My Account', 'status' ) . '</a>';
	echo '<ul>';

	// Loop through each navigation item
	$counter = 0;
	foreach( (array)$bp->bp_nav as $nav_item ) {
		$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : '';

		if ( -1 == $nav_item['position'] )
			continue;

		echo '<li' . $alt . '>';
		echo '<a id="bp-admin-' . $nav_item['css_id'] . '" href="' . $nav_item['link'] . '">' . $nav_item['name'] . '</a>';

		if ( isset( $bp->bp_options_nav[$nav_item['slug']] ) && is_array( $bp->bp_options_nav[$nav_item['slug']] ) ) {
			echo '<ul>';
			$sub_counter = 0;

			foreach( (array)$bp->bp_options_nav[$nav_item['slug']] as $subnav_item ) {
				$link = $subnav_item['link'];
				$name = $subnav_item['name'];

				if ( isset( $bp->displayed_user->domain ) )
					$link = str_replace( $bp->displayed_user->domain, $bp->loggedin_user->domain, $subnav_item['link'] );

				if ( isset( $bp->displayed_user->userdata->user_login ) )
					$name = str_replace( $bp->displayed_user->userdata->user_login, $bp->loggedin_user->userdata->user_login, $subnav_item['name'] );

				$alt = ( 0 == $sub_counter % 2 ) ? ' class="alt"' : '';
				echo '<li' . $alt . '><a id="bp-admin-' . $subnav_item['css_id'] . '" href="' . $link . '">' . $name . '</a></li>';
				$sub_counter++;
			}
			echo '</ul>';
		}

		echo '</li>';

		$counter++;
	}

	$alt = ( 0 == $counter % 2 ) ? ' class="alt"' : '';

	echo '<li' . $alt . '><a id="bp-admin-logout" class="logout" href="' . wp_logout_url( home_url() ) . '">' . __( 'Log Out', 'status' ) . '</a></li>';
	echo '</ul>';
	echo '</li>';
	

if(is_user_logged_in()) {
	echo '</ul>';
}
}
//add_action('status_before_nav_ul', 'site_logo');
//add_action('status_before_nav_ul', 'status_core_user_links');

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