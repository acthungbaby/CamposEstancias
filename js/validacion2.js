$(document).ready(function() {
    //global variables
    var form = $("#form2");
 
    var email = $("#txtemail"); //textbox u are going to validate
    var emailInfo = $("#emailInfo"); //to display error message
 
    //first validation on form submit
    form.submit(function() {
        //alert("form submitted...!");
 
        // validation begin before submit
        if (validateEmail()) {
 
            return true;
        } else {
 
            return false;
        }
 
    });
    function validateEmail() {
        //validation for empty emails
        if (email.val() == "") {
            email.addClass("error");
            emailInfo.text("Names cannot be empty!");
            emailInfo.addClass("error");
            return false;
        } else {
            email.removeClass("error");
            emailInfo.text("*");
            emailInfo.removeClass("error");
 
        }
 
        //validation for proper email formats
        //testing regular expression
        var a = $("#txtemail").val();
 
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
            emailInfo.text("Valid E-mail please..!");
            emailInfo.addClass("error");
            return false;
        }
    }
 
});