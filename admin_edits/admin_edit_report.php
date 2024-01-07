<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Edit Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>    Update, Delete or View any Report!</h1>
    <!--box code starts-->
    <div class="container">
    <form action="admin_edit_report.php" method="POST">
  <div class="mb-3">
    <label for="reportserial" class="form-label">Report serial</label>
    <input type="text" class="form-control" id="reportserial" name="reportserial">
    <div>Please enter the Report Serial.</div>
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
      
      <th scope="col">report serial</th>
      <th scope="col">report ID</th>
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
  $reportserial=$_POST['reportserial'];

  
  
  //value passing in the variable


  $sql="select * from report where Serial='$reportserial'";
  $result=mysqli_query($conn,$sql);
  $result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple
  $sql2="select * from services where Serial='$reportserial'";
  $result2=mysqli_query($conn,$sql2);
  $result_row2 = mysqli_fetch_assoc($result2);//forming a dict from the obtained tuple


//<!--Post Method ends-->

    

 //printing values from the dict
    echo "<tr>
      <td>".$result_row2['Serial']."</td>
      <td>".$result_row['Report_id']."</td>
     
      <td>".$result_row2['Date']."</td>
      <td>".$result_row2['Time']."</td>
      <td>".$result_row2['Description']."</td>
     
    
      <td>
      
      
      </td>
      </tr>";
      
      
 
} 
      ?>
  
    
  </tbody>
</table>

  </body>
</html>