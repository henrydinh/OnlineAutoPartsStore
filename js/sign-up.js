$(document).ready(function() {
	
	function validateRegisterForm() {
		var email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		$("#firstNameRequired").hide();
		$("#lastNameRequired").hide();
		$("#emailAddressNotValid").hide();
		$("#passwordNotValid").hide();

		$("#firstName").focusout(function(){
			if(!(/^[a-zA-Z]+$/.test($(this).val())) || $(this).val().length < 1){
				//document.getElementById("firstNameRequired").style.visibility = "visible";
				//$(this).addClass('invalidBorderClass');
				$("#firstNameRequired").show();
			} else{
				//document.getElementById("firstNameRequired").style.visibility = "hidden";
				$("#firstNameRequired").hide();
				//$(this).removeClass('invalidBorderClass');
			}
		});

		$("#lastName").focusout(function(){
			if(!(/^[a-zA-Z]+$/.test($(this).val())) || $(this).val().length < 1){
				//document.getElementById("lastNameRequired").style.visibility = "visible";
				// $(this).addClass('invalidBorderClass');
				$("#lastNameRequired").show();
			}else{
				//document.getElementById("lastNameRequired").style.visibility = "hidden";
				$("#lastNameRequired").hide();
			   // $(this).removeClass('invalidBorderClass');
			}
		});

		$("#email").focusout(function(){
			if(email.test($(this).val())){
				//document.getElementById("emailAddressNotValid").style.visibility = "hidden";
				$("#emailAddressNotValid").hide();
				//$(this).removeClass('invalidBorderClass');
			}else{
				//document.getElementById("emailAddressNotValid").style.visibility = "visible";
				$("#emailAddressNotValid").show();
				//$(this).addClass('invalidBorderClass');
			}
		});

		$("#password").focusout(function(){
			if($(this).val().length >= 8){
				//document.getElementById("passwordNotValid").style.visibility = "hidden";
				$("#passwordNotValid").hide();
				//$(this).removeClass('invalidBorderClass');
			}else{
				//document.getElementById("passwordNotValid").style.visibility = "visible";
				//$(this).addClass('invalidBorderClass');
				$("#passwordNotValid").show();
			}
		});
	}
	
	// validate register form
	validateRegisterForm();

	// Initially hide alert box
	$('#register_alert_box').hide();
	
	// call submitForm function for the submitHandler
	$('#register_form').validate({
		submitHandler: submitRegisterForm
	});
	
	function submitRegisterForm(){
		// serialize the form
		var data = $('#register_form').serialize();
		// use AJAX to verify register details with database
		$.ajax({
			type: 'POST',
			url: 'register.php',
			data: data,
			success: function(result){
				var str_result = str = result.replace(/\r?\n|\r/g, " ");
				str_result = str_result.trim();
				console.log(str_result);
				if(str_result == "ok"){
					window.location = 'my-account.html';
				}else{	
					$('#register_alert_box').text(result);
					$('#register_alert_box').hide().fadeIn('fast').delay(5000).fadeOut('fast');
				}
			}
		});
		return false;
	}
});