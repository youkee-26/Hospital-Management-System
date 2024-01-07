<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->

if(isset($_POST['submit'])){
  $serial=$_POST['serial'];
  $room=$_POST['room'];
  $bed=$_POST['bed'];
  
  
  
  
  //value passing in the variable'
  $sql2="insert into services values ('$serial','0000-00-00','00:00:00','Free')"; 
  $result2=mysqli_query($conn,$sql2);

  $sql1="insert into ICU values ('$serial','$room','$bed','0000-00-00','00:00:00')"; 
  $result1=mysqli_query($conn,$sql1);
  
  


  
  
  
  
  
  
  if($result2){
    echo "ICU has been Inserted successfully!";
  }
  else{
    die("Unsuccessful operation!".mysqli_connect_error());
  }
}



//<!--Post Method ends-->

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   <h1> Hello, admin!Update the ICU.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE update FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>ICU Serial Number</label>
    <input type="text" class="form-control" id="appointmentserial" name="serial">
    <div> Enter serial number of an icu</div>
  </div>
  
  <div class="mb-3">
    <label>Room_No</label>
    <input type="text" class="form-control" id="appointmentdate" name="room">
    <div> Enter Room_no</div>
  
  <div class="mb-3">
    <label>Bed_No</label>
    <input type="text" class="form-control" id="appointmenttime" name="bed">
    <div>Enter Bed_no</div>
    
  </div>
  

 

  <button type='submit' class="btn btn-primary" name="submit">Insert</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>