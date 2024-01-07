<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->
if(isset($_GET['updateid'])) {  //get method is used to fetch info from url
    $doctorid=$_GET['updateid'];}
if(isset($_POST['submit'])){
  $doctorname=$_POST['doctorname'];
  $doctoraddress=$_POST['doctoraddress'];
 
  $doctorchambertime=$_POST['doctorchambertime'];
  $doctorfeeperappointment=$_POST['doctorfeeperappointment'];
  $doctorfeepersurgery=$_POST['doctorfeepersurgery'];
  $doctoroffday=$_POST['doctoroffday'];
  
  
  //value passing in the variable'
  $sql2="update doctor set Name='$doctorname', Address='$doctoraddress',Fee_per_appointment=$doctorfeeperappointment,Fee_per_surgery=$doctorfeepersurgery,Offday='$doctoroffday' where Doctor_id='$doctorid'"; 
  $result2=mysqli_query($conn,$sql2);
  #$sql3="update doctor_phone set Phone='$doctorphone' where Doctor_id='$doctorid'"; 
  #$result3=mysqli_query($conn,$sql3);
  #$sql4="update doctor_degree set Degree='$doctordegree' where Doctor_id='$doctorid'"; 
  #$result4=mysqli_query($conn,$sql4);
  
  if($result2){
    echo "A Doctor's Record has been updated successfully!";
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
   <h1> Hello, Admin! Update a Doctor's Record.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE update FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Name of a Doctor</label>
    <input type="text" class="form-control" id="doctorname" name="doctorname">
    <div> Enter name of a doctor </div>
  </div>
  
  <div class="mb-3">
    <label>Address</label>
    <input type="text" class="form-control" id="doctoraddress" name="doctoraddress">
    <div> Enter Address of a doctor</div>
    </div>
  
  
  <div class="mb-3">
  <label>Chamber Time</label>
    <input type="text" class="form-control" id="doctorchambertime" name="doctorchambertime">
    <div>Enter chamber time of a doctor</div>
    
  </div>
  <div class="mb-3">
  
  <div class="mb-3">
    <label>Fee Per Appointment</label>
    <input type="text" class="form-control" id="doctorfeeperappointment" name="doctorfeeperappointment">
    <div>Enter fee per appointment</div>
    
  </div>
  <div class="mb-3">
    <label>Fee Per Surgery</label>
    <input type="text" class="form-control" id="doctorfeepersurgery" name="doctorfeepersurgery">
    <div>Enter fee per surgery</div>
    
  </div>
  <div class="mb-3">
    <label>Offday</label>
    <input type="text" class="form-control" id="doctoroffday" name="doctoroffday">
    <div>Enter the holiday of a doctor</div>
    
  </div>
  <button type='submit' class="btn btn-primary" name="submit">Update</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>