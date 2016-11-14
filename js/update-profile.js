$(document).ready(function() {

	function validateLoginForm() {
		// span notifications initially hidden
		$('#username_notification').hide();
		$('#password_notification').hide();
		$('#confirmed_password_notification').hide();
		
		// Detect when username field loses focus
		$('#email').focusout(function(){
			// username field text value
			var username_value = $('#email').val();
			// Regular expression for email validation
			var regex = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
			
			// check if field is empty
			if(username_value == ""){
				$('#username_notification').hide();
			}else if(regex.test(username_value)){
				// If field is non-empty and the form field validates using regular expression
				$('#username_notification').removeClass('login_validation_bad').addClass('login_validation_good');
				$('#username_notification').text("Email address valid");
				$('#username_notification').show();
			}else{
				// If field is non-empty and isn't valid
				$('#username_notification').removeClass('login_validation_good').addClass('login_validation_bad');
				$('#username_notification').text("Email address invalid");
				$('#username_notification').show();
			}
		});
		
		// Detect when password field gains focus
		$('#password').focusin(function(){
			$('#password_notification').removeClass().addClass('info');
			$('#password_notification').text("Minimum of 8 characters");
			$('#password_notification').show();
		});
		
		// Detect when password field loses focus
		$('#password').focusout(function(){
			// password field text value
			var password_value = $('#password').val();
			
			// check if field is empty
			if(password_value == ""){
				$('#password_notification').hide();
			}else if(password_value.length >= 8){
				// If field is non-empty and the field value has length of at least 8 
				$('#password_notification').removeClass('login_validation_bad').addClass('login_validation_good');
				$('#password_notification').text("Password valid");
				$('#password_notification').show();
			}else{
				// If field is non-empty and isn't valid
				$('#password_notification').removeClass('login_validation_good').addClass('login_validation_bad');
				$('#password_notification').text("Password invalid");
				$('#password_notification').show();
			}
		});
		
		// Detect when confirmed password field gains focus
		$('#confirm_password').focusin(function(){
			$('#confirmed_password_notification').removeClass().addClass('info');
			$('#confirmed_password_notification').text("Minimum of 8 characters");
			$('#confirmed_password_notification').show();
		});
		
		// Detect when confirmed password field loses focus
		$('#confirm_password').focusout(function(){
			// password field text value
			var confirmed_password_value = $('#confirm_password').val();
			var password_value = $('#password').val();
			
			// check if field is empty
			if(confirmed_password_value == ""){
				$('#confirmed_password_notification').hide();
			}else if(confirmed_password_value.length >= 8){
				// If field is non-empty and the field value has length of at least 8 
				if(confirmed_password_value == password_value){
					$('#confirmed_password_notification').removeClass('login_validation_bad').addClass('login_validation_good');
					$('#confirmed_password_notification').text("Password valid");
					$('#confirmed_password_notification').show();
				}else{
					$('#confirmed_password_notification').removeClass('login_validation_good').addClass('login_validation_bad');
					$('#confirmed_password_notification').text("Confirmed password and New password do not match");
					$('#confirmed_password_notification').show();
				}
			}else{
				// If field is non-empty and isn't valid
				$('#confirmed_password_notification').removeClass('login_validation_good').addClass('login_validation_bad');
				$('#confirmed_password_notification').text("Password invalid");
				$('#confirmed_password_notification').show();
			}
		});
	}
	
	// validate login form
	validateLoginForm();
	
	// Initially hide alert box
	$('#profile_alert_box').hide();
	
	// call submitForm function for the submitHandler
	$('#profile_form').validate({
		submitHandler: submitProfileForm
	});
	
	function submitProfileForm(){
		// serialize the form
		var data = $('#profile_form').serialize();
		console.log(data);
		// use AJAX to verify login details with database
		$.ajax({
			type: 'POST',
			url: 'update-profile.php',
			data: data,
			success: function(result){
				console.log(result);
				$('#profile_alert_box').text(result);
				$('#profile_alert_box').show();
			}
		});
		return false;
	}
});