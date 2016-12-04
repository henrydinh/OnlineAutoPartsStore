$(document).ready(function() {
    $( "#delete_from_cart_button" ).click(function() {
        // serialize the form
        var data = $('#delete_from_cart').serialize();
        console.log(data);
        // use AJAX to delete item from cart
        $.ajax({
            type: 'POST',
            url: 'deleteFromCart.php',
            data: data,
            success: function(result){
				console.log(result);
				if(result = "deleted"){
					window.location = "cart.html";
				}
            }
        });
        return false;
    })
});