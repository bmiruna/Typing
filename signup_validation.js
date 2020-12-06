// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    let userName = document.forms["registration"]["username"].value;
    let email = document.forms["registration"]["email"].value;
    let pass = document.forms["registration"]["password"].value;
    let confirmPass = document.forms["registration"]["confirmPass"].value;
    
	const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
       
	// Defining error variables with a default value
    let userErr = emailErr = passwordErr = confirmPassErr = termsErr = "";

    var valid = true;
    
    // Validate username
    if(userName.trim() == "") {
        printError("userErr", "Please enter your username");
        valid = false;
    } else {                
            printError("userErr", "");
        }

    // Validate email address
    if(email.trim() == "") {
        printError("emailErr", "Please enter your email address");
        valid = false;
    } else {
        if(emailRegex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
        }
    }
	
	// Validate password
    if(pass.trim() == "") {
        printError("passwordErr", "Please enter a password");
        valid = false;
    } else {
        if(passRegex.test(pass) === false) {
            printError("passwordErr", "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
            valid = false;
        } else{
            printError("passwordErr", "");
        }
    }
	
	// Validate confirm password
    if(confirmPass.trim() == "") {
        printError("confirmPassErr", "Please confirm your password");
        valid = false;
    } else {
        if(pass !== confirmPass) {
            printError("confirmPassErr", "Your passwords don't match!");
            valid = false;
        } else{
            printError("confirmPassErr", "");
        }
    }

    //Validate terms checkbox
    if(!document.forms["registration"]["agreeTerm"].checked){
        printError("termsErr", "You must agree to the terms first!");
        valid = false;
    } else{
        printError("termsErr", "");
        termsErr = false;
    }
    
    // Prevent the form from being submitted if there are any errors
    // if(userErr == true || emailErr == true || passwordErr == true || confirmPassErr  == true) {
    //    return false;
    // } 
    // return true;

    return valid;
}