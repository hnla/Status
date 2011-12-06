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
						<?php locate_template( array( 'activity/index.php' ), true ); ?>			
			<?php endif; ?>
<?php get_footer( ); ?>