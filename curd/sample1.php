<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asstes/css/sample1.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>More Details</title>
</head>
<body>
<center>
    <h2>All Records</h2>
    <table class="tableStyle">
    <tr>
    <th>ID</th>
    <th>Subject</th>
    <th>Mark</th>
    <th>student_id</th>
    </tr>

    <?php
    require "config.php";
    $result=mysqli_query($con,"SELECT * FROM score");
    while($row=mysqli_fetch_array($result)){
        // for ($i=1; $i <=2 ; $i++) { 
            
            $subject=$row['subject'];
            $mark=$row['mark'];
        // }
        $Id = $row['id'];
        $stuId = $row['stuid'];
    
    ?>
    <tr>
        <td><?= $Id; ?></td>
        <td><?= $subject; ?></td>
        <td><?= $mark; ?></td>
        <td><?= $stuId; ?></td>
    </tr>
    <?php } ?>
    </table><br>
    <a href="sample.php">Back</a>
    </center>
    
</body>
</html>