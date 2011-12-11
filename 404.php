<?php

/**
 * Template Name: Status - 404
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header(); ?>
<div id="content" role="main">
	<article class="post error404 not-found">
			<header class="post-header">
		<h1 class="post-title"><?php _e( 'Not Found', TEMPLATE_DOMAIN); ?></h1>
		</header>
		<div class="post-body">
			<p><?php _e( 'Sorry we could not find that page.', TEMPLATE_DOMAIN); ?></p>
				<?php get_search_form(); ?>
		</div>
	</article>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>