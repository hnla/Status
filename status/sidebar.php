<?php

/**
 * Status - Sidebar
 *
 * @package Status
 * @subpackage BP child theme
 */

?>
<?php do_action( 'bp_before_sidebar' ) ?>
<div id="sidebar" role="complementary">
	<?php do_action( 'bp_inside_before_sidebar' ) ?>
	<?php do_action( 'bp_before_sidebar_me' ) ?>
	<div id="sidebar-me">
		<section id="friends-loop">
			<div class="widget">
				<h3 class="widgettitle"><?php _e( 'Your Friends', 'status' ) ?></h3>
				<?php status_showfriends();?>
			</div>
		</section>
		<?php do_action( 'bp_sidebar_me' ) ?>
	</div>
<!--<?php do_action( 'bp_after_sidebar_me' ) ?>
	<?php do_action( 'bp_inside_before_sidebar' ) ?>

	<?php /* Show forum tags on the forums directory */
	if ( bp_is_active( 'forums' ) && bp_is_forums_component() && bp_is_directory() ) : ?>
		<div id="forum-directory-tags" class="widget tags">
			<h3 class="widgettitle"><?php _e( 'Forum Topic Tags', 'status' ) ?></h3>
			<div id="tag-text"><?php bp_forums_tag_heat_map(); ?></div>
		</div>
	<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar' ) ?>

	<?php do_action( 'bp_inside_after_sidebar' ) ?>
	</div>
<?php do_action( 'bp_after_sidebar' ) ?>

