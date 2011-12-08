<!DOCTYPE html>
<!--[if lt IE 7 ]>	<html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>			<html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>			<html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>			<html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ) ?>; charset=<?php bloginfo( 'charset' ) ?>" />
		
		<!-- we ought to use the newer html5 charset but could cause issues, tbc 
		<meta charset="<?php bloginfo( 'charset' ) ?>" />
		-->
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php do_action( 'bp_head' ) ?>

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>" />

		<?php
			if ( is_singular() && bp_is_blog_page() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
	</head>

	<body <?php body_class() ?> id="status-default">
		<?php do_action( 'bp_before_header' ) ?>
			
<!--			<nav id="primary-navigation" class="clearfix" role="navigation">
				<?php // do_action('status_before_nav_ul'); ?>
				 <ul>
				 	<li><a href="/activity">Activity</a></li>
					<li></li>
					<?php // do_action('status_inside_nav_ul'); ?>
				 </ul>
				<?php // do_action('status_after_nav_ul'); ?>
			</nav>
-->
		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>
		
		<div id="content-wrapper">
		