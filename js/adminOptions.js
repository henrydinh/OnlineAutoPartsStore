/**
 * Created by vputt on 11/15/2016.
 */
$(document).ready(function() {

    // Initially hide alert box
    $('#add_alert_box').hide();
    $('#delete_alert_box').hide();
    $('#update_alert_box').hide();


    // call submitForm function for the submitHandler
    $('#addItemForm').validate({
        submitHandler: addItemForm
    });

    function addItemForm(){
        // serialize the form
        var data = $('#addItemForm').serialize();
        //console.log(data);
        // use AJAX to verify login details with database
        $.ajax({
            type: 'POST',
            url: 'adminOptions/add.php',
            data: data,
            success: function(result){
                console.log(result);
                $('#add_alert_box').text(result);
                $('#add_alert_box').hide().fadeIn('fast').delay(5000).fadeOut('fast');
            }
        });
        return false;
    }





    // call submitForm function for the submitHandler
    $('#updateItemForm').validate({
        submitHandler: updateItemForm
    });

    function updateItemForm(){
        // serialize the form
        var data = $('#updateItemForm').serialize();
        //console.log(data);
        // use AJAX to verify login details with database
        $.ajax({
            type: 'POST',
            url: 'adminOptions/updateItem.php',
            data: data,
            success: function(result){
                console.log(result);
                $('#update_alert_box').text(result);
                $('#update_alert_box').hide().fadeIn('fast').delay(5000).fadeOut('fast');
            }
        });
        return false;
    }




});