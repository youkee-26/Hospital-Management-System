<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->

if(isset($_POST['submit'])){
  $rem=$_POST['rem'];
  $stat=$_POST['stat'];
  $bid=$_POST['bid'];
  $time=$_POST['time'];
  $date=$_POST['date'];
  $amt=$_POST['amt'];
  
  
  //value passing in the variable'
  $sql2="update billing set Date='$date', Time='$time',remaining=$rem , status='$stat', amount='$amt' where B_Id='$bid'"; 
  $result2=mysqli_query($conn,$sql2);
  
  if($result2){
    echo "An billing has been updated successfully!";
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
   <h1> Hello, admin!Update a Billing.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE update FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Billing ID</label>
    <input type="text" class="form-control" id="appointmentserial" name="bid">
    <div> </div>
  </div>
  
  <div class="mb-3">
    <label>Billing Date</label>
    <input type="text" class="form-control" id="appointmentdate" name="date">
    <div> </div>
  
  <div class="mb-3">
    <label>Time</label>
    <input type="text" class="form-control" id="appointmenttime" name="time">
    <div></div>
    
  </div>
  
  <div class="mb-3">
    <label>Remainging</label>
    <input type="text" class="form-control" id="appointmentdesc" name="rem">
    <div></div>
    
  </div>
  <div class="mb-3">
    <label>Status</label>
    <input type="text" class="form-control" id="appointmentdesc" name="stat">
    <div></div>
    
  </div>
  <div class="mb-3">
    <label>Amount</label>
    <input type="text" class="form-control" id="appointmentdesc" name="amt">
    <div></div>
    
  </div>
  
  <button type='submit' class="btn btn-primary" name="submit">Update</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>