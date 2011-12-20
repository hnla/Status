<?php

/**
 * Status - Content gallery
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="author-box">		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '50' ); ?>		<p><?php printf( _x( 'by %s', 'Post written by...', 'status' ), str_replace( '<a href=', '<a rel="author" href=', bp_core_get_userlink( $post->post_author ) ) ); ?></p>	</div>
	<header class="post-header">
		<hgroup>
			<div class="post-format"><?php _e( 'Gallery', 'status' ); ?></div>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</hgroup>
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
	<?php if ( is_search() ) : ?>
	<div class="post-summary">
		<?php the_excerpt( __( 'View the gallery', 'status' ) ); ?>
	</div>
	<?php else : ?>
	<div class="post-body">
		<?php if ( post_password_required() ) : ?>
		<?php the_content( __( 'View the gallery', 'status' ) ); ?>
		<?php else : ?>
		<?php $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
		if ( $images ) :
			$total_images = count( $images );
			$image = array_shift( $images );
			$image_img_tag = wp_get_attachment_image( $image->ID, 'medium' ); ?>
		<figure class="gallery-thumb">
				<a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
		</figure>
		<?php endif; ?>
			<p class="post-pictures"><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>', $total_images, 'status' ), 'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"', number_format_i18n( $total_images )); ?></p>
		<?php endif; ?>
			<?php the_excerpt(); ?>
	</div>
	<?php endif; ?>
	<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( '<span>Pages:</span>', 'status' ), 'after' => '</div>' ) ); ?>		
	<footer class="post-meta">
			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( __( '<span class="leave-reply">Comment</span>', 'status' ), __( '1 Comment', 'status' ), __( '% Comments', 'status' ) ); ?>
			</div>
		<?php endif; ?>
	</footer>
</article>