<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->
if(isset($_GET['updateid'])) {  //get method is used to fetch info from url
    $patientguardianid=$_GET['updateid'];}
if(isset($_POST['submit'])){
  $guardianname=$_POST['guardianname'];
  $guardianaddress=$_POST['guardianaddress'];
  $guardianphone=$_POST['guardianphone'];

  
  //value passing in the variable'
  $sql="update P_guardian set Guardian_name='$guardianname', Address='$guardianaddress',Phone ='$guardianphone' where P_id='$patientguardianid'"; 
  $result=mysqli_query($conn,$sql);
  
  if($result){
    echo "A Guardian's Record has been updated successfully!";
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
    <title>Admin Update Guardian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   <h1> Hello, Admin! Update a Guardian's Record.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE update FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Name of a Guardian</label>
    <input type="text" class="form-control" id="guardianname" name="guardianname">
    <div> Enter name of a guardian </div>
  </div>
  
  <div class="mb-3">
    <label>Address</label>
    <input type="text" class="form-control" id="guardianaddress" name="guardianaddress">
    <div> Enter Address of a guardian</div>
    </div>
  <div class="mb-3">
    <label>Phone number</label>
    <input type="text" class="form-control" id="guardianphone" name="guardianphone">
    <div>Enter Phone Number of a guardian</div>
    
  </div>
  
 
  <button type='submit' class="btn btn-primary" name="submit">Update</button>
</form>
 <!-- THE update FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>