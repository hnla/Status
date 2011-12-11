<?php

/**
 * Template Name: Status - Content single
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<h1 class="post-title"><?php the_title(); ?></h1>
	</header>
	<div class="post-body">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'status'), 'after' => '</div>' ) ); ?>
	</div>
	<footer class="post-meta">
		<div class="post-date"><?php echo get_the_date(); ?></div>
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
			<?php edit_post_link( __( 'Edit &rarr;', 'status'), ' <span class="edit-link">', '</span> | ' ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'status'); ?></a>
	</footer>
	<?php if ( get_the_author_meta( 'description' ) ) :  ?>
		<div class="post-meta-author">
			<div class="author-info">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>
				<?php printf( _x( 'by %s', 'Post written by...', 'status' ), str_replace( '<a href=', '<a rel="author" href=', bp_core_get_userlink( $post->post_author ) ) ); ?>
				<div class="author-description">
					<h3><?php printf( __( 'Author: %s', 'status' ), "<a href='" . get_author_posts_url( get_the_author_meta( 'ID' ) ) . "' title='" . esc_attr( get_the_author() ) . "' rel='me'>" . get_the_author() . "</a>" ); ?></h3>
					<p><?php the_author_meta( 'description' ); ?></p>
				</div>
			</div>
		</div>
	<?php endif; ?>
</article>