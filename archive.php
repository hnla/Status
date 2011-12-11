<?php

/**
 * Template Name: Status - Archive
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header(); ?>
<div id="content" role="main">
	<?php if ( have_posts() ) the_post(); ?>
		<header class="post-header">
		<h1 class="post-title">
		<?php if ( is_day() ) : ?>
			<?php printf( __( 'Daily Archives: <span>%s</span>', 'status'), get_the_date() ); ?>
		<?php elseif ( is_month() ) : ?>
			<?php printf( __( 'Monthly Archives: <span>%s</span>', 'status'), get_the_date( 'F Y' ) ); ?>
		<?php elseif ( is_year() ) : ?>
			<?php printf( __( 'Yearly Archives: <span>%s</span>', 'status'), get_the_date( 'Y' ) ); ?>
		<?php else : ?>
			<?php _e( 'Blog Archives', 'status'); ?>
	<?php endif; ?>
	</h1>
	</header>
	<?php bp_dtheme_content_nav( 'nav-above' ); ?>
	<?php
	rewind_posts();
	while ( have_posts() ) : the_post();
		get_template_part( 'content', get_post_format() );
	endwhile;
		bp_dtheme_content_nav( 'nav-below' );
	?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>