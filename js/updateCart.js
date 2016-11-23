$(document).ready(function() {

    $('#cart_alert_box').hide();



    $( "#addToCartButton" ).click(function(){
        // serialize the form
        var data = $('#addToCartForm').serialize();
        //console.log(data);
        // use AJAX to verify login details with database
        $.ajax({
            type: 'POST',
            url: 'addToCart.php',
            data: data,
            success: function(result){
                console.log(result);
                $('#cart_alert_box').text(result);
                $('#cart_alert_box').hide().fadeIn('fast').delay(5000).fadeOut('fast');
            }
        });
        return false;
    })












});