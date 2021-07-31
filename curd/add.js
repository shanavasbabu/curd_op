function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function validateform(){  
    var subject1=document.myform.subject1.value;  
    var subject2=document.myform.subject2.value; 
    // var mark1=document.myform.mark1.value;  
    // var mark2=document.myform.mark2.value;  
    var subjectErr = subErr  = markErr=markError= true;
      
    if(subject1 == "") {
        printError("subjectErr", "Please enter your subject name");
        } else {
            printError("subjectErr", "");
            subjectErr = false;
        }

    if(subject2 == "") {
        printError("subErr", "Please enter your subject name");
        } else{
            printError("subErr", "");
            subErr = false;
        }
    //  if(mark1 == "") {
    //     printError("markErr", "Please enter your subject name");
    //     } else{
    //         printError("markErr", "");
    //         markErr = false;
    //     }
    //      if(mark2 == "") {
    //     printError("markErrorr", "Please enter your subject name");
    //     } else{
    //         printError("markError", "");
    //         markError = false;
    //     }
    if((subjectErr || subErr ||markErr||markError ) == true) {
        return false;
     }
    return true;
}  