<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->

if(isset($_POST['submit'])){
  $appointmentserial=$_POST['appointmentserial'];
  $appointmentdate=$_POST['appointmentdate'];
  $appointmenttime=$_POST['appointmenttime'];
  $appointmentdesc=$_POST['appointmentdesc'];
  
  
  //value passing in the variable'
  $sql2="update services set Date='$appointmentdate', Time='$appointmenttime',Description='$appointmentdesc' where Serial='$appointmentserial'"; 
  $result2=mysqli_query($conn,$sql2);
  
  if($result2){
    echo "An appointment has been updated successfully!";
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
   <h1> Hello, admin!Update an appointment.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE update FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Appointment Serial Number</label>
    <input type="text" class="form-control" id="appointmentserial" name="appointmentserial">
    <div> Enter serial number of an appointment(EX:A9)</div>
  </div>
  
  <div class="mb-3">
    <label>Appointment Date</label>
    <input type="text" class="form-control" id="appointmentdate" name="appointmentdate">
    <div> Enter Date of an appointment(Year-Month-Date)</div>
  
  <div class="mb-3">
    <label>Appointment Time</label>
    <input type="text" class="form-control" id="appointmenttime" name="appointmenttime">
    <div>Enter Time of an appointment(H:M:S)</div>
    
  </div>
  
  <div class="mb-3">
    <label>Appointment Description</label>
    <input type="text" class="form-control" id="appointmentdesc" name="appointmentdesc">
    <div>Enter Descrition of an appointment</div>
    
  </div>
  <button type='submit' class="btn btn-primary" name="submit">Update</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>