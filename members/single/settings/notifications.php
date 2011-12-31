<?php
/**
* BuddyPress - Notification settings
 *
 * @package BP Default
 * @subpackage Status
 * @since Status 1.0
 */
?>


<?php get_header( 'status' ) ?>

<div id="content-profile-headerfull">
			<?php do_action( 'bp_before_member_settings_template' ); ?>

			<div id="item-header">

				<?php locate_template( array( 'members/single/member-header.php' ), true ); ?>

			</div><!-- #item-header -->

	</div>	
			<div id="content">
			<div id="item-body" class="primary" role="main">

				<?php do_action( 'bp_before_member_body' ); ?>

			
				<h3><?php _e( 'Email Notification', 'status' ); ?></h3>

				<?php do_action( 'bp_template_content' ) ?>

				<form action="<?php echo bp_displayed_user_domain() . bp_get_settings_slug() . '/notifications'; ?>" method="post" class="standard-form" id="settings-form">
					<p><?php _e( 'Send a notification by email when:', 'status' ); ?></p>

					<?php do_action( 'bp_notification_settings' ); ?>

					<?php do_action( 'bp_members_notification_settings_before_submit' ); ?>

					<div class="submit">
						<input type="submit" name="submit" value="<?php _e( 'Save Changes', 'status' ); ?>" id="submit" class="auto" />
					</div>

					<?php do_action( 'bp_members_notification_settings_after_submit' ); ?>

					<?php wp_nonce_field('bp_settings_notifications'); ?>

				</form>

				<?php do_action( 'bp_after_member_body' ); ?>

			</div><!-- #item-body -->

			<?php do_action( 'bp_after_member_settings_template' ); ?>

	</div><!-- #content -->

<?php get_sidebar( 'status' ) ?>

<?php get_footer( 'status' ) ?>