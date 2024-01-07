<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Edit Guardian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>    Update, Delete or View any Guardian's record!</h1>
    <!--box code starts-->
    <div class="container">
    <form action="admin_edit_guardian.php" method="POST">
  <div class="mb-3">
    <label for="patientguardianid" class="form-label">Patient ID of the Guardian</label>
    <input type="text" class="form-control" id="patientguardianid" name="patientguardianid">
    <div>Please enter Patient ID of the Guardian</div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
  <!--box code ends-->

 <!--table display starts-->
 <div class = "container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Guardian of Patient_ID</th>
      <th scope="col">Guardian of Patient Name</th>
      <th scope="col">Guardian Name</th>
      <th scope="col">Address</th>
      <th scope="col">Phone</th>
      
    </tr>
  </thead>
  <tbody>
    
  <?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->


    //<!--Post Method starts-->
  $patientguardianid=$_POST['patientguardianid'];

  
  
  //value passing in the variable


  $sql="select P.Patient_id, P.Name,G.Guardian_Name,G.Address,G.Phone from patient P, P_guardian G where P.Patient_id=G.P_id and P.Patient_id='$patientguardianid';";
  $result=mysqli_query($conn,$sql);
  $result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple
//<!--Post Method ends-->

    

 //printing values from the dict
    echo "<tr>
     
      <td>".$result_row['Patient_id']."</td>
      <td>".$result_row['Name']."</td>
      <td>".$result_row['Guardian_Name']."</td>
      <td>".$result_row['Address']."</td>
      <td>".$result_row['Phone']."</td>
      <td>
      <button class='btn '><a href='admin_edit_guardian_update.php?updateid=". $patientguardianid."'>Update</a></button>
      <button class='btn '><a href='admin_edit_guardian_delete.php?deleteid=". $patientguardianid."'>Delete</a></button>
      </td>
      </tr>";
      
      
 
} 
      ?>
  
    
  </tbody>
</table>

  </body>
</html>