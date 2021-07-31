<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asstes/css/sample.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <title>All Records</title>
</head>
<body>
  <center>
    <h2>All Records</h2>
    <table class="tableStyle">
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>EMAIL</th>
    <th>MOBILE</th>
    <th>MODIFICATION</th>
    </tr>

    <?php
    define('DB_NAME','db1');
    define('DB_USER','root');
    define('DB_PASSWORD','');
    define('DB_HOST','localhost');
    $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    if(!$con)
    {
        die('Could not connect:'.mysqli_connect_error());
    }
    $result=mysqli_query($con,"SELECT * FROM details");
    while($row=mysqli_fetch_array($result)){
        $Id = $row['Id'];
        $fullName=$row['fullName'];
        $email=$row['email'];
        $phoneNo=$row['phoneNo'];
    
    ?>
    <tr>
        <td><?= $Id; ?></td>
        <td><?= $fullName; ?></td>
        <td><?= $email; ?></td>
        <td><?= $phoneNo; ?></td>
        <td colspan="4"><button class='delete' data-id='<?= $Id; ?>'>Delete</button> <button class='update' data-id='<?= $Id; ?>'>Update</button> <button class='add' data-id='<?= $Id; ?>'>Add</button> <button data-toggle="modal" data-target="#myModal" id="view<?= $Id; ?>" class='view' data-id='<?= $Id; ?>' onclick="LoadData(<?= $Id; ?>)" >Subject Details</button></td>
    </tr>
    <?php } ?>
    </table><br>
    <a href="index.php">Back</a>
    </center>
    <div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Subject Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <span id="content"></span>
        <table class="tableStyle" id="userTable" >
          <thead>
            <tr>
            <th width="5%">STUID</th>
            <th width="25%">Subject</th>
            <th width="25%">Mark</th>
            </tr>
            </thead>
            <tbody></tbody>
    </table>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>

</body>
<script>
$(document).ready(function(){
$('.delete').click(function(){
  var el = this;
  var deleteid = $(this).data('id');

  var confirmalert = confirm("Are you sure?");
  if (confirmalert == true) {
     $.ajax({
       url: 'delete.php',
       type: 'POST',
       data: { Id:deleteid },
       success: function(response){
           alert(response);
           // Remove row from HTML Table
	        $(el).closest('tr').css('background','tomato');
	        $(el).closest('tr').fadeOut(800,function(){
	        $(this).remove();
	      });
        
         }
       });
  }
});
$('.update').click(function(){
  var updateid = $(this).data('id');

  var confirmalert = confirm("Are you sure update the Records?");
  if (confirmalert == true) {
    location.href="update.php?Id="+updateid;
  }
});
$('.add').click(function () {
  var add = $(this).data('id');
  var confirmalert = confirm("Are you sure Add new the Records?");
  if (confirmalert == true) {
    location.href="add.php?Id="+add;
  }
  
});
});
function LoadData(id){
  var view = $('#view'+id).data('id');
  // alert(view);
  // var name= $('#view'+id).data('fullName')
  $.ajax({
    url:'subject.php',
    type: 'POST',
    dataType: 'json',
    data:{Id:view},
    success: function (response) {
      //console.log(response);
    
    var txt="No Subject record added";
    if (response != null) {
       // var obj = $.parseJSON(JSON.stringify(response));
        var obj = response;
            //console.log(obj);
            var len = obj.length;
            var tr_str ='';
      
            for(var i=0; i<len; i++){
                var id = obj[i].stuid;
                var subject = obj[i].subject;
                var mail = obj[i].mark;

                tr_str += "<tr>" +
                    "<td align='center'>" + id + "</td>" +
                    "<td align='center'>" + subject + "</td>" +
                    "<td align='center'>" + mail + "</td>" +
                    "</tr>";
                    // console.log(tr_str);
                    $("#content").remove(txt);
                    $("#content").html('');
            }
            $("#userTable").show();
            $("#userTable tbody").html(tr_str);
      }
          else{
            // alert('1234');
           $("#userTable").hide();
            $("#content").html(txt);
          }
          
    }
  });
}
</script>
</html>