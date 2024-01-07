<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>    Update, Delete or View record of any doctor!</h1>
    <!--box code starts-->
    <div class="container">
    <form action="admin_edit_doctor.php" method="POST">
  <div class="mb-3">
    <label for="Doctor ID" class="form-label">Doctor ID</label>
    <input type="text" class="form-control" id="doctorid" name="doctorid">
    <div>Please enter the Doctor ID.</div>
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
      
      <th scope="col">Doctor ID</th>
      <th scope="col">Name</th>
      <th scope="col">Address</th>
      <th scope="col">Department</th>
      <th scope="col">Designation</th>
      <th scope="col">Chamber Timing</th> <!---->
      <th scope="col">Degree</th> <!---->
      <th scope="col">Fee per appointment</th>
      <th scope="col">Fee per surgery</th>
      <th scope="col">Offday</th>  
      
    </tr>
  </thead>
  <tbody>
    
  <?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->


    //<!--Post Method starts-->
  $doctorid=$_POST['doctorid'];

  
  
  //value passing in the variable


  $sql="select * from doctor where Doctor_id='$doctorid'";
  $result=mysqli_query($conn,$sql);
  $result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple
  $sql2="select * from doctor_chamber_timing where Doctor_id='$doctorid'";
  $result2=mysqli_query($conn,$sql2);
  $result_row2 = mysqli_fetch_assoc($result2);//forming a dict from the obtained tuple
  $sql3="select * from doctor_degree where Doctor_id='$doctorid'";
  $result3=mysqli_query($conn,$sql3);
  $result_row3 = mysqli_fetch_assoc($result3);//forming a dict from the obtained tuple
  

//<!--Post Method ends-->

    

 //printing values from the dict
    echo "<tr>
      
      <td>".$result_row['Doctor_id']."</td>
      <td>".$result_row['Name']."</td>
      <td>".$result_row['Address']."</td>
      <td>".$result_row['Department']."</td>
      <td>".$result_row['Designation']."</td>
      <td>".$result_row2['Chamber_timing']."</td>
      <td>".$result_row3['Degree']."</td>
      <td>".$result_row['Fee_per_appointment']."</td>
      <td>".$result_row['Fee_per_surgery']."</td>
      <td>".$result_row['Offday']."</td>
     
      <button class='btn '><a href='admin_edit_doctor_update.php?updateid=".$doctorid."'>Update</a></button>
      <button class='btn '><a href='admin_edit_doctor_delete.php?deleteid=". $doctorid."'>Delete</a></button>
      </td>
      </tr>";
      
      
 
} 
      ?>
  
    
  </tbody>
</table>

  </body>
</html>