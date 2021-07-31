<?php 
require "config.php";
$stuId = $_REQUEST['Id']; 
for($i = 1 ; $i <=2;$i++){
    $subject = $_POST['subject'.$i];
    $mark = $_POST['mark'.$i];

    $query = "INSERT INTO `score`( `stuid`, `subject`, `mark`) VALUES('$stuId','$subject','$mark')";
    $fun =$con->query($query);
}
if($fun == true)
        {
            echo "1";
        }
    else{
        echo "ERROR";
    }
?>