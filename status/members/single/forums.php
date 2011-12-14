<?php

/**
 * BuddyPress - Users Forums
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>



<?php

if ( bp_is_current_action( 'favorites' ) ) :
	locate_template( array( 'members/single/forums/topics.php' ), true );

else :
	do_action( 'bp_before_member_forums_content' ); ?>

	<div class="forums myforums">

		<?php locate_template( array( 'forums/forums-loop.php' ), true ); ?>

	</div>

	<?php do_action( 'bp_after_member_forums_content' ); ?>

<?php endif; ?>
