<?php
/**
 * Content - image
 *
 * @package BP Default
 * @subpackage Status
 * @since Status 1.0
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="author-box">		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>		<p><?php printf( _x( 'by %s', 'Post written by...', 'status' ), str_replace( '<a href=', '<a rel="author" href=', bp_core_get_userlink( $post->post_author ) ) ); ?></p>	</div>	
			<div class="post-format"><?php _e( 'Image', 'status' ); ?></div>
	<header class="post-header">
			<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<div class="post-info">
			<?php printf( __( '%1$s <span>in %2$s</span>', 'status' ), get_the_date(), get_the_category_list( ', ' ) ); ?>
			<span class="post-utility alignright"><?php edit_post_link( __( 'Edit this entry', 'status' ) ); ?></span>
			<span class="post-tags alignright">
				<?php $tags_list = get_the_tag_list( '', ', ' ); 
				if ( $tags_list ): ?>
				<?php printf( __( 'Tags: %2$s', 'status'), 'tag-links', $tags_list ); ?> | 
				<?php endif; ?>
			</span>	
			<span class="post-action alignright">
				<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'status'); ?></a>
			</span>
			
		</div>
	</header>
	<?php if ( is_search()) : ?>
		<section class="post-summary">
			<?php the_excerpt(); ?>
		</section>
	<?php else : ?>
		<section class="post-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'status' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( '<span>Pages:</span>', 'status' ), 'after' => '</div>' ) ); ?>
		</section>
	<?php endif; ?>
	<footer class="post-meta">
			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'status' ), __( '1 Comment', 'status' ), __( '% Comments', 'status' ) ); ?>
			</div>
		<?php endif; ?>
</article>