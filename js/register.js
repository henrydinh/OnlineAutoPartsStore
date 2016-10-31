$(document).ready(function() {

    var email = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    $("#firstNameRequired").hide();
    $("#lastNameRequired").hide();
    $("#emailAddressNotValid").hide();
    $("#passwordNotValid").hide();




    $("#firstName").focusout(function(){

        if(!(/^[a-zA-Z]+$/.test($(this).val())) || $(this).val().length < 1)
        {
            document.getElementById("firstNameRequired").style.visibility = "visible";
            //$(this).addClass('invalidBorderClass');
            $("#firstNameRequired").show();


        }

        else
        {
            document.getElementById("firstNameRequired").style.visibility = "hidden";
            $("#firstNameRequired").hide();
            //$(this).removeClass('invalidBorderClass');
        }

    });

    $("#lastName").focusout(function(){

        if(!(/^[a-zA-Z]+$/.test($(this).val())) || $(this).val().length < 1)
        {
            document.getElementById("lastNameRequired").style.visibility = "visible";
           // $(this).addClass('invalidBorderClass');

            $("#lastNameRequired").show();

        }

        else
        {
            document.getElementById("lastNameRequired").style.visibility = "hidden";
            $("#lastNameRequired").hide();
           // $(this).removeClass('invalidBorderClass');


        }


    });

    $("#email").focusout(function(){
        if(email.test($(this).val()))
        {
            document.getElementById("emailAddressNotValid").style.visibility = "hidden";
            $("#emailAddressNotValid").hide();
            //$(this).removeClass('invalidBorderClass');



        }

        else
        {
            document.getElementById("emailAddressNotValid").style.visibility = "visible";
            $("#emailAddressNotValid").show();
            //$(this).addClass('invalidBorderClass');

        }

    });

    $("#password").focusout(function(){
        if($(this).val().length >= 8)
        {
            document.getElementById("passwordNotValid").style.visibility = "hidden";
            $("#passwordNotValid").hide();
            //$(this).removeClass('invalidBorderClass');



        }

        else
        {
            document.getElementById("passwordNotValid").style.visibility = "visible";
            //$(this).addClass('invalidBorderClass');
            $("#passwordNotValid").show();


        }

    })








});