jQuery(document).ready(function() {	
	jQuery(".portfolios_ctrl .ctrl_btn.more").click(function(){
		if (jQuery(this).hasClass("more")) {
			var request_url = jQuery('#theme_url').val()+'/ajax/get_portfolios.php';
			var parent_obj  = jQuery(this).closest(".portfolios");
			var page_id  = jQuery(this).attr("page-id");
			get_portfolios(parent_obj, page_id, request_url);
			jQuery(this).addClass("less");
			jQuery(this).removeClass("more");
			jQuery(this).text("show less");
		} else if (jQuery(this).hasClass("less")) {
			jQuery(".portfolio_list li:nth-child(n+19)").remove();
			jQuery(this).addClass("more");
			jQuery(this).removeClass("less");
			jQuery(this).text("show more");
		}

	});

	portfolios_ctrl();
});	


function get_portfolios(parent_obj, page_id, request_url)
{
	post_data = {
		page_id : page_id
	};
	jQuery.ajax({
			type	: "POST",
			cache	: false,
			url		: request_url,
			data    : post_data, 
			dataType    : 'html',
			error: function(a,b,c){alert(b);},
			success: function(data) {
				parent_obj.find(".portfolio_list").append(data);
			}
	});	
}


function portfolios_ctrl() {
	jQuery(".portfolio_list .port_thumb").live("click", function() {
		jQuery(".portfolio_list .port_details").slideUp(1);
		var details_obj = jQuery(this).parent().find(".port_details");
		var details_height = details_obj.outerHeight();
		details_obj.slideDown();
		jQuery(".portfolios").css("height", details_height+"px");
	});		
	jQuery(".return_portfolio a").live("click", function() {
		jQuery(".portfolio_list .port_details").slideUp();
		jQuery(".portfolios").css("height", "auto");
	});	
}