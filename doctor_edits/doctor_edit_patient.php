<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Views Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>    View any Patient's record!</h1>
    <!--box code starts-->
    <div class="container">
    <form  method="POST">
  <div class="mb-3">
    <label for="patientid" class="form-label">Patient ID</label>
    <input type="text" class="form-control" id="patientid" name="patientid">
    <div>Please enter the Patient ID</div>
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
      
      <th scope="col">Patient_ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Blood_Group</th>
      <th scope="col">Weight</th>
      <th scope="col">Blood_Pressure</th>
      <th scope="col">Gender</th>
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
  $patientid=$_POST['patientid'];

  
  
  //value passing in the variable


  $sql="select * from patient where Patient_id='$patientid'";
  $result=mysqli_query($conn,$sql);
  $result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple
 

//<!--Post Method ends-->

    

 //printing values from the dict
    echo "<tr>
     
      <td>".$result_row['Patient_id']."</td>
      <td>".$result_row['Name']."</td>
      <td>".$result_row['Age']."</td>
      <td>".$result_row['Blood_Group']."</td>
      <td>".$result_row['Weight']."</td>
      <td>".$result_row['Blood_Pressure']."</td>
      <td>".$result_row['Gender']."</td>
      <td>".$result_row['Address']."</td>
      <td>".$result_row['Phone']."</td>
      <td>
      
      </td>
      </tr>";
      
      
 
} 
      ?>
  
    
  </tbody>
</table>

  </body>
</html>