<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->
if(isset($_GET['updateid'])) {  //get method is used to fetch info from url
    $patientid=$_GET['updateid'];}
if(isset($_POST['submit'])){
  $patientname=$_POST['patientname'];
  $patientaddress=$_POST['patientaddress'];
  $patientphone=$_POST['patientphone'];
  $patientage=$_POST['patientage'];
  $patientweight=$_POST['patientweight'];
  $patientbloodgroup=$_POST['patientbloodgroup'];
  $patientbloodpressure=$_POST['patientbloodpressure'];

  
  //value passing in the variable'
  $sql="update patient set Name='$patientname', Address='$patientaddress',Phone ='$patientphone',Blood_Group='$patientbloodgroup', Age =$patientage,Weight = $patientweight,Blood_Pressure='$patientbloodpressure' where Patient_id='$patientid'"; 
  $result=mysqli_query($conn,$sql);
  
  
  if($result){
    echo "A Patient's Record has been updated successfully!";
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
   <h1> Hello, Admin! Update a Patient's Record.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE update FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Name of a Patient</label>
    <input type="text" class="form-control" id="patientname" name="patientname">
    <div> Enter name of a patient </div>
  </div>
  
  <div class="mb-3">
    <label>Address</label>
    <input type="text" class="form-control" id="patientaddress" name="patientaddress">
    <div> Enter Address of a patient</div>
    </div>
  <div class="mb-3">
    <label>Phone number</label>
    <input type="text" class="form-control" id="patientphone" name="patientphone">
    <div>Enter Phone Number of a patient</div>
    
  </div>
  
  <div class="mb-3">
  <label>Age</label>
    <input type="text" class="form-control" id="patientage" name="patientage">
    <div>Enter age of a patient(in years).</div>
    
  </div>
  <div class="mb-3">
  <label>Blood group</label>
    <input type="text" class="form-control" id="patientbloodgroup" name="patientbloodgroup">
    <div>Enter Blood Group of a patient</div>
    
  </div>
  <div class="mb-3">
  <label>Weight</label>
    <input type="text" class="form-control" id="patientweight" name="patientweight">
    <div>Enter weight of a patient(in KG).</div>
    
  </div>
  <div class="mb-3">
  <label>Blood Pressure</label>
    <input type="text" class="form-control" id="patientbloodpressure" name="patientbloodpressure">
    <div>Enter Blood Pressure of a patient</div>
    
  </div>
 
  <button type='submit' class="btn btn-primary" name="submit">Update</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>