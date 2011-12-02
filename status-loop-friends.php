<?php
global $members_template, $bp;
		$user = $bp->loggedin_user->id;
				if( bp_has_members('user_id=' . $user . '') ) : ?>
					
					<ul id="friends-list" class="looplist">
		<?php	while ( bp_members() ) : bp_the_member(); ?>
						<li>
							<div class="item-avatar"><a href="<?php bp_member_permalink() ?>"><?php  bp_member_avatar() ?></a></div>
						</li>				 
		
		<?php endwhile; ?>
					</ul>			
			
<?php else: ?>
						<p style="color: #fff;"><?php //var_dump($bp) ?>---Clearly you are Billy no mates and have no friends!</p>
			
<?php endif;
			

?>			