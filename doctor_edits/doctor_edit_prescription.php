<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Edit Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>   Hello Doctor, View any Prescription!</h1>
    <!--box code starts-->
    <div class="container">
    <form action="doctor_edit_prescription.php" method="POST">
  <div class="mb-3">
    <label for="patientid" class="form-label">Patient ID</label>
    <input type="text" class="form-control" id="patientid" name="patientid">
    <div>Please enter the patient ID.</div>
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
      
      <th scope="col">Prescription serial</th>
      <th scope="col">Prescription medicine</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Description</th>
      
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


   $sql="Select S.Serial,S.Date,S.Time,S.Description,M.Pres_medicine from services S,prescription_medicine M,takes T where M.Serial=T.service_serial  and T.service_serial=S.serial and T.p_id ='$patientid' and M.Serial like 'P%';";
   $result=mysqli_query($conn,$sql);

 
   #$result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple

    //<!--Post Method ends-->
   echo"<button class='btn '><a href='doctor_edit_prescription_insert.php?insertid=". $patientid."'>Insert a New Prescription</a></button>";
    while($result_row = mysqli_fetch_assoc($result)){
    //printing values from the dict
    
    echo "<tr>
     
      <td>".$result_row['Serial']."</td>
      <td>".$result_row['Pres_medicine']."</td>
      <td>".$result_row['Date']."</td>
      <td>".$result_row['Time']."</td>
      <td>".$result_row['Description']."</td>
      
      <td>
      </td>
      </tr>";
     
    }
}
      ?>
      
 
  
    
  </tbody>
</table>

  </body>
</html>