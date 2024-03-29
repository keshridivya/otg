$('.one_time_service_submit').click(function () {
	let one_eng_name = $('.one_eng_name').val();
	let one_desc = $('.one_desc').val();

	if (one_eng_name == '' || one_desc == '') {
		$('.error_message').html('Please fill all field').addClass('alert alert-danger');
	}
});



$(document).ready(function () {

	$('.display_otp').css('display', 'none');
	$('.send_otp').click(function () {
		$('.display_otp').css('display', 'block');
	});

	$('#spanengineer_name').hide();
	$('#spanengineer_contact').hide();
	$('#spanengineer_email').hide();
	$('#spanengineer_otp').hide();

	let engname_error = true;
	let engconnect_error = true;
	let email_error = true;
	let otp_error = true;

	$('#engineer_name').keyup(function () {
		validateengName();
	});

	function validateengName() {
		let bookname = $('#engineer_name').val();
		let booktext = /^[A-Za-z ]+$/;
		if (bookname.length == '') {
			$('#spanengineer_name').show().css('color', 'red');
			engname_error = false;
			return false;
		} else if (!booktext.test(bookname)) {
			$('#spanengineer_name').show().html('** Enter Alphabets only').css('color', 'red');
			engname_error = false;
			return false;
		} else {
			$('#spanengineer_name').hide();
		}
	}

	//contact
	$('#engineer_contact').keyup(function () {
		validateengcontact();
	});

	function validateengcontact() {
		let bookcontact = $('#engineer_contact').val();
		let booknumber = /^[0-9-+]+$/;

		if (bookcontact.length == '') {
			$('#spanengineer_contact').show().css('color', 'red');
			engconnect_error = false;
			return false;
		} else if (!booknumber.test(bookcontact)) {
			$('#spanengineer_contact').show().css('color', 'red').html('** Enter Only number');
			engconnect_error = false;
			return false;
		} else if (bookcontact.length != '10') {
			$('#spanengineer_contact').show().css('color', 'red').html('** Enter Only 10 digit number');
			engconnect_error = false;
			return false;
		} else {
			$('#spanengineer_contact').hide();
		}
	}

	//email
	$('.engineer_email').keyup(function () {
		validateengineeremail();

	});

	function validateengineeremail() {
		let bookemail = $('.engineer_email').val();
		if (bookemail.length == '') {
			$('#spanengineer_email').show().css('color', 'red');
			email_error = false;
			return false;
		} else {
			$('#spanengineer_email').hide();
		}
	}

	//otp
	$('.engineer_otp').keyup(function () {
		validateengotp();
	});

	function validateengotp() {
		let bookemail = $('.engineer_otp').val();
		if (bookemail.length == '') {
			$('#spanengineer_otp').show().css('color', 'red');
			otp_error = false;
			return false;
		} else {
			$('#spanengineer_otp').hide();
		}
	}

	// Submit button
	$(".engineer_submit").click(function () {
		engname_error = true;
		engconnect_error = true;
		email_error = true;
		otp_error = true;

		validateengName();
		validateengcontact();
		validateengineeremail();
		validateengotp();
		if (engname_error == true && engconnect_error == true && email_error == true && otp_error == true) {
			return true;

		} else {
			return false;
		}
	});


});

//pincode 
$(document).ready(function(){
	$('.pincodecheck').click(function(){
        let bookpin=$('#pincode').val();
        let zipRegex = /^\d{6}$/;
        if(bookpin.length==''){
            $('.message').show().css('color','red').html('** Please enter 6 digits pincode');
            pin_error = false;
            return false;
        }
        else if(!zipRegex.test(bookpin)){
            $('.message').show().css('color','red').html('** pincode should only be 6 digits');
            pin_error = false;
            return false;
        }
        else{
            $('.message').hide();
        }
	});
})
//generate invoice
$(document).ready(function () {

	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var current = 1;
	var steps = $(".fieldset").length;

	setProgressBar(current);

	$(".next").click(function () {

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		//Add Class Active
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

		//show the next fieldset
		next_fs.show();
		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function (now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				next_fs.css({
					'opacity': opacity
				});
			},
			duration: 500
		});
		setProgressBar(++current);
	});

	$(".previous").click(function () {

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({
			opacity: 0
		}, {
			step: function (now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
					'display': 'none',
					'position': 'relative'
				});
				previous_fs.css({
					'opacity': opacity
				});
			},
			duration: 500
		});
		setProgressBar(--current);
	});

	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
	}

	// $(".submit").click(function () {
	// 	return false;
	// })

});



$(document).ready(function(){
	$('#coupon_add').click(function(){
		let code = $('#code').val();
		let pname = $('#pname').val();
		let plan = $('#plan').val();
		let percent = $('#percent').val();
		let expiry = $('#expiry').val();
		let ct_status = $('#ct_status').val();
		if(code == '' || pname == '' || plan == '' || percent == '' || expiry == '' || ct_status == '' ){
			alert('Please fill all the field');
			return false;
		}
		else{
			return true;
		}
	})
})





