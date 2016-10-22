jQuery(".accordion").accordion({header: "h3.accordion-title", heightStyle: "content"});
jQuery("h3.accordion-title").toggle(
	function(){
		jQuery(this).find("i").addClass("fa-arrow-circle-up").removeClass("fa-arrow-circle-down");
	},
	function() {
		jQuery(this).find("i").removeClass("fa-arrow-circle-up").addClass("fa-arrow-circle-down");
	}
);