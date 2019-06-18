$(window).on('resize', function(ev){
	//console.info(window.innerWidth);
	if(window.innerWidth > 600){
		$('nav ul').attr('style','');	
	};
});

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
	$("#mySidenav").css({"box-shadow": "250px 0px 150px 300px rgba(0, 0, 0, 1)", "width": "50%"});
	//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
	$('#mySidenav').css({"box-shadow": "none"});
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}

$(document).ready(function() {
	$('.lastUpdated').text("Page Last Updated: " + new Date(document.lastModified).toLocaleDateString("en-GB"));
});

var handleScroll = function() {
	// Get the height of the div
	var heroHeight = document.querySelector('#BannerCont').offsetHeight;
	var diagonal = document.querySelector('.BannerCont-diagonal polygon');
	// Calculate the skew value
	var skew = (window.scrollY / heroHeight) * 75;
	// Assign the skew value to the polygon points attr
	// The value needs to be set as an array
	diagonal.setAttribute('points', [0,100, 100, skew, 100,100]);
  }
  window.addEventListener("scroll", handleScroll);

  $('#contactPopup').click(function() {
	  $('#contactPopupForm').toggle("fast");
  });