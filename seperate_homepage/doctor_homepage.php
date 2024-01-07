<?php
include "..\dbconnect.php";
$doctorid = $_GET['id'];

$sql = "SELECT * from doctor where Doctor_id = '$doctorid'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $name = $row['Name'];

?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!--  NAVBAR  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CRUD Operation for Doctors Only</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            
            
            <!-- adding options in the navbar, href is used to redirect to a new page-->    
          
                <li class="nav-item">
                    <a class="nav-link" href='../doctor_edits/doctor_edit_patient.php'>Patient</a>
                 
                  <li class="nav-item">
                    <a class="nav-link" href='../doctor_edits/doctor_edit_appointment.php?id=<?php echo $doctorid ?>'>Appointment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../doctor_edits/doctor_edit_prescription.php'>Prescription</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../doctor_edits/doctor_edit_report.php'>Report</a>
                  </li>
                  
                 <!-- adding options in the navbar, href is used to redirect to a new page--> 
              
            </ul>
            
          </div>
        </div>
      </nav>
      <h1>Weclome Doctor  <?php echo $name ?> &nbsp&nbsp&nbsp&nbsp</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>


    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!--  NAVBAR  -->  


<div class = "container">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Password</th>
            <th scope="col">Doctor ID</th>
            <th scope="col">Department</th>
            <th scope="col">Designation</th>
            <th scope="col">Fee_per_appointment</th>
            <th scope="col">Fee_per_appointment</th>
            
            <th scope="col">Address</th>
            <th scope="col">Offday</th>
            
            </tr>
        </thead>
        <tbody>
        <?php
            $doctorid = $_GET['id'];
            //echo $patientid;
            $sql = "SELECT * from doctor where Doctor_id = '$doctorid'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $name = $row['Name'];
            $pass = $row['Password'];
            $dept = $row['Department'];
            $des = $row['Designation'];
            $address = $row['Address'];
            $fpa = $row['Fee_per_appointment'];
            $fps = $row['Fee_per_appointment'];
            $offday = $row['Offday'];
            

            //echo $name, $age, $blood_group, $blood_pressure, $weight, $gender, $address, $phone;

            echo "<tr>
            <td>". $name."</td>
            <td>". $pass."</td>
            <td>". $doctorid."</td>
            <td>". $dept."</td>
            <td>". $des ."</td>
            
            <td>". $fpa."</td>
            <td>". $fps."</td>
            <td>". $address."</td>
            <td>". $offday."</td>

            
          </tr>"
                
      ?>
            
        </tbody>
    </table>





</body>
</html>