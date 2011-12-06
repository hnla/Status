<?php

/**
 * Template Name: Status - Home Page
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header(); ?>

			<?php if ( !is_user_logged_in() ) : ?>
				<div id="content-home" role="main">
					<article class="status-block-signup">
						<?php get_template_part('homepage', 'signup');?>
					</article>
				</div><!-- / #content -->
			<?php endif; ?>
			
			<?php if ( is_user_logged_in() ) : ?>
				<div id="content-home-loggedout" role="main">	
					<article class="status-block-activity">		
						<h2><?php _e('Welcome ', 'status') ?><?php echo   bp_core_get_userlink( bp_loggedin_user_id() ); ?></h2>
						<?php locate_template( array( 'activity/post-form.php'), true ); ?>					
						<div class="activity" role="main">
						<?php locate_template( array( 'activity/activity-loop.php' ), true ); ?>
						</div><!-- .activity -->
					</article>
				</div><!-- / #content -->
			<?php endif; ?>
<?php get_footer( ); ?>