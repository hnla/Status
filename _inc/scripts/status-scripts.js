/**
* status scripts
*/

// Show / Hide activity comments
jQuery(document).ready( function() {

jQuery('.activity-comments').hide();
jQuery('.activity-entry').addClass('hide-comments');
jQuery('a.close-comments').hide();
var is_hidden = true;
	
		jQuery('.button').click(function(){
		if(jQuery(this).parents('.activity-entry').children('.activity-comments').css('display') == 'none'){
		jQuery(this).addClass('comments-visible');
		jQuery(this).parents('.activity-entry').children('.activity-comments').slideDown('2000');
		//jQuery(this).removeClass('show-comments');
		jQuery(this).hide();
		jQuery(this).siblings('a.close-comments').show();
		
		is_hidden = false;
		}
		});
//if(jQuery(this).parents('.activity-entry').children('.activity-comments').css('display') == 'block'){
		jQuery('a.close-comments').bind('click',function() {
		//alert(is_hidden);
		jQuery(this).parents('.activity-entry').children('.activity-comments').slideUp('2000');
		jQuery(this).addClass('close-up');
		jQuery(this).hide();
		jQuery(this).siblings('a.show-comments').show();


		});


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