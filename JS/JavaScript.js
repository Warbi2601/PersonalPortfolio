$(window).on('resize', function (ev) {
	//console.info(window.innerWidth);
	if (window.innerWidth > 600) {
		$('nav ul').attr('style', '');
	};
});

/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
	$("#mySidenav").css({ "box-shadow": "250px 0px 150px 300px rgba(0, 0, 0, 1)", "width": "50%" });
	//document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
	$('#mySidenav').css({ "box-shadow": "none" });
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft = "0";
	document.body.style.backgroundColor = "white";
}

$(document).ready(function () {
	$('.lastUpdated').text("Page Last Updated: " + new Date(document.lastModified).toLocaleDateString("en-GB"));
	$('#currentYear').text(new Date().getFullYear());

	$(".BannerCont-scroll").click(function (){
		$('html, body').animate({
			scrollTop: $(".mainPage").offset().top
		}, 1000);
	});
});

var handleScroll = function () {
	// Get the height of the div
	var heroHeight = document.querySelector('#BannerCont').offsetHeight;
	var diagonal = document.querySelector('.BannerCont-diagonal polygon');
	// Calculate the skew value
	var skew = (window.scrollY / heroHeight) * 75;
	// Assign the skew value to the polygon points attr
	// The value needs to be set as an array
	diagonal.setAttribute('points', [0, 100, 100, skew, 100, 100]);
}

window.addEventListener("scroll", handleScroll);


$('#contactPopup').on('click', function () {
	if($('#contactPopup').hasClass('open')) {
		$('#contactPopupForm').fadeOut("500");
		$('#contactPopup').removeClass('open');
	} else {
		$('#contactPopupForm').fadeIn("500");
		$('#contactPopup').addClass('open');
	}
});

$('#sendMessage').click(function (ev) {
	ev.preventDefault();
	var name = $('#name').val();
	var email = $('#email').val();
	var phoneNumber = $('#phoneNumber').val();
	var message = $('#message').val();

	if(validateForm(name, email, phoneNumber, message)){
		sendMessage(name, email, phoneNumber, message);
	}
});

function sendMessage(name, email, phoneNumber, message) {
	$.post('/personalportfolio/sendmail.php', { name: name, email: email, phoneNumber: phoneNumber, message: message }, 
	function (data) {

	});
}

function validateForm(name, email, phoneNumber, message) {
	var isName = validateName(name);
	var isEmail = validateEmail(email);
	var isPhoneNumber = validatePhoneNumber(phoneNumber);
	var isMessage = validateMessage(message);
	if(isName && isEmail && isPhoneNumber && isMessage){
		return true;
	}
	else return false;
}

function validateName(name) {
	if(name == "") {
		handleError('#name');
		return false; 
	}
	else {
		removeError('#name');
		return true;
	}
}

function validateEmail(email) {
	if(email == "") {
		handleError('#email');
		return false; 
	}
	else {
		removeError('#email');
		return true;
	}
}

function validatePhoneNumber(phoneNumber) {
	if(phoneNumber == "") {
		handleError('#phoneNumber');
		return false; 
	}
	else {
		removeError('#phoneNumber');
		return true;
	}
}

function validateMessage(message) {
	if(message == "") {
		handleError('#message');
		return false; 
	}
	else {
		removeError('#message');
		return true;
	}
}

function removeError(errorID) {
	if ($(errorID).parent().children().length === 2) {
		$(errorID).removeClass("formErrorMsg");
		var parent = $(errorID).parent()[0];
		parent.removeChild(parent.lastChild);
	}
}

function handleError(errorID) {
	if ($(errorID).parent().children().length <= 1) {

		$(errorID).addClass("formErrorMsg");
		var parent = $(errorID).parent()[0];
		var errorMsg = $("<p>")[0];
		var errorName = $(errorID).attr('errorName')
		errorMsg.classList.add("errorMsg");
		errorMsg.innerHTML = "You need to input a " + errorName;
		$(parent).append(errorMsg);

	}
}

// Checks to see if the passed node is a child of a node
function childOf(node, ancestor) {
	var child = node;
	while (child !== null) {
		if (child === ancestor) return true;
		try {
			if (child === ancestor) return true;
		}
		catch (e) {
		}
		child = child.parentNode;
	}
	return false;
}

// code for closing contact me popout when the user clicks outside the box
window.onmousedown = function (event) {
	var icon = document.getElementById('contactPopup');
	var form = document.getElementById('contactPopupForm');

	if(event.target != icon && !childOf(event.target, icon)) {
		if($('#contactPopupForm').css('display') == 'block') {
			if (icon !== event.target && !childOf(event.target, icon) 
			&& form !== event.target && !childOf(event.target, form)) {
				toggleContactPopup();
			}
		}
	}
}