/**
* status scripts
*/

// Show / Hide activity comments
jQuery(document).ready( function() {
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
jQuery('.activity-entry .activity-comments').hide();
jQuery('.activity-entry').addClass('hide-comments');
var is_hidden = true;
jQuery('.show-comments').bind('click',function(){});

//	jQuery(this).addClass('comments-visible');
//		if(is_hidden == false){
		jQuery(this).click(function(){
//		alert(is_hidden);
		if(is_hidden == true){
		jQuery('.activity-comments').slideDown('2000');
		is_hidden = false;
		}
		if(is_hidden == false) {
		jQuery('.show-comments').click(function(){
		jQuery('.activity-comments').slideUp('2000');
		});
		}
		//is_hidden = true;
		//});
//	 },function() {
		//if(is_hidden == true){
		//jQuery(this).click(function(){
		
		jQuery('.activity-comments').slideUp('2000');
		//is_hidden = true;
		
//		});
//	}
	return false;
});






});