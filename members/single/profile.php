<?php
/**
 * BuddyPress - User profile
 *
 * @package BP Default
 * @subpackage Status
 * @since Status 1.0
 */
?>


<?php do_action( 'bp_before_profile_content' ); ?>

<div class="edit-profile primary" role="main">

	<?php
		// Profile Edit
		if ( bp_is_current_action( 'edit' ) )
			locate_template( array( 'members/single/profile/edit.php' ), true );

		// Change Avatar
		elseif ( bp_is_current_action( 'change-avatar' ) )
			locate_template( array( 'members/single/profile/change-avatar.php' ), true );

		// Display XProfile
		elseif ( bp_is_active( 'xprofile' ) )
			locate_template( array( 'members/single/profile/profile-loop.php' ), true );

		// Display WordPress profile (fallback)
		else
			locate_template( array( 'members/single/profile/profile-wp.php' ), true );
	?>

</div><!-- .profile -->

<?php do_action( 'bp_after_profile_content' ); ?>