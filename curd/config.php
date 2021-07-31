<?php
    define('DB_NAME','db1');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_HOST','localhost');
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$con)
    {
        die('Could not connect:'.mysqli_connect_error());
    }/*else{
        echo "Success connecting to the db";
    }*/

?>