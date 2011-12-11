<?php

/**
 * Template Name: Status - Content video
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<hgroup>
			<div class="post-format"><?php _e( 'Video', 'status' ); ?></div>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</hgroup>
	</header>
	<?php if ( is_search() || (is_page_template('blogsnews.php') ) ) : ?>
		<div class="post-summary">
			<?php the_excerpt(); ?>
		</div>
		<?php else : ?>
		<div class="post-body">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'status' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( '<span>Pages:</span>', 'status' ), 'after' => '</div>' ) ); ?>
		</div>
	<?php endif; ?>
	<footer class="post-meta">
		<div class="post-date"><?php echo get_the_date(); ?></div>
		<div class="post-author"><?php _e( 'by', 'status'); ?> <?php the_author() ?></div>
		<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'status' ), __( '1 Comment', 'status' ), __( '% Comments', 'status' ) ); ?>
			</div>
		<?php endif; ?>
		<div class="post-categories">
			<?php _e( 'Categories: ', 'status'); ?><?php the_category( ' ' ); ?>
		</div>
		<div class="post-tags">
			<?php $tags_list = get_the_tag_list( '', ', ' ); 
			if ( $tags_list ): ?>
				<?php printf( __( 'Tags: %2$s', 'status'), 'tag-links', $tags_list ); ?> | 
			<?php endif; ?>
		</div>
		<div class="post-edit">
				<?php edit_post_link( __( 'Edit &rarr;', 'status'), ' <span class="edit-link">', '</span> | ' ); ?>
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'status'); ?></a>
		</div>
	</footer>
</article>