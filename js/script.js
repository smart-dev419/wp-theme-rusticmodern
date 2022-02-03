
/**  browser update notification  **/
var $buoop = {vs:{i:9,f:30,o:20,s:7},c:2}; 
function $buo_f(){ 
 var e = document.createElement("script"); 
 e.src = "//browser-update.org/update.min.js"; 
 document.body.appendChild(e);
};
try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
catch(e){window.attachEvent("onload", $buo_f)}
/**  browser update notification  **/


var win_width, win_height, site_url, theme_url;

jQuery(document).ready(function() {	
	win_width = parseInt(jQuery(window).width());
	win_height = parseInt(jQuery(window).height());

	site_url = jQuery("#site_url").val();
	theme_url = jQuery("#theme_url").val();

	jQuery(".internal_link").click(function(event){
		scroll_animation(this, event, 2000);
		return false;
	});


	jQuery('#primany-nav').meanmenu({
		meanMenuContainer: '#site-sidebar',
		meanScreenWidth: "766",
		meanMenuCloseSize: "30px"
	});

	ctrl_main_height();

});	


jQuery(window).load(function() {
	
});


jQuery(window).resize(function() {
	win_width = parseInt(jQuery(window).width());
	win_height = parseInt(jQuery(window).height());

	ctrl_main_height();
});


function scroll_animation(linkobj, event, delay)
{
	jQuery('html, body').stop().animate({
		scrollTop: parseInt(jQuery(jQuery(linkobj).attr('href')).offset().top)
	}, delay,'easeInOutExpo');
	event.preventDefault();
	return false;
}

function ctrl_main_height() {
	var main_height = parseInt(jQuery("#site-main").outerHeight());
	var footer_height = parseInt(jQuery("#site-footer").outerHeight());
	var sidebar_height = parseInt(jQuery("#site-sidebar").outerHeight());
	if (win_width >= 767) {
		if ( (main_height+footer_height) < sidebar_height ) {
			var set_main_height = sidebar_height - footer_height;
			jQuery("#site-main").css("height", set_main_height+"px");
		} else {
			jQuery("#site-main").css("height", "auto");
		}
	} else {
		if ( (main_height+footer_height+sidebar_height) < win_height ) {
			var set_main_height = win_height - footer_height - sidebar_height;
			jQuery("#site-main").css("height", set_main_height+"px");
		} else {
			jQuery("#site-main").css("height", "auto");
		}
	}
}



