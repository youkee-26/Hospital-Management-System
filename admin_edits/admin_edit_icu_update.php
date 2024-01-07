<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->

if(isset($_POST['submit'])){
  $serial=$_POST['serial'];
  $room=$_POST['room'];
  $edate=$_POST['edate'];
  $etime=$_POST['etime'];
  $ddate=$_POST['ddate'];
  $dtime=$_POST['dtime'];
  $desc=$_POST['desc'];
  $bed=$_POST['bed'];
  $pid=$_POST['pid'];
  
  
  
  //value passing in the variable'
  $sql2="update services set Date='$edate', Time='$etime',Description='$desc' where Serial='$serial'"; 
  $result2=mysqli_query($conn,$sql2);

  $sql1="update ICU set Room_no='$room', Bed_no='$bed', Discharge_date='$ddate' , Discharge_time='$dtime' where Serial='$serial'"; 
  $result1=mysqli_query($conn,$sql1);
  
  

  if($etime==""){
    $sql="delete from takes where p_id='$pid'";
    $result=mysqli_query($conn,$sql);
  }else{
    $sql="insert into takes values ('$pid','$serial');";
    $result=mysqli_query($conn,$sql);

  }
  
  
  
  
  
  
  
  if($result2){
    echo "ICU has been updated successfully!";
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
  
  <div class="mb-3">
    <label>Entry Date</label>
    <input type="text" class="form-control" id="appointmentdesc" name="edate">
    <div>Enter Entry Date</div>
    
  </div>
  <div class="mb-3">
    <label>Entry Time</label>
    <input type="text" class="form-control" id="appointmentdesc" name="etime">
    <div>Enter Entry Time</div>
    
  </div>
  <div class="mb-3">
    <label>Discharge Date</label>
    <input type="text" class="form-control" id="appointmentdesc" name="ddate">
    <div>Enter Discharge Date</div>
    
  </div>
  <div class="mb-3">
    <label>Discharge Time</label>
    <input type="text" class="form-control" id="appointmentdesc" name="dtime">
    <div>Enter Discharge Time</div>
    
  </div>
  <div class="mb-3">
    <label>Description</label>
    <input type="text" class="form-control" id="appointmentdesc" name="desc">
    <div>Enter Descrition of the ICU</div>
    
  </div>
  <div class="mb-3">
    <label>patient_ID</label>
    <input type="text" class="form-control" id="pid" name="pid">
    <div>Enter Patient_ID</div>
    
  </div>
  <button type='submit' class="btn btn-primary" name="submit">Update</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>