<?php
/**
 * BP-Default theme functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress and BuddyPress to change core functionality.
 *
 * The first function, status_setup(), sets up the theme by registering support
 * for various features in WordPress and BuddyPress, such as post formats, theme
 * compatibility, and enqueues this theme's JavaScripts.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package Status
 * @since 1.0
 */
 // Exit if accessed directly
 if ( ! defined( 'ABSPATH' ) ) exit;

 // If BuddyPress is not activated, switch back to the default WP theme
 if ( ! defined( 'BP_VERSION' ) )
 	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

 // Bail out if enough of BuddyPress isn't loaded
 if ( ! function_exists( 'bp_is_active' ) )
 	return;
 
if ( !function_exists( 'status_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress and BuddyPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since 1.0
 */
function status_setup() {
	// We're not using BP-Default's primary nav menu, or custom header images.
		unregister_nav_menu( 'primary' );
		remove_custom_image_header();

		// Enqueue javascript
		add_action( 'wp_enqueue_scripts', 'status_enqueue_scripts' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'admin_bar_nav' => __( 'Admin Bar Custom Navigation Menu', 'status' ),
		) );

		// Add theme support for post formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'video', 'image', 'quote', 'status', 'chat' ) );

		// This theme comes with all the BuddyPress goodies
		add_theme_support( 'buddypress' );
}
add_action( 'after_setup_theme', 'status_setup', 15 );
endif;

if ( ! function_exists( 'bp_dtheme_enqueue_styles()' ) ) :
/**
 * Enqueue theme CSS safely
 *
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * @since 1.0
 */
function bp_dtheme_enqueue_styles(){
	if (!is_admin()){
	$version = '20120303';
	wp_enqueue_style( 'status',  get_stylesheet_directory_uri() . '/_inc/css/status.css', array(), $version );
	}
}
endif;

if ( ! function_exists( 'status_load_scripts' ) ) :
/**
 * Enqueue theme javascript safely
 *
 * @see http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @since 1.0
 */
function status_load_scripts() {
	if ( is_admin() )
			return;

		$version = '20120303'; 
		wp_enqueue_script( 'modernizr',      get_stylesheet_directory_uri() . '/_inc/scripts/modernizr.js',      array( 'jquery' ), $version );
		wp_enqueue_script( 'status-scripts', get_stylesheet_directory_uri() . '/_inc/scripts/status-scripts.js', array( 'jquery' ), $version );

		// Only load comment-reply javascript if we're on a single post and threaded comments has been enabled
		if ( is_singular() && get_option( 'thread_comments' ) && comments_open() )
			wp_enqueue_script( 'comment-reply' );
}
endif;

/**
 * Register the admin bar menu if the Toolbar is enabled and current user
 * is a bona fide super admin (with cape).
 *
 * @since 1.0
 */
add_action('admin_bar_init', 'status_adminbar_menu_init');
function status_adminbar_menu_init() {
	if (!is_super_admin() || !is_admin_bar_showing() )
		return;
 	add_action( 'admin_bar_menu', 'status_admin_bar_menu', 1000 );
}

/**
 * Register our admin bar extension menu
 *
 * @global obj $wp_admin_bar
 * @since 1.0
 * @todo Double-check inline comments for accuracy
 */
function status_admin_bar_menu() {
	global $wp_admin_bar;

		$menu_name = 'admin_bar_nav';
		$locations = get_nav_menu_locations();

		// Bail out if this nav menu hasn't been set up
		if ( ! isset( $locations[ $menu_name ] ) )
			return;

		$menu       = wp_get_nav_menu_object( $locations[ $menu_name ] );
		$menu_items = wp_get_nav_menu_items( $menu->term_id );

		// If the menu has no items, don't do anything
		if ( ! $menu_items )
			return;

		// Add menu
		$wp_admin_bar->add_menu( array(
			'href'  => '#',
			'id'    => 'status-admin-menu-0',
			'title' => 'Navigation',
		) );

		// Add menu items
		foreach ( $menu_items as $menu_item ) {
			$wp_admin_bar->add_menu( array(
				'href'   => $menu_item->url,
				'id'     => 'status-admin-menu-' . $menu_item->ID,
				'parent' => 'status-admin-menu-' . $menu_item->menu_item_parent,
				'meta'   => array(
					'title'  => $menu_item->attr_title,
					'target' => $menu_item->target,
					'class'  => implode( ' ', $menu_item->classes ),
				),
				'title'  => $menu_item->title,
			) );
		}
}

/**
 * Register widget areas.
 *
 * @since 1.0
 */
function status_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Blog sidebar', 'status' ),
			'id'            => 'sidebar',
			'description'   => __( 'The sidebar widget area', 'status' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
		) );

	register_sidebar( array(
			'name'          => __( 'BuddyPress sidebar', 'status' ),
			'id'            => 'sidebar-buddypress',
			'description'   => __( 'The sidebar widget area', 'status' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widgettitle">',
			'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'status_widgets_init' );

/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @param mixed $comment Comment record from database
 * @param array $args Arguments from wp_list_comments() call
 * @param int $depth Comment nesting level
 * @see wp_list_comments()
 * @since 1.0
 */
function status_blog_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type )
		return false;

	if ( 1 == $depth )
		// Use smaller avatars the deeper the comment depth
		$avatar_size = 50;
	else
		$avatar_size = 25;
	?>

	<li <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<section class="comment-meta">
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
			</section>
			
			<section class="comment-content">
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
			</section>
			
		</article>
<?php
}

function status_showfriends() {
	global $members_template, $bp;
	$user = $bp->loggedin_user->id;
	if( is_user_logged_in() ) : 
					if( bp_has_members('user_id=' . $user . '') && $user !== 0 ) : ?>
					
						<ul id="friends-list" class="looplist">
						<?php	while ( bp_members() ) : bp_the_member(); ?>
							<li>
								<div class="item-avatar"><a href="<?php bp_member_permalink() ?>"><?php  bp_member_avatar('type=full&width=30&height=30') ?></a></div>
							</li>				 
		
						<?php endwhile; ?>
						</ul>			
			
	<?php else: ?>

		<p><?php _e( 'Once you friend someone it will show up here.', 'status' ) ?></p>
			
	<?php endif;
			
	endif;
}

/* ----- User-specific Front-end theme settings ----- */
/*** Spit out customizations.*/
function status_custom_user_settings () {
	$_present = bp_get_option('bp-xprofile-status-field_ids');
	if (!$_present) return false;
	
	$_positions = array(
		'left' => __('Left', 'status'),
		'right' => __('Right', 'status'),
		'center' => __('Center', 'status'),
	);
	$_repeats = array(
		'no-repeat' => __('No repeat', 'status'),
		'repeat' => __('Tile', 'status'),
		'repeat-x' => __('Tile horizontally', 'status'),
		'repeat-y' => __('Tile vertically', 'status'),
	);
	$_attachments = array(
		'scroll' => __('Scroll', 'status'),
		'fixed' => __('Fixed', 'status'),
	);
	
	$color = xprofile_get_field_data($_present['status-link_color']);
	$color = $color ? $color : false;

	$bg_image = xprofile_get_field_data($_present['status-background_image']);
	$bg_image = $bg_image ? $bg_image : get_background_image();

	$bg_color = xprofile_get_field_data($_present['status-background_color']);
	$bg_color = $bg_color ? $bg_color : "#" . get_theme_mod("background_color", (defined('BACKGROUND') ? BACKGROUND : 'ffffff'));

	$position = xprofile_get_field_data($_present['status-background_position']);
	if ($position && in_array($position, $_positions)) {
		$opts = array_flip($_positions);
		$position = $opts[$position];
	}
	$position = $position ? $position : get_theme_mod('background_position_x', 'left');

	$repeat = xprofile_get_field_data($_present['status-background_repeat']);
	if ($repeat && in_array($repeat, $_repeats)) {
		$opts = array_flip($_repeats);
		$repeat = $opts[$repeat];
	}
	$repeat = $repeat ? $repeat : get_theme_mod('background_repeat', 'repeat');

	$attachment = xprofile_get_field_data($_present['status-background_attachment']);
	if ($position && in_array($repeat, $_attachments)) {
		$opts = array_flip($_attachments);
		$position = $opts[$position];
	}
	$attachment = $attachment ? strtolower($attachment) : get_theme_mod('background_attachment', 'scroll');
	
	$image = $bg_image ? "background-image: url({$bg_image});" : '';
	$position = ($position && $image) ? "background-position: top {$position};" : '';
	$repeat = ($repeat && $image) ? "background-repeat: {$repeat};" : '';
	$attachment = ($attachment && $image) ? "background-attachment: {$attachment};" : '';
	$background_color = ($bg_color && '#' != $bg_color) ? "background-color: {$bg_color};" : '';
	
	echo '<style type="text/css">' .
		($color ? "a, a:link, a:visited, a:hover { color: {$color}; } " : '') .
		"body {	{$image} {$position} {$repeat} {$attachment} {$background_color} }" .
	'</style>';
}

/*** Set up custom background handler.*/
function status_setup_user_theme () {
	add_custom_background('status_custom_user_settings', '');
}
add_action('after_setup_theme', 'status_setup_user_theme', 20);

/*** Group name getting utility function. */
function status_get_design_group_name () {
	return __('Design', 'status');
}

/*** Group ID getting utility function.*/
function status_get_design_group_id () {
	static $group_id;
	if ($group_id) return $group_id;
	
	global $wpdb;
	$bp_prefix = bp_core_get_table_prefix();
	$_default_group_name = status_get_design_group_name();
	
	$group_name = bp_get_option('bp-xprofile-status-group-name');
	$group_name = $group_name ? $group_name : $_default_group_name;
	
	$group_id = (int)$wpdb->get_var($wpdb->prepare("SELECT id FROM {$bp_prefix}bp_xprofile_groups WHERE name=%s LIMIT 1", $group_name));
	if (!$group_id) {
		$group_id = xprofile_insert_field_group(array(
			'name' => $group_name,
		));
	}
	// Handle group name change
	if ($group_name != $_default_group_name) { // Name changed
		$grp = new BP_XProfile_Group($group_id);
		$grp->name = $_default_group_name;
		$grp->save();
		$group_name = $_default_group_name;
	}
	bp_update_option('bp-xprofile-status-group-name', $group_name);
	return $group_id;
}

/*** Place the design link in the navigation.*/
function status_design_group_url_setup () {
	global $bp;
	
	$name = status_get_design_group_name();
	$slug = 'edit/group/' . status_get_design_group_id();
	bp_core_new_subnav_item(array(
		'name' => $name,
		'slug' => $slug,
		'parent_url' => $bp->loggedin_user->domain . $bp->profile->slug . '/',
		'parent_slug' => $bp->profile->slug,
		'screen_function' => '__return_false',
		'position' => 40 
	));
}
add_action('bp_init', 'status_design_group_url_setup');

/*** Shoot down the extra group in profile editing fields */
function status_filter_profile_tab_links ($tabs) {
	global $bp;
	$group_id = status_get_design_group_id();
	
	// If this is the design group, show no tabs
	if (bp_get_current_profile_group_id() == $group_id) {
		$tabs = array();
	} else { // Else, remove the design tab
		$link = trailingslashit("{$bp->displayed_user->domain}{$bp->profile->slug}/edit/group/{$group_id}");
		foreach ($tabs as $key => $tab) {
			if (preg_match('/' . preg_quote($link, '/') . '/', $tab)) unset($tabs[$key]);
		}
	}
	
	return array_filter($tabs);
}
add_filter('xprofile_filter_profile_group_tabs', 'status_filter_profile_tab_links');

/*** Allows new field type (fileupload) */
function status_allow_file_upload_xfield ($fields) {
	@$fields[] = 'status-fileupload';
	return $fields;
}
add_filter('xprofile_field_types', 'status_allow_file_upload_xfield');

/*** Show editable field (fileupload) */
function status_show_file_upload_xfield () {
	global $field;
	if ('status-fileupload' != $field->type) return false;
	
	$raw_background_image = isset($field->data->value) ? maybe_unserialize($field->data->value) : array();
	$background_image = isset($raw_background_image) ? $raw_background_image : false;
	
	echo '<label for="' . bp_get_the_profile_field_input_name() . '">' . 
		bp_get_the_profile_field_name() .
	'</label>';
	echo '<input type="file" name="status-fileupload" />';
	echo '&nbsp;<a href="#clear-background" class="clear-value" id="' . bp_get_the_profile_field_input_name() . '-clear">' . esc_attr(__('Clear', 'status')) . '</a>';
	echo '<input type="hidden" name="' . bp_get_the_profile_field_input_name() . '" id="' . bp_get_the_profile_field_input_name() . '" value="' . esc_attr($background_image) . '" />';
	echo '<div id="' . bp_get_the_profile_field_input_name() . '-preview"><img src="' . ($background_image ? esc_url($background_image) : '') . '" /></div>';
}
add_action('bp_custom_profile_edit_fields', 'status_show_file_upload_xfield');

/*** Actually upload the file */
function status_handle_image_upload ($user_id) {
	if (!$_POST) return false;
	if (!$user_id) return false;
	check_admin_referer('bp_xprofile_edit');

	$_present = bp_get_option('bp-xprofile-status-field_ids');
	$old_path = get_user_meta($user_id, 'status-image_path', true);

	// Determine if we have an upload
	if (!isset($_FILES['status-fileupload'])) return false;
	if (
		(!empty( $_FILES['status-fileupload']['type'] ) && !preg_match('/(jpe?g|gif|png)$/i', $_FILES['status-fileupload']['type'])) 
		|| 
		!preg_match( '/(jpe?g|gif|png)$/i', $_FILES['status-fileupload']['name']) 
	) {
		xprofile_delete_field_data($_present['status-background_image'], $user_id);
		return false;
	}
	
	if (!function_exists('wp_handle_upload')) @require_once(ABSPATH . 'wp-admin/includes/file.php');
	$result = wp_handle_upload($_FILES['status-fileupload'], array('test_form'=>false));
	if (isset($result['error'])) return false;
	$result['file'] = str_replace('\\', '/', $result['file']);

	xprofile_set_field_data(
		$_present['status-background_image'],
		$user_id,
		$result['url']
	);

	if ($old_path && $result['file'] != $old_path && file_exists($old_path)) {
		@unlink($old_path);
	}
	update_user_meta($user_id, 'status-image_path', $result['file']);
}
add_action('xprofile_updated_profile', 'status_handle_image_upload');

/**
 * Create xProfile fields if they don't already exist.
 */
function status_create_xprofile_fields () {
	$group_id = status_get_design_group_id();

	$_present = bp_get_option('bp-xprofile-status-field_ids');
	$_present = $_present ? $_present : array();
	$_fields = array(
		'status-link_color' => __('Link color', 'status'),
		'status-background_image' => __('Background image', 'status'),
		'status-background_position' => __('Background position', 'status'),
		'status-background_repeat' => __('Background repeat', 'status'),
		'status-background_attachment' => __('Background attachment', 'status'),
		'status-background_color' => __('Background color', 'status'),
	);
	
	// Single-line fields
	if (!@$_present['status-link_color']) { // Field not created
		$_present['status-link_color'] = xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'type' => 'textbox',
			'field_order' => 1,
			'name' => $_fields['status-link_color'],
		));
	} else if (!xprofile_get_field_id_from_name($_fields['status-link_color'])) { // Field not translated
		$field = xprofile_get_field($_present['status-link_color']);
		$field->name = $_fields['status-link_color'];
		$field->save();
	}
	if (!@$_present['status-background_color']) { // Field not created
		$_present['status-background_color'] = xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'type' => 'textbox',
			'field_order' => 100,
			'name' => $_fields['status-background_color'],
		));
	} else if (!xprofile_get_field_id_from_name($_fields['status-background_color'])) { // Field not translated
		$field = xprofile_get_field($_present['status-background_color']);
		$field->name = $_fields['status-background_color'];
		$field->save();
	}
	if (!@$_present['status-background_image']) { // Field not created
		$_present['status-background_image'] = xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'type' => 'status-fileupload',
			'field_order' => 2,
			'name' => $_fields['status-background_image'],
		));
	} else if (!xprofile_get_field_id_from_name($_fields['status-background_image'])) { // Field not translated
		$field = xprofile_get_field($_present['status-background_image']);
		$field->name = $_fields['status-background_image'];
		$field->save();
	} else if (xprofile_get_field_id_from_name($_fields['status-background_image'])) { // Specific check for updated fields
		// Can probably be removed for production
		$field = xprofile_get_field($_present['status-background_image']);
		$field->type = 'status-fileupload';
		$field->save();
	}
	
	// Radio fields
	if (!@$_present['status-background_position']) { // Field not created
		$_present['status-background_position'] = xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'type' => 'radio',
			'field_order' => 3,
			'name' => $_fields['status-background_position'],
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_position'],
			'type' => 'radio',
			'name' => __('Left', 'status'),
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_position'],
			'type' => 'radio',
			'name' => __('Center', 'status'),
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_position'],
			'type' => 'radio',
			'name' => __('Right', 'status'),
		));
	} else if (!xprofile_get_field_id_from_name($_fields['status-background_position'])) { // Field not translated
		$field = xprofile_get_field($_present['status-background_position']);
		$field->name = $_fields['status-background_position'];
		$field->save();
	}
	if (!@$_present['status-background_repeat']) { // Field not created
		$_present['status-background_repeat'] = xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'type' => 'radio',
			'field_order' => 4,
			'name' => $_fields['status-background_repeat'],
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_repeat'],
			'type' => 'radio',
			'name' => __('No repeat', 'status'),
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_repeat'],
			'type' => 'radio',
			'name' => __('Tile', 'status'),
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_repeat'],
			'type' => 'radio',
			'name' => __('Tile horizontally', 'status'),
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_repeat'],
			'type' => 'radio',
			'name' => __('Tile vertically', 'status'),
		));
	} else if (!xprofile_get_field_id_from_name($_fields['status-background_repeat'])) { // Field not translated
		$field = xprofile_get_field($_present['status-background_repeat']);
		$field->name = $_fields['status-background_repeat'];
		$field->save();
	}
	if (!@$_present['status-background_attachment']) { // Field not created
		$_present['status-background_attachment'] = xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'type' => 'radio',
			'field_order' => 5,
			'name' => $_fields['status-background_attachment'],
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_attachment'],
			'type' => 'radio',
			'name' => __('Scroll', 'status'),
		));
		xprofile_insert_field(array(
			'field_group_id' => $group_id,
			'parent_id' => $_present['status-background_attachment'],
			'type' => 'radio',
			'name' => __('Fixed', 'status'),
		));
	} else if (!xprofile_get_field_id_from_name($_fields['status-background_attachment'])) { // Field not translated
		$field = xprofile_get_field($_present['status-background_attachment']);
		$field->name = $_fields['status-background_attachment'];
		$field->save();
	}
	
	bp_update_option('bp-xprofile-status-field_ids', $_present);
}
add_action('init', 'status_create_xprofile_fields');

/**
 * Load script and style dependencies, as appropriate.
 */
function status_edit_profile_dependencies () {
	if (bp_get_current_profile_group_id() != status_get_design_group_id()) return false;
	wp_enqueue_style("farbtastic");
	wp_enqueue_script("jquery");
	wp_enqueue_script("farbtastic", admin_url("js/farbtastic.js"), array("jquery"));
	add_thickbox();
}
add_action('xprofile_screen_edit_profile', 'status_edit_profile_dependencies');

function status_custom_javascript () {
	if (bp_get_current_profile_group_id() != status_get_design_group_id()) return false;
	$_present = bp_get_option('bp-xprofile-status-field_ids');
	if (!$_present) return false;
?>
<script type="text/javascript">
(function ($) {
/**
 * Function by Phil Haack
 * Taken verbatim from http://haacked.com/archive/2009/12/29/convert-rgb-to-hex.aspx
 */
function colorToHex(color) {
    if (color.substr(0, 1) === '#') {
        return color;
    }
    var digits = /(.*?)rgb\((\d+), (\d+), (\d+)\)/.exec(color);
    
    var red = parseInt(digits[2]);
    var green = parseInt(digits[3]);
    var blue = parseInt(digits[4]);
    
    var rgb = blue | (green << 8) | (red << 16);
    return digits[1] + '#' + rgb.toString(16);
};

// Init
$(function () {

	/* ----- Color picker ----- */
	
	// Init values
	if (!$("#field_<?php echo $_present['status-link_color'];?>").val()) $("#field_<?php echo $_present['status-link_color'];?>").val(colorToHex($("a").css("color")));
	if (!$("#field_<?php echo $_present['status-background_color'];?>").val()) $("#field_<?php echo $_present['status-background_color'];?>").val(colorToHex($("body").css("background-color")));
	
	$.each(['<?php echo $_present['status-link_color'];?>', '<?php echo $_present['status-background_color'];?>'], function (idx, cls) {
		$("#field_" + cls)
			.after('<div id="status-' + cls + '-colorpicker" style="display:none" />')
			.focus(function () {
				$("#status-" + cls + "-colorpicker").show();
			})
			.blur(function () {
				$("#status-" + cls + "-colorpicker").hide();
			})
		;
		$("#status-" + cls + "-colorpicker").farbtastic("#field_" + cls);
	});
	
	/* ----- Background image ----- */
	$("#field_<?php echo $_present['status-background_image'];?>-clear").click(function () {
		$("#field_<?php echo $_present['status-background_image'];?>").val('');
		$("#field_<?php echo $_present['status-background_image'];?>-preview img:first").attr("src", '').hide();
		return false;
	});
	if ($("#field_<?php echo $_present['status-background_image'];?>-preview img:first").attr("src")) $("#field_<?php echo $_present['status-background_image'];?>-preview img:first").show();
	else $("#field_<?php echo $_present['status-background_image'];?>-preview img:first").hide();
	
	/* ----- Hacks ------ */
	
	// Form enctype hack, because there's no hook to do it normally
	$("#profile-edit-form").attr("enctype", "multipart/form-data");
	
	/* ----- Tmp hacks -----*/
	// Apply radio field classes
	$(
		"#field_<?php echo $_present['status-background_attachment'];?>," +
		"#field_<?php echo $_present['status-background_position'];?>," +
		"#field_<?php echo $_present['status-background_repeat'];?>"
	).find("label").addClass("inline-label");
	// Throw in some inline CSS, temporarily
	$(".inline-label").css({
		"display": "inline",
		"margin-left": "10px"
	});
	// Replace the group editing title
	$("#profile-edit-form>h4:first").text('<?php echo esc_js(status_get_design_group_name()); ?>');
});
})(jQuery);
</script>
<?php
}
add_action('bp_after_profile_edit_content', 'status_custom_javascript');

/*** User Stats function - member/single member-header.php display */
function bp_member_profile_stats_member_status() {
	echo bp_member_profile_stats_get_member_status();
}
	
function bp_member_profile_stats_get_member_status() {	
		if ( !bp_is_active( 'activity' ) )
		return;
		
		$total_count = bp_member_profile_stats_get_member_status_count();
		
		if ( $total_count == 0 ) {
			$content = '<li>' . __( ' No updates', 'bp-member-profile-stats' ) . '</li>';
		} else if ( $total_count == 1 ) {
			$content = '<li><span class="status-count">'. $total_count .'</span>' . __( ' update', 'status' ) . '</li>';
		} else {
			$content = '<li><span class="status-count">'. $total_count .'</span>' . __( ' updates', 'status' ) . '</li>';
		}
		
		return apply_filters( 'bp_member_profile_stats_get_member_status', $content, $total_count );
	
	}

function bp_member_profile_stats_get_member_status_count( $user_id = false ) {
	global $bp, $wpdb;
	
	if ( !$user_id )
		$user_id = ( $bp->displayed_user->id ) ? $bp->displayed_user->id : $bp->loggedin_user->id;
	
	$total_count = $wpdb->get_var( $wpdb->prepare( "SELECT count(a.id) FROM {$bp->activity->table_name} a WHERE a.user_id = {$user_id} AND type = 'activity_update' AND a.component = '{$bp->activity->id}'" ) );
	
	if ( !$total_count )
		$total_count == 0;
	
	return $total_count;
}

function bp_member_profile_stats_member_posts() {
	echo bp_member_profile_stats_get_member_posts();
}

function bp_member_profile_stats_get_member_posts() {
	
		if ( !bp_is_active( 'forums' ) )
			return;
		
		$total_count = bp_member_profile_stats_get_member_post_count();
		
		if ( $total_count == 0 ) {
			$content = '<li>' . __( ' No forum posts', 'bp-member-profile-stats' ) . '</li>';
		} else if ( $total_count == 1 ) {
			$content = '<li><span class="post-count">'. $total_count .'</span>' . __( ' forum post', 'status' ) . '</li>';
		} else {
			$content = '<li><span class="post-count">'. $total_count .'</span>' . __( ' forum posts', 'status' ) . '</li>';
		}
		
		return apply_filters( 'bp_member_profile_stats_get_member_posts', $content, $total_count );
}
	
function bp_member_profile_stats_get_member_post_count( $user_id = false ) {
	global $bp, $wpdb, $bbdb;
	
	do_action( 'bbpress_init' );
			
	if ( !$user_id )
		$user_id = ( $bp->displayed_user->id ) ? $bp->displayed_user->id : $bp->loggedin_user->id;
			
	$total_count = $wpdb->get_var( $wpdb->prepare( "SELECT count(post_id) FROM {$bbdb->posts} WHERE poster_id = {$user_id} AND post_status = 0" ) );
		
	if ( !$total_count )
		$total_count == 0;
	
	return $total_count;
}

function bp_member_profile_stats_member_topics() {
	echo bp_member_profile_stats_get_member_topics();
}
	
function bp_member_profile_stats_get_member_topics() {
	
		if ( !bp_is_active( 'forums' ) )
			return;
		
		$total_count = bp_forums_total_topic_count_for_user();
		
		if ( $total_count == 0 ) {
			$content = '<li>' . __( ' No forum topics', 'bp-member-profile-stats' ) . '</li>';
		} else if ( $total_count == 1 ) {
			$content = '<li><span class="topic-count">'. $total_count .'</span>' . __( ' forum topic', 'status' ) . '</li>';
		} else {
			$content = '<li><span class="topic-count">'. $total_count .'</span>' . __( ' forum topics', 'status' ) . '</li>';
		}
		
		return apply_filters( 'bp_member_profile_stats_get_member_topics', $content, $total_count );
}

function bp_member_profile_stats_member_comments() {
	echo bp_member_profile_stats_get_member_comments();
}
	function bp_member_profile_stats_get_member_comments() {
		
		$total_count = bp_member_profile_stats_get_member_comment_count();
		
		if ( $total_count == 0 ) {
			$content = '<li>' . __( ' No blog comments', 'bp-member-profile-stats' ) . '</li>';
		} else if ( $total_count == 1 ) {
			$content = '<li><span class="comment-count">'. $total_count .'</span>' . __( ' blog comment', 'status' ) . '</li>';
		} else {
			$content = '<li><span class="comment-count">'. $total_count .'</span>' . __( ' blog comments', 'status' ) . '</li>';
		}
		
		return apply_filters( 'bp_member_profile_stats_get_member_comments', $content, $total_count );
}

function bp_member_profile_stats_get_member_comment_count( $user_id = false ) {
	global $bp, $wpdb;
	
	if ( !$user_id )
		$user_id = ( $bp->displayed_user->id ) ? $bp->displayed_user->id : $bp->loggedin_user->id;
			
	$total_count = $wpdb->get_var( $wpdb->prepare( "SELECT count( comment_ID ) FROM {$wpdb->comments} WHERE comment_approved = 1 AND user_id = {$user_id}" ) );
		
	if ( !$total_count )
		$total_count == 0;
	
	return $total_count;
}

function status_display_member_stats() {?>
	<div id="member-stats">
		<ul>
		<?php  bp_member_profile_stats_member_status(); ?>
		<?php  bp_member_profile_stats_member_posts(); ?>
		<?php	 bp_member_profile_stats_member_topics(); ?>
		<?php  bp_member_profile_stats_member_comments(); ?>
		</ul>
	</div>
<?php
}
add_action('status_stats', 'status_display_member_stats');

?>