<?php

/**
 * Template Name: Status - Single
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header(); ?>
<div id="content" role="main">
	<?php do_action( 'bp_before_blog_single_post' ) ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
		get_template_part( 'content', 'single' );
		comments_template( '', true ); 
	endwhile; ?>
	<?php do_action( 'bp_after_blog_single_post' ) ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer() ?>