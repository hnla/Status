<?php

/**
 * Template Name: Status - Home Page
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header( 'status' ); ?>
<div id="content-wrap">
	<div id="content" role="main">
<!--		<div id="status-update"></section> ??!!?? 
		<section id="status-update"></section>-->
		<section id="status-home-intro">	
			
			
			<?php if ( !is_user_logged_in() ) : ?>
			<article class="status-block-signup">
				<h1>this is the home page - a logged out view</h1>
					<p>This view would likely be simply a nice implementation of the bp sign up 
					form, perhaps a text area intro block to describe the site along with maybe sidebar 
					showing simple member avatars all things to be considered and decided upon.</p>
				
				<?php get_template_part('homepage', 'signup');?>
			</article>
			<?php endif; ?>
			
			<?php if ( is_user_logged_in() ) : ?>
			<article class="status-block-activity">
			
				<h2><?php _e('Welcome ', 'status') ?><?php echo   bp_core_get_userlink( bp_loggedin_user_id() ); ?></h2>
				
					<?php locate_template( array( 'activity/post-form.php'), true ); ?>
				
					<div class="activity" role="main">

					<?php locate_template( array( 'activity/activity-loop.php' ), true ); ?>

					</div><!-- .activity -->
			
			
			</article>
			<?php endif; ?>

		
		</section>
	</div><!-- / #content -->
</div><!-- / #content-wrap -->
	
	<?php if( is_user_logged_in() ) : ?>
	<?php get_sidebar( 'status' ); ?>
	<?php endif; ?>
	
	<?php get_footer( 'status' ); ?>