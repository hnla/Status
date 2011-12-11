<?php

/**
 * Template Name: Status - Content gallery
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<hgroup>
			<div class="post-format"><?php _e( 'Gallery', 'status' ); ?></div>
			<h1 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'status' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		</hgroup>
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
	</footer>
</article>