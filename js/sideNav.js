function openNav(){
	$("#overlay").show();
	$(".sideNavContent").show();
	document.getElementById("sideNav").style.width = "250px";
	var hamburgerIcon = $("#hamburgerIcon");
	hamburgerIcon.attr("onclick","closeNav()");
	hamburgerIcon.animate({left: '210px'});
	hamburgerIcon.fadeOut(function() {
		$(this).html('&times;').fadeIn();
	});
}

function closeNav(){
	$("#overlay").hide();
	$(".sideNavContent").hide();
	document.getElementById("sideNav").style.width = "0px";
	var hamburgerIcon = $("#hamburgerIcon");
	hamburgerIcon.attr("onclick","openNav()");
	hamburgerIcon.animate({left: '0px'});
	hamburgerIcon.fadeOut(function() {
		$(this).html("&#9776;").fadeIn();
	});
}