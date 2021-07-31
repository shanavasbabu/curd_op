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
    <title>Add Record</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="./asstes/css/add.css">
    <style>
        <style>
        .ui-tooltip {padding: 10px;color: #333;font-size: 12px;background: #FFACAC ;}
    </style>
    <script>
            function validateform() {
        var valid = true;
        $("#myform input[requiredd=true]").each(function(){
            $(this).removeClass('invalid');
            $(this).attr('title','');
            if(!$(this).val()){ 
                $(this).addClass('invalid');
                $(this).attr('title','This field is required');
                valid = false;
            }
        }); 
        return valid;
    }

    $(function() {
        $( document ).tooltip({
            position: {my: "left top", at: "right top"},
        items: "input[requiredd=true]",
        content: function() { return $(this).attr( "title" ); }
        });
    });
    </script>
</head>
<body>
<form name="myform" id="myform" action="" method="post">

    <h2>Add Details</h2>
    <input type="hidden" name="id" id="id" value="<?php echo $row['Id']; ?>" >
    <div class="row">
        <label>Full Name</label>
        <input type="text" name="fullName" id="fullName" value="<?php echo $row['fullName']; ?>" disabled>
        <br>
    </div>
    <div class="row">
        <label>Email Address</label>
        <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" disabled>
        <br>
    </div>
    <div class="row">
        <label>Mobile Number</label>
        <input type="text" name="phoneNo" id="phoneNo" value="<?php echo $row['phoneNo']; ?>" disabled>
        <br>
    </div>
    <div class="row">
        <label>Subject 1</label>
        <input type="text" name="subject1" id="subject1" requiredd="true" value="" placeholder="Subject name">
        <input type="text" name="mark1" id="mark1"  requiredd="true" value="" placeholder="Mark" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
        <br>
    </div>
    <div class="row">
        <label>Subject 2</label>
        <input type="text" name="subject2" id="subject2"  requiredd="true" value="" placeholder="Subject name">
        <input type="text" name="mark2" id="mark2" value=""  requiredd="true" placeholder="Mark" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
        <br>
    </div>
    <input type="button" id="addSubmit" value="Submit">
    <input type="reset"  value="Reset All" />
    <center><a href="sample.php" style="margin-top: 20px;">Back</a></center>
    </form>
</body>
<script>
$(document).on("click","#addSubmit", function(){ 
    var Id = $("#id").val();  
    var subject1 = $("#subject1").val();  
    var subject2 = $("#subject2").val(); 
    var mark1 = $("#mark1").val();  
    var mark2 = $("#mark2").val();  
    if(validateform()){
        $.ajax({  
            url:"addnew.php",  
            type:"POST",  
            cache:false,  
            data:{Id:Id,subject1:subject1,subject2:subject2,mark1:mark1,mark2:mark2},  
            success:function(data){  
                // console.log("added " +data);
                    if (data == 1) {  
                        // alert(data);   
                        console.log("added " +data);
                        location.href="sample1.php";
                    }
                    else{  
                        alert("Some thing went wrong");  
                        console.log("Not Added") ;    
                    }  
                }  
        });
    }  
});
</script>

</html>