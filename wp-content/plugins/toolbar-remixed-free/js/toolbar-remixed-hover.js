
var $jq = jQuery.noConflict();
$jq(document).ready(function() {
 
	$jq("ul#wp-admin-bar-root-default").animate({ height: "show", opacity: "show" }, "fast" );
 	$jq("ul#wp-admin-bar-top-secondary").animate({ height: "show", opacity: "show" }, "fast" );
	$jq("div#wpadminbar").animate({ height: "show", opacity: "show" }, "fast" );
 	$jq("ul.ab-top-menu").animate({ height: "show", opacity: "show" }, "fast" );
	$jq("a.screen-reader-shortcut").hide();  // hide the screen reader shortcut, but when to show it?
	
	$jq("div#wpadminbar").mouseleave( function(){
		$jq("div.ab-sub-wrapper").hide();
	});
	
	$jq("ul#wp-admin-bar-top-secondary > li#wp-admin-bar-search").mouseenter( function(e) {
		e.stopPropagation();
	    e.preventDefault();
		
		$jq("#wpadminbar #adminbarsearch .adminbar-input").animate({  width: "200px" }, "fast" );
		$jq("#wpadminbar #adminbarsearch .adminbar-button").animate({ opacity: "show" }, "fast" );
	
	});
	$jq("ul#wp-admin-bar-top-secondary > li#wp-admin-bar-search").mouseleave( function(e) {
		e.stopPropagation();
	    e.preventDefault();
		
		$jq("#wpadminbar #adminbarsearch .adminbar-input").animate({  width: "20px" }, "fast" );
		$jq("#wpadminbar #adminbarsearch .adminbar-button").animate({ opacity: "hide" }, "fast" );
	});
	$jq("ul.ab-top-menu > li.menupop > a[aria-haspopup=true]").mouseenter( function(e){
		e.stopPropagation();
	    e.preventDefault();
		
		// Show the new menu
		$jq(this).next("div.ab-sub-wrapper").animate({ height: "toggle", opacity: "toggle" }, "fast" );
		
		// Hide other menus
$jq("ul.ab-top-menu > li.menupop > a[aria-haspopup=true]").not(this).parents().children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide" }, "fast" );
$jq("ul.ab-top-menu > li.menupop > div[aria-haspopup=true]").parent("li").children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide" }, "fast" );			
$jq("ul.ab-submenu > li.menupop").children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide" }, "fast" );
    });
    
	$jq("ul.ab-top-menu > li.menupop > div[aria-haspopup=true]").mouseenter( function(e) {
		e.stopPropagation();
	    e.preventDefault();
		
		// Show the new menu
		$jq(this).next("div.ab-sub-wrapper").animate({ height: "toggle", opacity: "toggle" }, "fast" );
		
		// Hide other menus
$jq("ul.ab-top-menu > li.menupop > a[aria-haspopup=true]").not(this).parents().children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide" }, "fast" );
$jq("ul.ab-top-menu > li.menupop > div[aria-haspopup=true]").not(this).parent("li").children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide" }, "fast" );			
    });
    
	$jq("ul.ab-submenu > li.menupop > a[aria-haspopup=true]").mouseenter( function(e){
		e.stopPropagation();
	    e.preventDefault();
		
		// Hide other menus
		var thisul = $jq(this).parent("ul.ab-submenu");
		var thisli = $jq(this).parents("li.menupop");
		var nextsubwrap = $jq(this).next("div.ab-sub-wrapper");
		
		$jq("ul.ab-submenu").not(thisul).children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide"}, "fast" );
		$jq("ul.ab-submenu > li.menupop").not(thisli).children("div.ab-sub-wrapper").animate({ height: "hide", opacity: "hide"}, "fast" );
		
		// Show new menu
		$jq(this).next("div.ab-sub-wrapper").animate({ width: "show", opacity: "show" }, "fast" );
    });
return false;
});
