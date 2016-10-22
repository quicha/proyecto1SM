jQuery(".toggle-box").hide(); 
jQuery(".toggle").toggle(
	function(){
		jQuery(this).find("i").addClass("fa-minus-square").removeClass("fa-plus-square");
	},
	function() {
		jQuery(this).find("i").removeClass("fa-minus-square").addClass("fa-plus-square");
	}
);
jQuery(".toggle").click(function(){
	jQuery(this).next(".toggle-box").slideToggle();
});