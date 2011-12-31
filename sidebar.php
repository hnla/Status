<?php
/**
 * Sidebar
 *
 * @package BP Default
 * @subpackage Status
 * @since Status 1.0
 */
?>

<?php do_action( 'bp_before_sidebar' ) ?>
<div id="sidebar" class="secondary widget-area" role="complementary">
	<?php do_action( 'bp_inside_before_sidebar' ) ?>
	<?php do_action( 'bp_before_sidebar_me' ) ?>
	<section id="sidebar-me">
		<aside id="friends-loop">
			<div class="widget">
				<h3 class="widgettitle"><?php _e( 'Your Friends', 'status' ) ?></h3>
				<?php status_showfriends();?>
			</div>
		</aside>
		<?php do_action( 'bp_sidebar_me' ) ?>
	</section>
	<?php do_action( 'bp_after_sidebar_me' ) ?>
	<?php do_action( 'bp_inside_before_sidebar' ) ?>

	<?php /* Show forum tags on the forums directory */
	if ( bp_is_active( 'forums' ) && bp_is_forums_component() && bp_is_directory() ) : ?>
		<aside id="forum-directory-tags" class="widget tags">
			<h3 class="widgettitle"><?php _e( 'Forum Topic Tags', 'status' ) ?></h3>
			<div id="tag-text"><?php bp_forums_tag_heat_map(); ?></div>
		</aside>
	<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar' ) ?>

	<?php do_action( 'bp_inside_after_sidebar' ) ?>
	</div>
<?php do_action( 'bp_after_sidebar' ) ?>
