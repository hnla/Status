/**
* status scripts
*/

jQuery(document).ready( function() {
// bring input focus to input.focus for old browsers if html5 autofocus not supported
  if (!("autofocus" in document.createElement("input"))) {
    jQuery('.focus').focus();
  }
// Show / Hide activity comments
jQuery('li.load-more a').click(  function(){
			jq.post( ajaxurl, {
				action: 'activity_get_older_updates'
			},
			function()
			{
			jQuery('.activity-comments').hide();
			jQuery('.activity-entry').addClass('hide-comments');
			jQuery('a.close-comments').hide();
			show_comment();
			hide_comment();
			}, 'json' );
});

jQuery('.activity-comments').hide();
jQuery('.activity-entry').addClass('hide-comments');
jQuery('a.close-comments').hide();
show_comment();
hide_comment();
function show_comment(){
		jQuery('.button').on('click', function(){
			if(jQuery(this).parents('.activity-entry').children('.activity-comments').css('display') == 'none'){
				jQuery(this).addClass('comments-visible');
				jQuery(this).parents('.activity-entry').children('.activity-comments').slideDown('2000');
				jQuery(this).hide();
				jQuery(this).siblings('a.close-comments').show();
			}
		});
}
function hide_comment() {		
		jQuery('a.close-comments').on('click', function() {
		jQuery(this).parents('.activity-entry').children('.activity-comments').slideUp('2000');
		jQuery(this).addClass('close-up');
		jQuery(this).hide();
		jQuery(this).siblings('a.show-comments').show();
		});
}



/*************************************/
/*
jQuery('.activity-entry .activity-comments').hide();
jQuery('.activity-entry').addClass('hide-comments');

	function showSubNav(t) {

		//alert($(this).parent().attr("class"));

		jQuery(this).addClass("active");
				jQuery(this).html(  'Hide Comments');

		jQuery(this).parents(".activity-content").siblings(".activity-comments").slideDown(2000);

	}

		function hideSubNav(t) {

		jQuery(this).removeClass("active");
				jQuery(this).html(  'Show Comments');

		jQuery(this).parents(".activity-content").siblings(".activity-comments").slideUp(2000);

	}
	jQuery("#show-comments").toggle(showSubNav, hideSubNav);
*/


});