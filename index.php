<?php

/**
 * Template Name: Status - Home Page
 *
 * @package Status
 * @subpackage BP child theme
 */

?>

<?php get_header(); ?>

			<?php if ( !is_user_logged_in() ) : ?>
				<div id="content-home" role="main">
					<article class="status-signup clearfix">
						<section id="signup-login">
						<?php do_action( 'bp_before_sidebar_login_form' ) ?>

							<h2>Sign in</h2>
								<form name="login-form" id="primary-login-form" class="standard-form" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>" method="post">
									<p class="control-pairs your-name">
										<label for="site-user-login"><?php _e( 'Username', 'buddypress' ) ?></label>
										<input type="text" name="log" id="site-user-login" class="input focus" value="<?php if ( isset( $user_login) ) echo esc_attr(stripslashes($user_login)); ?>"   required />
									</p>
									
									<p class="control-pairs your-pass">
										<label for="site-user-pass"><?php _e( 'Password', 'buddypress' ) ?></label>
										<input type="password" name="pwd" id="site-user-pass" class="input" value="" required />
									</p>
									
									<p class="control-pairs forgetmenot">
										<label for="site-rememberme"><input name="rememberme" type="checkbox" id="site-rememberme" value="forever"  /> <?php _e( 'Remember Me', 'buddypress' ) ?></label>
									</p>

									<?php do_action( 'bp_sidebar_login_form' ) ?>
									<input type="submit" name="wp-submit" id="sidebar-wp-submit" value="<?php _e( 'Log In', 'buddypress' ); ?>"  />
									<input type="hidden" name="testcookie" value="1" />
								</form>

								<?php do_action( 'bp_after_sidebar_login_form' ) ?>
						</section>
						<section id="signup-register">
							<h2>... or register</h2>
								<?php if ( bp_get_signup_allowed() ) : ?>

									<p id="login-text">

										<?php printf( __( 'Please <a href="%s" title="Create an account">create an account</a> to get started.', 'buddypress' ), site_url( bp_get_signup_slug() . '/' ) ) ?>

									</p>

								<?php endif; ?>
							
						</section>
					</article>
				</div><!-- / #content -->
			<?php endif; ?>
			
			<?php if ( is_user_logged_in() ) : ?>
						<?php locate_template( array( 'activity/index.php' ), true ); ?>			
			<?php endif; ?>
<?php get_footer( ); ?>