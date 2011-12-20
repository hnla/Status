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

		<div id="header-wrapper">
			<header>
				<div id="branding" role="banner">
					<h1 id="logo"><a href="<?php echo home_url(); ?>" title="<?php _ex( 'Home', 'Home page banner link title', 'status' ); ?>"><?php bp_site_name(); ?></a></h1>
				</div>
				<nav id="primary-navigation" role="navigation">
					<?php wp_nav_menu( array( 'container' => false, 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
				</nav>
				<?php do_action( 'bp_header' ) ?>
			</header>
		</div>

		<?php do_action( 'bp_after_header' ) ?>
		<?php do_action( 'bp_before_container' ) ?>
		
		<div id="container">
		
	<?php
	// header serach bar elements removed until known what to do with
	
	if(1 > 2 )	{?>
							<form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
							<label for="search-terms" class="accessibly-hidden"><?php _e( 'Search for:', 'status' ); ?></label>
							<input type="text" id="search-terms" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" />

							<?php echo bp_search_form_type_select() ?>

							<input type="submit" name="search-submit" id="search-submit" value="<?php _e( 'Search', 'status' ) ?>" />

							<?php wp_nonce_field( 'bp_search_form' ) ?>

						</form><!-- #search-form -->

				<?php do_action( 'bp_search_login_bar' ) ?>
<?php	}?>
