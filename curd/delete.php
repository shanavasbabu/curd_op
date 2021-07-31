<?php
// error_reporting(E_ALL);
//include ('config.php');
require "config.php";
//echo $con;die();
$Id = $_REQUEST['Id'];
$sql = "DELETE FROM details WHERE Id='$Id'";
if (mysqli_query($con, $sql)) {
    echo "Record deleted successfully";
    
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>
