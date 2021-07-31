<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample Assessment</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./asstes/css/index.css">
</head>
<body>
    <form name="myform" id="userForm"  method="post">
        <h2>Application Form</h2>
        <p id="msg"></p>
        <input type="hidden" name="Id" id="id">
        <div class="row">
            <label>Full Name</label>
            <input type="text" name="fullName">
            <div class="error" id="nameErr"></div>
        </div>
        <div class="row">
            <label>Email Address</label>
            <input type="text" name="email">
            <div class="error" id="emailErr"></div>
        </div>
        <div class="row">
            <label>Mobile Number</label>
            <input type="text" name="phoneNo" maxlength="10">
            <div class="error" id="mobileErr"></div>
        </div>
    <input type="button" id="submit" value="Submit">
    <input type="reset" value="Reset All"/>
    </form>
</body>
<script src="./asstes/js/index.js"></script>
<script>
    $(document).on('click','#submit',function(){
        if (validateform()) {
            // e.preventDefault();
            $.ajax({
            method:"POST",
            url: "insert.php",
            data:$('#userForm').serialize(),
            success: function(data){
            console.log(data);
            if(data == 1){
            location.href="sample.php";
            }
    }});
}
});
</script>
</html>