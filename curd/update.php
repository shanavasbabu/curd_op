<?php
require "config.php";
    $Id= $_REQUEST['Id'];
    $result = mysqli_query($con,"SELECT * FROM `details` WHERE Id='" . $Id . "'");
    $row= mysqli_fetch_array($result);
    // mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Records</title>
    <script src="validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./asstes/css/update.css">
    
</head>
<body>
<form name="myform" action="" method="post" onsubmit="return validateform()">

    <h2>Update Details</h2>
    <input type="hidden" name="id" id="id" value="<?php echo $row['Id']; ?>">
    <div class="row">
        <label>Full Name</label>
        <input type="text" name="fullName" id="fullName" value="<?php echo $row['fullName']; ?>">
        <div class="error" id="nameErr"></div>
        <br>
    </div>
    <div class="row">
        <label>Email Address</label>
        <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>">
        <div class="error" id="emailErr"></div>
        <br>
    </div>
    <div class="row">
        <label>Mobile Number</label>
        <input type="text" name="phoneNo" id="phoneNo" value="<?php echo $row['phoneNo']; ?>">
        <div class="error" id="mobileErr"></div>
        <br>
    </div>
    <input type="button" id="editSubmit" value="Submit">
    <input type="reset"  value="Reset All"/>
    <center><a href="sample.php" style="margin-top: 20px;">Back</a></center>
    </form>
</body>
<script>
$(document).on("click","#editSubmit", function(){ 
    var Id = $("#id").val();  
    var fullName = $("#fullName").val();  
    var email = $("#email").val();  
    var phoneNo = $("#phoneNo").val(); 
    if(validateform()){
        $.ajax({  
            url:"updatenew.php",  
            type:"POST",  
            cache:false,  
            data:{Id:Id,fullName:fullName,email:email,phoneNo:phoneNo},  
            success:function(data){  
                    if (data !=  '') {  
                        alert(data);   
                        console.log("updated " +data);
                    }
                    else{  
                        alert("Some thing went wrong");  
                        console.log("Not updated") ;    
                    }  
                }  
        });
    }  
});
</script>

</html>