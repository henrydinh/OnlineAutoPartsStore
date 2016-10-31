$(document).ready(function() {

	function validateLoginForm() {
		// span notifications initially hidden
		$('#username_notification').hide();
		$('#password_notification').hide();
		
		// Detect when username field loses focus
		$('#login_username').focusout(function(){
			// username field text value
			var username_value = $('#login_username').val();
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
		$('#login_password').focusin(function(){
			$('#password_notification').removeClass().addClass('info');
			$('#password_notification').text("Minimum of 8 characters");
			$('#password_notification').show();
		});
		
		// Detect when password field loses focus
		$('#login_password').focusout(function(){
			// password field text value
			var password_value = $('#login_password').val();
			
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
	}
	
	validateLoginForm();
});