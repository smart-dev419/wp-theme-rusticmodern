jQuery(document).ready(function() {	
	jQuery(".members_ctrl .ctrl_btn.more").click(function(){
		if (jQuery(this).hasClass("more")) {
			var request_url = jQuery('#theme_url').val()+'/ajax/get_members.php';
			var parent_obj  = jQuery(this).closest(".team");
			getarticles_bycategory(parent_obj, request_url);
			jQuery(this).addClass("less");
			jQuery(this).removeClass("more");
			jQuery(this).text("show less");
		} else if (jQuery(this).hasClass("less")) {
			jQuery(".team_members li:nth-child(n+5)").remove();
			jQuery(this).addClass("more");
			jQuery(this).removeClass("less");
			jQuery(this).text("show more");
		}

	});
});	


function getarticles_bycategory(parent_obj, request_url)
{
	jQuery.ajax({
			type	: "POST",
			cache	: false,
			url		: request_url,
			dataType    : 'html',
			error: function(a,b,c){alert(b);},
			success: function(data) {
				parent_obj.find(".team_members").append(data);
			}
	});	
}
