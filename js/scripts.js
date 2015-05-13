// Menu toggle on mobile

jQuery(document).ready(function($) {
	$("#menu-main .menu-item").click(function() {
	   if($(this).hasClass("on"))
	   {
	      $(this).removeClass("on");
	   }
	   else
	   {
	      $(this).addClass("on");
	   }
	});
});