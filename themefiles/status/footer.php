		</div> <!-- #container -->

		<?php do_action( 'bp_after_container' ) ?>
		<?php do_action( 'bp_before_footer' ) ?>

		<footer id="site-footer">
			
			<?php if ( is_active_sidebar( 'first-footer-widget-area' ) || is_active_sidebar( 'second-footer-widget-area' ) || is_active_sidebar( 'third-footer-widget-area' ) || is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
				<div id="footer-widgets-block">
					<?php get_sidebar( 'footer' ) ?>
				</div>
			<?php endif; ?>
			
			<?php if(has_nav_menu('footer')): ?>
				<nav id="secondary-nav">
					<?php wp_nav_menu(array('sort_column' => 'menu_order', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'footer')) ?>
				</nav><!-- / #footer-nav -->
			<?php endif; ?>
					
			<div id="site-generator" role="contentinfo">
				<?php do_action( 'bp_dtheme_credits' ) ?>
				<p><?php printf( __( 'Proudly powered by <a href="%1$s">WordPress</a> and <a href="%2$s">BuddyPress</a>.', 'buddypress' ), 'http://wordpress.org', 'http://buddypress.org' ) ?></p>
			</div>

			<?php do_action( 'bp_footer' ) ?>
		
		</footer><!-- #footer -->

		<?php do_action( 'bp_after_footer' ) ?>

		<?php wp_footer(); ?>
		</div><!-- / #wrapper -->
	</body>

</html>