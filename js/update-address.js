$(document).ready(function() {
	
	// Initially hide alert box
	$('#address_alert_box').hide();
	
	// call submitForm function for the submitHandler
	$('#address_form').validate({
		submitHandler: submitAddressForm
	});
	
	function submitAddressForm(){
		// serialize the form
		var data = $('#address_form').serialize();
		console.log(data);
		// use AJAX to verify login details with database
		$.ajax({
			type: 'POST',
			url: 'update-address.php',
			data: data,
			success: function(result){
				console.log(result);
				$('#address_alert_box').text(result);
				$('#address_alert_box').show();
			}
		});
		return false;
	}
});