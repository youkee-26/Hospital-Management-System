<?php
include "..\dbconnect.php";
$patientid = $_GET['id'];
?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <!--  NAVBAR  -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CRUD Operation for Patients Only</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
            
            
            <!-- adding options in the navbar, href is used to redirect to a new page-->    
                <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_personal_info.php?id=<?php echo $patientid ?>'>Update Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_checkappointment.php?id=<?php echo $patientid ?>'>Check Appointment</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_setappointment.php?id=<?php echo $patientid ?>'>Set Appointment</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_prescription.php?id=<?php echo $patientid ?>'>Prescription</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_report.php?id=<?php echo $patientid ?>'>Report</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_icu.php?id=<?php echo $patientid ?>'>ICU</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href='../patient_edits/patient_edit_billing.php?id=<?php echo $patientid ?>'>Billing</a>
                  </li>
                 <!-- adding options in the navbar, href is used to redirect to a new page--> 
              
            </ul>
            
          </div>
        </div>
      </nav>

      <h1>&nbsp&nbspYour account</h1> <?php //&nsp adds space in html ?>

      <div class = "container">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Blood group</th>
            <th scope="col">Weight</th>
            <th scope="col">Blood Pressure</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $patientid = $_GET['id'];
            //echo $patientid;
            $sql = "SELECT * from patient where Patient_ID = '$patientid'";
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_assoc($result);

            $name = $row['Name'];
            $age = $row['Age'];
            $blood_group = $row['Blood_Group'];
            $weight = $row['Weight'];
            $blood_pressure = $row['Blood_Pressure'];
            $gender = $row['Gender'];
            $address = $row['Address'];
            $phone = $row['Phone'];

            //echo $name, $age, $blood_group, $blood_pressure, $weight, $gender, $address, $phone;

            echo "<tr>
            <td>". $name."</td>
            <td>". $age."</td>
            <td>". $blood_group."</td>
            <td>". $weight."</td>
            <td>". $blood_pressure ."</td>
            <td>". $gender."</td>
            <td>". $address."</td>
            <td>". $phone."</td>
          </tr>"
                
      ?>
            
        </tbody>
    </table>
    
      
      
    

    <div class="container">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!--  NAVBAR  -->  
</body>
</html>