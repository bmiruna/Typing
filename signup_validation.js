// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

// Defining a function to validate form 
function validateForm() {
    // Retrieving the values of form elements 
    let fname = document.forms["registration"]["fname"].value;
	let lname = document.forms["registration"]["lname"].value;
    let email = document.forms["registration"]["email"].value;
    let pass = document.forms["registration"]["password"].value;
    let confirmPass = document.forms["registration"]["confirmPass"].value;
    
	
	const nameRegex = /^[a-zA-Z\s]+$/;
	const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
	const passRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    
    
	// Defining error variables with a default value
    let fnameErr = lnameErr = emailErr = passwordErr = confirmPassErr = termsErr = true;
    
    // Validate first name
    if(fname.trim() == "") {
        printError("fnameErr", "Please enter your first name");
    } else {                
        if(nameRegex.test(fname) === false) {
            printError("fnameErr", "Please enter a valid name");
        } else {
            printError("fnameErr", "");
            fnameErr = false;
        }
    }
	
	// Validate last name
    if(lname.trim() == "") {
        printError("lnameErr", "Please enter your last name");
    } else {                
        if(nameRegex.test(lname) === false) {
            printError("lnameErr", "Please enter a valid name");
        } else {
            printError("lnameErr", "");
            lnameErr = false;
        }
    }
    
    // Validate email address
    if(email.trim() == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        if(emailRegex.test(email) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
	
	// Validate password
    if(pass.trim() == "") {
        printError("passwordErr", "Please enter a password");
    } else {
        if(passRegex.test(pass) === false) {
            printError("passwordErr", "Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
        } else{
            printError("passwordErr", "");
            emailErr = false;
        }
    }
	
	// Validate confirm password
    if(confirmPass.trim() == "") {
        printError("confirmPassErr", "Please confirm your password");
    } else {
        if(pass !== confirmPass) {
            printError("confirmPassErr", "Your passwords don't match!");
        } else{
            printError("confirmPassErr", "");
            emailErr = false;
        }
    }

    // Validate terms checkbox
    if(!document.forms["registration"]["agreeTerm"].checked){
        printError("termsErr", "You must agree to the terms first!");
    } else{
        printError("termsErr", "");
        termsErr = false;
    }
    
    // Prevent the form from being submitted if there are any errors
    if((fnameErr || lnameErr || emailErr || passwordErr || confirmPassErr ) == true) {
       return false;
    } else {
        
    }
};