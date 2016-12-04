/**
 * Created by Vivek on 11/26/2016.
 */

$(document).ready(function() {

    // Initially hide alert box
    $('#checkout_alert_box').hide();
    $('#checkoutComplete').hide();


    /*
        $('#checkoutComplete').hide();
    */





    // call submitForm function for the submitHandler

    $( "#checkoutButton" ).click(function() {
        // serialize the form
        var data = $('#checkoutForm').serialize();
        //console.log(data);
        // use AJAX to verify login details with database
        $.ajax({
            type: 'POST',
            url: 'checkout.php',
            data: data,
            success: function(result){
                console.log(result);
				if(result != "Checkout Failed"){
					var new_location = "order-summary.html?" + result;
					window.location = new_location;
				}else{
					$('#checkout_alert_box').text(result);
					$('#checkout_alert_box').hide().fadeIn('fast').delay(5000).fadeOut('fast');
				}
            }
        });
        return false;
    })









});