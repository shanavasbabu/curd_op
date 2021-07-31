<?php
require "config.php";
// echo "Hi I am updated";
$Id = $_REQUEST['Id'];
    if(count($_POST)>0) {
        mysqli_query($con,"UPDATE `details` set fullName='" . $_REQUEST['fullName'] . "',  email='" . $_REQUEST['email'] . "' ,phoneNo='" . $_REQUEST['phoneNo'] . "' WHERE Id='$Id'");
        $message = "Record Modified Successfully";
    }
    mysqli_close($con);
    echo "Record Modified Successfully";
?>