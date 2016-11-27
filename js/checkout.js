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
                $('#checkout_alert_box').text(result);
                $('#checkout_alert_box').hide().fadeIn('fast').delay(5000).fadeOut('fast');
                /*window.location = "http://localhost/onlineautopartsstore/index.html";*/
/*                $("#do_action").hide();
                $('#checkoutComplete').show().fadeIn('fast');*/



            }
        });
        return false;
    })









});