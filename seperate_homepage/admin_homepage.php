<?php
include "..\dbconnect.php";
$adminid = $_GET['id'];

$sql = "SELECT * from administrator where admin_id = '$adminid'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $name = $row['Name'];

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!--  NAVBAR  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CRUD Operation for Admins Only</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            
            
            <!-- adding options in the navbar, href is used to redirect to a new page-->    
            <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_doctor.php'>Doctor</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_patient.php'>Patient</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_guardian.php'>Guardian</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_appointment.php'>Appointment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_prescription.php'>Prescription</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_report.php'>Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_icu.php'>ICU</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../admin_edits/admin_edit_billing.php'>Billing</a>
                  </li>
                 <!-- adding options in the navbar, href is used to redirect to a new page--> 
              
            </ul>
            
          </div>
        </div>
      </nav>
    <h1>Weclome Admin  <?php echo $name ?> &nbsp&nbsp&nbsp&nbspView, Update or Delete a record</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!--  NAVBAR  -->  





<div class = "container">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Password</th>
            <th scope="col">Admin ID</th>
            <th scope="col">Salary</th>
            <th scope="col">Supervisor ID</th>
            
            <th scope="col">Address</th>
            
            </tr>
        </thead>
        <tbody>
        <?php
            $adminid = $_GET['id'];
            //echo $patientid;
            $sql = "SELECT * from administrator where admin_id = '$adminid'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $name = $row['Name'];
            $pass = $row['Password'];
            $salary = $row['Salary'];
            $sid = $row['Supervisor_id'];
            $address = $row['Address'];
            

            //echo $name, $age, $blood_group, $blood_pressure, $weight, $gender, $address, $phone;

            echo "<tr>
            <td>". $name."</td>
            <td>". $pass."</td>
            <td>". $adminid."</td>
            <td>". $salary."</td>
            <td>". $sid ."</td>
            
            <td>". $address."</td>
            
          </tr>"
                
      ?>
            
        </tbody>
    </table>
</body>
</html>