// JavaScript Document
$(document).ready(function(){ // Doc ready

$("#username").bind("keyup input paste", function() {
	var username = $("#username").val();
	username = username.replace(/[^A-Za-z0-9.]/g, "");
	$("#vanityname").html(username);
});

$.validator.addMethod("loginRegex1", function(value, element) {
	return this.optional(element) || /^[a-z0-9\.\s]+$/i.test(value);
}, "Username must contain only letters, numbers, or periods.");

$.validator.addMethod("loginRegex2", function(value, element) {
	return this.optional(element) || /^[a-z\d]+(?:\.[a-z\d]+)*$/i.test(value);
}, "Username cannot begin or end with a period.");


$("#username").change(function() {
	var username = $("#username").val();
	$.ajax({
		url: "/resources/ajax/indiprofile_availability.php",
		data: {'username': username},
		type: "POST",
		success: function(data) {
			if(data == "1") {
				$("#vanityname_a").html("<span id='vanityname_u'>" + username + "</span> is available!");
				 $("#vanityname_a").addClass("available");
				 $("#vanityname_a").removeClass("unavailable");
				 $("#username_confirm").show();
			} else if(data == "0") {
				$("#vanityname_a").html("Sorry, <span id='vanityname_u'>" + username + "</span> is unavailable");
				$("#vanityname_a").addClass("unavailable");
				$("#vanityname_a").removeClass("available");
				$("#username_confirm").hide();
			} else {
				$("#vanityname_a").html("");
				$("#vanityname_a").removeClass("available");
				$("#vanityname_a").removeClass("unavailable");
				$("#username_confirm").show();
			}
		}
	});
});


$(".validateme").each(function() {
$(this).validate({
	rules: {
		"username": {
			required: true,
			minlength: 3,
			maxlength: 30,
			loginRegex1: true,
			loginRegex2: true
		}
    },
	messages: {
		d_b: "",
		m_b: "",
		y_b: "",
		"username": {
			required: "Please enter a username",
			loginRegex1: "Username format not valid",
			loginRegex2: "Username format not valid"
         }
	}				 
}); 
}); 

$('.firstfield').focus();
$('.firstfield').parent().addClass("focused");
$('.indifield').focus(function () {
	$(this).parent().addClass("focused");
});
$('.indifield').blur(function () {
	$(this).parent().removeClass("focused");
});
$('.required').focus(function () {
	$(this).parent().addClass("req");
});
$('.required').blur(function () {
	$(this).parent().removeClass("req");
});
$('.reqconf_this').focus(function () {
	$(this).parent().addClass("reqconf");
});
$('.reqconf_this').blur(function () {
	$(this).parent().removeClass("reqconf");
});
$('#recaptcha_response_field').focus(function () {
	$(this).closest('li').addClass("focused req");
});
$('#recaptcha_response_field').blur(function () {
	$(this).closest('li').removeClass("focused req");
});
$("#recaptcha_response_field").addClass("indifield");
$("#recaptcha_table").addClass("bgwhite");
$("#recaptcha_response_field").removeAttr("style");

$("#recaptcha_reload_btn, #recaptcha_switch_audio_btn, #recaptcha_whatsthis_btn").attr("tabindex", -1); // Fix tabindex
$("fieldset:last").addClass("lastfieldset");
}); // Doc ready
var RecaptchaOptions = {
theme: 'clean'
};