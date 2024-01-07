<?php
include '../dbconnect.php';
//echo "Patient Check Appointment";
$patient_id = $_GET['id'];
//echo $patient_id;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Appointments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!--  NAVBAR  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Your Appointments</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            
            
            <!-- adding options in the navbar, href is used to redirect to a new page-->    
                <li class="nav-item">
                    <a class="nav-link" href='../seperate_homepage/patient_homepage.php'>Return to homepage</a>
                  </li>
            </ul>
            
          </div>
        </div>
      </nav>

      <div class = "container">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Serial</th>
            <th scope="col">Doctor</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $patientid = $_GET['id'];
            //echo $patientid;
            $sql = "SELECT Serial, Date, Time, Doctor_id, Description FROM ((takes inner join services on takes.service_serial = services.serial) inner join offers on takes.service_serial = offers.service_serial) where takes.p_id = '$patient_id' and serial like 'A%'";
            $result = mysqli_query($conn, $sql);
            // echo "<br>";
            // echo mysqli_num_rows($result);
            

            while ($row = mysqli_fetch_assoc($result)){

              $serial = $row['Serial'];
              $doctor_id = $row['Doctor_id'];
              $date = $row['Date'];
              $time = $row['Time'];
              $description = $row['Description'];
              
              //echo $name, $age, $blood_group, $blood_pressure, $weight, $gender, $address, $phone;

              echo "<tr>
              <td>". $serial."</td>
              <td>". $doctor_id."</td>
              <td>". $date."</td>
              <td>". $time."</td>
              <td>". $description ."</td>
              </tr>";
            }    
      ?>
            
      </tbody>
    </table>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!--  NAVBAR  -->  
</body>
</html>