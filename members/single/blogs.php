<?php
/**
* BuddyPress - Users Blogs
*
 * @package BP Default
 * @subpackage Status
 * @since Status 1.0
 */
?>


<?php do_action( 'bp_before_member_blogs_content' ); ?>

<div class="blogs myblogs primary" role="main">

	<?php locate_template( array( 'blogs/blogs-loop.php' ), true ); ?>

</div><!-- .blogs.myblogs -->

<?php do_action( 'bp_after_member_blogs_content' ); ?>
