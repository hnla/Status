<?php
/**
 * Content - link
 *
 * @package Status
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="author-box">		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>		<p><?php printf( _x( 'by %s', 'Post written by...', 'status' ), str_replace( '<a href=', '<a rel="author" href=', bp_core_get_userlink( $post->post_author ) ) ); ?></p>	</div>
			<div class="post-format"><?php _e( 'Link', 'status' ); ?></div>
	<section class="post-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'status' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( '<span>Pages:</span>', 'status' ), 'after' => '</div>' ) ); ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php _e( 'Permlink', 'status'); ?></a>
		</section>
	<?php endif; ?>
	<footer class="post-meta">
			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'status' ), __( '1 Comment', 'status' ), __( '% Comments', 'status' ) ); ?>
			</div>
		<?php endif; ?>
	</footer>
</article>