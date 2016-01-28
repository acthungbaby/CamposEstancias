$(document).ready(function() {
    var form = $("#form-contact");
    var nombre = $('#nombre');
    var email = $('#email');
    var telefono = $('#telefono');
    var mensaje = $('#mensaje');
    
    var nombreInfo = $("#nombreInfo");
    var emailInfo = $("#emailInfo");
    var telefonoInfo = $("#telefonoInfo");
    var mensajeInfo = $("#mensajeInfo");
    

   form.submit(function() {
       
        event.stopPropagation();
        alert("test");
        
        

        // validation begin before submit

        if (validateEmail()) {

        return true;

        } else {

        return false;

        }

    });
    
    function validateEmail() {
        if (email.val() == "") {
           email.addClass("error");
           emailInfo.text("El campo email no puede estar vacio");
           emailInfo.addClass("error");
           return false;
        } else {
           email.removeClass("error");
           emailInfo.text("*");
           emailInfo.removeClass("error");

        }

        if (nombre.val() == "") {
           nombre.addClass("error");
           nombreInfo.text("El campo email no puede estar vacio");
           nombreInfo.addClass("error");
           return false;
        } else {
           nombre.removeClass("error");
           nombreInfo.text("*");
           nombreInfo.removeClass("error");

        }

        if (nombre.val() == "") {
           telefono.addClass("error");
           telefonoInfo.text("El campo email no puede estar vacio");
           telefonoInfo.addClass("error");
           return false;
        } else {
           telefono.removeClass("error");
           telefonoInfo.text("*");
           telefonoInfo.removeClass("error");

        }

        if (mensaje.val() == "") {
           mensaje.addClass("error");
           mensajeInfo.text("El campo email no puede estar vacio");
           mensajeInfo.addClass("error");
           return false;
        } else {
           mensaje.removeClass("error");
           mensajeInfo.text("*");
           mensajeInfo.removeClass("error");

        }

           var a = $("#email").val();

           var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
           //if it's valid email
           if (filter.test(a)) {
               email.removeClass("error");
               emailInfo.text("*");
               emailInfo.removeClass("error");
               return true;
           }
           //if it's NOT valid
           else {
               email.addClass("error");
               emailInfo.text("Debe ser un email valido");
               emailInfo.addClass("error");
               return false;
           }
    
    }
    
});



