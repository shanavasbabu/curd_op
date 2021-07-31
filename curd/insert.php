<?php
require "config.php";
// echo $con;
    $fullName = $_REQUEST['fullName'];
    $email = $_REQUEST['email'];
    $phoneNo = $_REQUEST['phoneNo'];
    $Id = $_REQUEST['Id'];

    $query="INSERT INTO `details` (`Id`,`fullName`, `email`, `phoneNo`) VALUES ('$Id','$fullName','$email','$phoneNo')";
    //  echo $query;
    if($con->query($query) == true)
        {
            echo "1";
        }
    else{
        echo "ERROR";
    }
?>