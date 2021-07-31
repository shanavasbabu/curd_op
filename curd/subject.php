<?php 
error_reporting(0);
require "config.php";
$Id= $_REQUEST['Id'];
//echo "SELECT * FROM score  WHERE stuid='" . $Id . "'";
$result=mysqli_query($con,"SELECT * FROM score  WHERE stuid='$Id'");
while($row= mysqli_fetch_assoc($result)){
    $a[] = $row;
}
//if ($a == "") {
//     echo "No record";
// }
// else {
    echo json_encode($a);
//}


?>


