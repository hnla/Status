<?php

/**
 * Template Name: Status - Home Page
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header( 'status' ); ?>
	
	<div id="content" role="main">
<!--		<div id="status-update"></section> ??!!?? -->
		<section id="status-update"></section>
		<div id="status-archive">	
			<section class="status-block">
			<?php if ( !is_user_logged_in() ) : ?>
			<h1>this is the home page - a logged out view</h1>
				<p>This view would likely be simply a nice implementation of the bp sign up 
				form, perhaps a text area intro block to describe the site along with maybe sidebar 
				showing simple member avatars all things to be considered and decided upon.</p>
				
				<?php get_template_part('homepage', 'signup');?>
			
			<?php endif; ?>
			
			<?php if ( is_user_logged_in() ) : ?>
				<h1>Home page  - logged in view</h1>
				<p>Idealy when we are logged in this page view is the main activity stream 
				directory view or user profile, so a means needs to be found of doing a 
				re-direct to these pages or simply doing away with bp activity directory and 
				building a new activity loop in this home page under the logged in section. This of course has possible ramifications on how we handle bp pages for components.</p>
			<?php endif; ?>
			</section>
		</div>
	</div><!-- / #content -->
	<?php get_sidebar( 'status' ); ?>
	<?php get_footer( 'status' ); ?>