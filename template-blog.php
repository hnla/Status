<?php
/**
 * Blog template
 *
 * @package Status
 * @since 1.0
 */
 /*
 Template Name: blog
 */
?>

<?php get_header(); ?>
<div id="content" class="primary" role="main">
	<?php do_action( 'bp_before_blog' ) ?>
	<?php bp_dtheme_content_nav( 'nav-above' ); ?>
	<?php
	rewind_posts();
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=&showposts=10&paged=$page");
	while ( have_posts() ) : the_post();
		do_action( 'bp_before_blog_post' );
		get_template_part( 'content', get_post_format() );
		do_action( 'bp_after_blog_post' );
	endwhile;
		bp_dtheme_content_nav( 'nav-below' );
	?>
	<?php do_action( 'bp_after_blog' ) ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>