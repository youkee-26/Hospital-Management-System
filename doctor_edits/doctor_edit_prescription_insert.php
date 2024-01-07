<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->
if(isset($_GET['insertid'])) {  //get method is used to fetch info from url
    $patientid=$_GET['insertid'];}
if(isset($_POST['submit'])){
  $prescriptionserial=$_POST['prescriptionserial'];
  $prescriptionid=$_POST['prescriptionid'];
  $prescriptionmedicine=$_POST['prescriptionmedicine'];
  $prescriptiondate=$_POST['prescriptiondate'];
  $prescriptiontime=$_POST['prescriptiontime'];
  $prescriptiondesc=$_POST['prescriptiondesc'];
  
  
  //value passing in the variable
  $sql2="insert into services (Serial,Date, Time, Description ) values('$prescriptionserial','$prescriptiondate','$prescriptiontime','$prescriptiondesc')";
  $result2=mysqli_query($conn,$sql2);
  $sql="insert into prescription (Serial,Press_id) values('$prescriptionserial','$prescriptionid')";
  $result=mysqli_query($conn,$sql);
  $sql3="insert into takes (p_id,service_serial) values('$patientid','$prescriptionserial')";
  $result3=mysqli_query($conn,$sql3);
  $sql4="insert into prescription_medicine (Serial,Press_id,Pres_medicine) values('$prescriptionserial','$prescriptionid','$prescriptionmedicine')";
  $result4=mysqli_query($conn,$sql4);
  if($result && $result2 && $result3 && $result4){
    echo "A new prescription has been inserted successfully!";
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
    <title>Doctor Insert Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   <h1> Hello, Doctor! Insert a new Prescription</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE Insertion FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Prescription Serial Number</label>
    <input type="text" class="form-control" id="prescriptionserial" name="prescriptionserial">
    <div> Enter serial number of a report(EX:R1)</div>
  </div>
  <div class="mb-3">
    <label>Prescription  ID</label>
    <input type="text" class="form-control" id="prescriptionid" name="prescriptionid">
    <div>Enter ID of a Report(EX:REP)</div>
    
  </div>
  <div class="mb-3">
    <label>Prescription  Medicines</label>
    <input type="text" class="form-control" id="prescriptionmedicine" name="prescriptionmedicine">
    <div>Enter Medicine names with the timimg</div>
    
  </div>
  <div class="mb-3">
    <label>Prescription creation Date</label>
    <input type="text" class="form-control" id="prescriptiondate" name="prescriptiondate">
    <div> Enter Date(DD-MM_YY) of an report</div>
    
  </div>
  <div class="mb-3">
    <label>rPrescription creation Time</label>
    <input type="text" class="form-control" id="prescriptiontime" name="prescriptiontime">
    <div>Enter Time(HH-MM-SS) of an report</div>
    
  </div>
  <div class="mb-3">
    <label>Prescription Description</label>
    <input type="text" class="form-control" id="prescriptiondesc" name="prescriptiondesc">
    <div>Enter Description of an report</div>
    
  </div>
  <button type='submit' class="btn btn-primary" name="submit">Submit</button>
</form>
 <!-- THE Insertion FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>