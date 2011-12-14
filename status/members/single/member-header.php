<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<?php do_action( 'bp_before_member_header' ); ?>

<div id="profile-left">
	<div id="item-header-avatar">
		<a href="<?php bp_user_link(); ?>">

		<?php bp_displayed_user_avatar( 'type=full' ); ?>

		</a>
	</div><!-- #item-header-avatar -->

	<div id="item-header-content">
	<h2>
		<a href="<?php bp_displayed_user_link(); ?>"><?php bp_displayed_user_fullname(); ?></a>
	</h2>

	<span class="user-nicename">@<?php bp_displayed_user_username(); ?></span>
	<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

	<?php do_action( 'bp_before_member_header_meta' ); ?>

		<div id="item-meta">

		<?php if ( bp_is_active( 'activity' ) ) : ?>

			<div id="latest-update">

				<?php bp_activity_latest_update( bp_displayed_user_id() ); ?>

			</div>

		<?php endif; ?>
		</div>

		<div id="item-buttons">

			<?php do_action( 'bp_member_header_actions' ); ?>

		</div><!-- #item-buttons -->
		
	</div>
</div>	
<div id="profile-right">

	<?php
	/***
	 * If you'd like to show specific profile fields here use:
	 * bp_profile_field_data( 'field=About Me' ); -- Pass the name of the field
	 */
	 do_action( 'bp_profile_header_meta' );

	 ?>

<div id="item-nav">
			<nav class="item-list-tabs no-ajax" id="object-nav" role="navigation">
				<ul>

					<?php bp_get_displayed_user_nav(); ?>

					<?php do_action( 'bp_member_options_nav' ); ?>

				</ul>
			</nav>
		</div><!-- #item-nav -->
		
		
		<?php
		
		if ( bp_is_user_activity() || !bp_current_component() ) :
		?>
		<div id="activity-navigation">
		<nav class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>

				<?php bp_get_options_nav() ?>

				<li id="activity-filter-select" class="last">
					<label for="activity-filter-by"><?php _e( 'Show:', 'status' ); ?></label>
					<select id="activity-filter-by">
						<option value="-1"><?php _e( 'Everything', 'status' ) ?></option>
						<option value="activity_update"><?php _e( 'Updates', 'status' ) ?></option>

						<?php
						if ( !bp_is_current_action( 'groups' ) ) :
							if ( bp_is_active( 'blogs' ) ) : ?>

								<option value="new_blog_post"><?php _e( 'Posts', 'status' ) ?></option>
								<option value="new_blog_comment"><?php _e( 'Comments', 'status' ) ?></option>

							<?php
							endif;

							if ( bp_is_active( 'friends' ) ) : ?>

								<option value="friendship_accepted,friendship_created"><?php _e( 'Friendships', 'status' ) ?></option>

							<?php endif;

						endif;

						if ( bp_is_active( 'forums' ) ) : ?>

							<option value="new_forum_topic"><?php _e( 'Forum Topics', 'status' ) ?></option>
							<option value="new_forum_post"><?php _e( 'Forum Replies', 'status' ) ?></option>

						<?php endif;

						if ( bp_is_active( 'groups' ) ) : ?>

							<option value="created_group"><?php _e( 'New Groups', 'status' ) ?></option>
							<option value="joined_group"><?php _e( 'Group Memberships', 'status' ) ?></option>

						<?php endif;

						do_action( 'bp_member_activity_filter_options' ); ?>

					</select>
				</li>
			</ul>
		</nav><!-- .item-list-tabs -->
		</div>
		<?php
		 elseif ( bp_is_user_blogs() ) :
		?>
		<div class="item-list-tabs" id="subnav" role="navigation">
			<ul>

				<?php bp_get_options_nav(); ?>

				<li id="blogs-order-select" class="last filter">

					<label for="blogs-all"><?php _e( 'Order By:', 'status' ); ?></label>
					<select id="blogs-all">
						<option value="active"><?php _e( 'Last Active', 'status' ); ?></option>
						<option value="newest"><?php _e( 'Newest', 'status' ); ?></option>
						<option value="alphabetical"><?php _e( 'Alphabetical', 'status' ); ?></option>

						<?php do_action( 'bp_member_blog_order_options' ); ?>

					</select>
				</li>
			</ul>
		</div><!-- .item-list-tabs -->
		
		<?php

		elseif ( bp_is_user_friends() ) :
		?>
		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>
				<?php if ( bp_is_my_profile() ) bp_get_options_nav(); ?>

				<?php if ( !bp_is_current_action( 'requests' ) ) : ?>

					<li id="members-order-select" class="last filter">

						<label for="members-all"><?php _e( 'Order By:', 'status' ) ?></label>
						<select id="members-all">
							<option value="active"><?php _e( 'Last Active', 'status' ) ?></option>
							<option value="newest"><?php _e( 'Newest Registered', 'status' ) ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'status' ) ?></option>

							<?php do_action( 'bp_member_blog_order_options' ) ?>

						</select>
					</li>

				<?php endif; ?>

			</ul>
		</div>
		<?php

		elseif ( bp_is_user_groups() ) :
		?>
		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>
				<?php if ( bp_is_my_profile() ) bp_get_options_nav(); ?>

				<?php if ( !bp_is_current_action( 'invites' ) ) : ?>

					<li id="groups-order-select" class="last filter">

						<label for="groups-sort-by"><?php _e( 'Order By:', 'status' ); ?></label>
						<select id="groups-sort-by">
							<option value="active"><?php _e( 'Last Active', 'status' ); ?></option>
							<option value="popular"><?php _e( 'Most Members', 'status' ); ?></option>
							<option value="newest"><?php _e( 'Newly Created', 'status' ); ?></option>
							<option value="alphabetical"><?php _e( 'Alphabetical', 'status' ); ?></option>

							<?php do_action( 'bp_member_group_order_options' ) ?>

						</select>
					</li>

				<?php endif; ?>

			</ul>
		</div><!-- .item-list-tabs -->
		
		<?php

		elseif ( bp_is_user_messages() ) :
		?>
		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>

				<?php bp_get_options_nav(); ?>

			</ul>
		</div><!-- .item-list-tabs -->
		<?php

		elseif ( bp_is_user_profile() ) :
		?>
		<?php if ( bp_is_my_profile() ) : ?>

			<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
				<ul>

					<?php bp_get_options_nav(); ?>

				</ul>
			</div><!-- .item-list-tabs -->

		<?php endif; ?>
		<?php

		elseif ( bp_is_user_forums() ) :
		?>
		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>
				<?php bp_get_options_nav() ?>

				<li id="forums-order-select" class="last filter">

					<label for="forums-order-by"><?php _e( 'Order By:', 'status' ); ?></label>
					<select id="forums-order-by">
						<option value="active"><?php _e( 'Last Active', 'status' ); ?></option>
						<option value="popular"><?php _e( 'Most Posts', 'status' ); ?></option>
						<option value="unreplied"><?php _e( 'Unreplied', 'status' ); ?></option>

						<?php do_action( 'bp_forums_directory_order_options' ); ?>

					</select>
				</li>
			</ul>
		</div><!-- .item-list-tabs -->
		<?php

		elseif ( bp_is_user_settings() ) :
		?>
		<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
			<ul>
				<?php if ( bp_is_my_profile() ) : ?>

					<?php bp_get_options_nav(); ?>
					<?php do_action( 'bp_member_plugin_options_nav' ); ?>
				<?php endif; ?>
			</ul>
		</div>
		<?php

		// If nothing sticks, load a generic template
		else :
			locate_template( array( 'members/single/plugins.php'   ), true );

		endif;
		
		?>
	</div>
<?php do_action( 'bp_after_member_header' ); ?>

<?php do_action( 'template_notices' ); ?>