<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Views Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>    View your Appointments!</h1>
    <!--box code starts-->

  <!--box code ends-->

 <!--table display starts-->
 <div class = "container">
<table class="table">
  <thead>
    <tr>
      
    <th scope="col">Appointment Serial</th>
    <th scope="col">Date</th>
    <th scope="col">Time</th>
    
      
    </tr>
  </thead>
  <tbody>
    
  <?php


    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->
    $id = $_GET['id'];

    //<!--Post Method starts-->
  

  
  
  //value passing in the variable

   
  $sql="Select S.Serial,S.Date,S.Time from services S, offers O where S.Serial = O.service_serial and O.Doctor_id ='$id' and S.Serial like 'A%';";
  $result=mysqli_query($conn,$sql);
  #$result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple
 

//<!--Post Method ends-->

    
    while($result_row = mysqli_fetch_assoc($result)){
 //printing values from the dict
    echo "<tr>
     
      <td>".$result_row['Serial']."</td>
      <td>".$result_row['Date']."</td>
      <td>".$result_row['Time']."</td>
      
      <td>
      
      </td>
      </tr>";
      
      
    }

      ?>
  
    
  </tbody>
</table>

  </body>
</html>



