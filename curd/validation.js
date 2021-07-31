function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateform(){  
    var name=document.myform.fullName.value;  
    var mail=document.myform.email.value;  
    var mobile = document.myform.phoneNo.value;
    var nameErr = emailErr = mobileErr = true;
      
    if(name == "") {
        printError("nameErr", "Please enter your name");
    // } else {
    //     var regex = /^[a-zA-Z\s]+$/;                
    //     if(regex.test(name) === false) {
    //         printError("nameErr", "Please enter a valid name");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    // }

    if(mail == "") {
        printError("emailErr", "Please enter your email address");
    } else {
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(mail) === false) {
            printError("emailErr", "Please enter a valid email address");
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }
    if(mobile == "") {
        printError("mobileErr", "Please enter your mobile number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(mobile) === false) {
            printError("mobileErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("mobileErr", "");
            mobileErr = false;
        }
    }
    if((nameErr || emailErr || mobileErr) == true) {
        return false;
     }
    //  else {
    //      var dataPreview = "You've entered the following details: \n" +
    //                        "Full Name: " + name + "\n" +
    //                        "Email Address: " + email + "\n" +
    //                        "Mobile Number: " + mobile + "\n" +
        //  alert(dataPreview);
    //  }
    return true;
}  