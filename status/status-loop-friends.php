<?php
global $members_template, $bp;
$user = $bp->loggedin_user->id;
if( is_user_logged_in() ) : 
				if( bp_has_members('user_id=' . $user . '') && $user !== 0 ) : ?>
					
					<ul id="friends-list" class="looplist"><?php // echo '<li style="color: #fff;">' . $user . '</li>' ?>
					<?php	while ( bp_members() ) : bp_the_member(); ?>
						<li>
							<div class="item-avatar"><a href="<?php bp_member_permalink() ?>"><?php  bp_member_avatar('type=full&width=30&height=30') ?></a></div>
						</li>				 
		
					<?php endwhile; ?>
					</ul>			
			
<?php else: ?>
						<p>Oh deary me you don't seem to have any friends.  Start connecting by friending people and get involved in the community.</p>
			
<?php endif;
			
endif;
?>			