<?php
include '../dbconnect.php';
echo "Patient Set Appointment";
$patient_id = $_GET['id'];
echo $patient_id;

// $appointment_constant = 20;
// if(isset($_POST['submit'])){
//     $doctor = $_POST['Doctor_name'];
//     $department = $_POST['Department_name'];

//     if($department == ""){
//         $sql = "SELECT doctor.Doctor_ID, Name, Department, Designation, Chamber_timing, Offday, Fee_per_appointment from (doctor_chamber_timing inner join doctor on doctor_chamber_timing.Doctor_id = doctor.Doctor_id) where Name = '$doctor'";
//         $result = mysqli_query($conn, $sql); 

//         while ($row = mysqli_fetch_assoc($result)){
//             echo "Enter 1";
//             $doc_name = $row['Name'];
            
//             $sql = "SELECT count(*) from (doctor inner join offers on doctor.Doctor_id = offers.Doctor_id) where Name = '$doctor' and service_serial like 'A%'";
//             $result = mysqli_query($conn, $sql);
//             if (!$result){
//                 echo "Genjam";
//             }

//             $num = mysqli_num_rows($result);
//             echo "There are " . $num . " rows in my table.";


//             if($appointment_constant - $num >= 0){
//                 echo "Enter 2";
//                 $doctor_id = $row['Doctor_ID'];
//                 $department = $row['Department'];
//                 $designation = $row['Designation'];
//                 $chamber_timings = $row['Chamber_timing'];
//                 $offday = $row['Offday'];
//                 $Fee_per_appointment = $row['Fee_per_appointment'];

//                 echo "<tr>
//                 <td>". $doctor_id."</td>
//                 <td>". $doctor ."</td>
//                 <td>". $department."</td>
//                 <td>". $designation."</td>
//                 <td>". $chamber_timings."</td>
//                 <td>". $offday ."</td>
//                 <td>". $Fee_per_appointment ."</td>
//                 <td>". "<a href='book'>Book</a>"."</td>
//                 </tr>";
//             }
//         }    

//     }
// }  
    
// ?>

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
          <a class="navbar-brand" href="#">Available Appointments</a>
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

    <div class="container">
        <form method = "post">
        <div class="form-group">
          <label for="exampleInputEmail1">Doctor</label>
          <input type="doctor" class="form-control" placeholder="Search by name of doctor" name = "Doctor_name">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Department</label>
          <input type="department" class="form-control" placeholder="Search by name of department" name = "Department_name">
        </div>

          <button type="submit" class="btn btn-primary" name = "submit">Search</button>
          </form>
    </div>

    <div class = "container">
      <table class="table">
        <thead>
            <tr>
            <th scope="col">Doctor ID</th>
            <th scope="col">Doctor Name</th>
            <th scope="col">Department</th>
            <th scope="col">Designation</th>
            <th scope="col">Chamber timing</th>
            <th scope="col">Offday</th>
            <th scope="col">Fee per appointment</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
        $appointment_constant = 20;

        if(isset($_POST['submit'])){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>REMINDER:</strong> You must pay BDT. 200 to book your appointment
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

            $doctor = $_POST['Doctor_name'];
            $department = $_POST['Department_name'];

            if($department == ""){
                $sql = "SELECT doctor.Doctor_ID, Name, Department, Designation, Chamber_timing, Offday, Fee_per_appointment from (doctor_chamber_timing inner join doctor on doctor_chamber_timing.Doctor_id = doctor.Doctor_id) where Name = '$doctor'";
                $result1 = mysqli_query($conn, $sql); 

                $num = mysqli_num_rows($result1);

                if($num == 0){
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>SORRY!</strong> No matches found
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }

                while ($row = mysqli_fetch_assoc($result1)){
                    //echo "Enter 1";
                    $doc_name = $row['Name'];
                    
                    $sql = "SELECT * from (doctor inner join offers on doctor.Doctor_id = offers.Doctor_id) where Name = '$doctor' and service_serial like 'A%'";
                    $result = mysqli_query($conn, $sql);
                    // if (!$result){
                    //     echo "Genjam";
                    // }


                    if($appointment_constant - $num >= 0){
                        //echo "Enter 2";
                        $doctor_id = $row['Doctor_ID'];
                        $department = $row['Department'];
                        $designation = $row['Designation'];
                        $chamber_timings = $row['Chamber_timing'];
                        $offday = $row['Offday'];
                        $Fee_per_appointment = $row['Fee_per_appointment'];

                        echo "<tr>
                        <td>". $doctor_id."</td>
                        <td>". $doctor ."</td>
                        <td>". $department."</td>
                        <td>". $designation."</td>
                        <td>". $chamber_timings."</td>
                        <td>". $offday ."</td>
                        <td>". $Fee_per_appointment ."</td>
                        <td>". "<a href='../patient_edits/book.php?pid=".$patient_id."&did=".$doctor_id."&dn=".$doctor."&fpa=".$Fee_per_appointment."'>Book</a>"."</td>  
                        </tr>";
                    }
                }    

            }
            elseif ($doctor == "") {
              //we deal as department wisedocs

              $sql = "SELECT doctor.Doctor_ID, Name, Department, Designation, Chamber_timing, Offday, Fee_per_appointment from (doctor_chamber_timing inner join doctor on doctor_chamber_timing.Doctor_id = doctor.Doctor_id) where Department = '$department'";
              $result1 = mysqli_query($conn, $sql); 
              
              $num = mysqli_num_rows($result1);

                if($num == 0){
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>SORRY!</strong> No matches found
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }

              while ($row = mysqli_fetch_assoc($result1)){
                //echo "Enter 1";
                $doc_name = $row['Name'];
                
                $sql = "SELECT * from (doctor inner join offers on doctor.Doctor_id = offers.Doctor_id) where Name = '$doctor' and service_serial like 'A%'";
                $result = mysqli_query($conn, $sql);
                if (!$result){
                    echo "Genjam";
                }

                $num = mysqli_num_rows($result);


                if($appointment_constant - $num >= 0){
                    //echo "Enter 2";
                    $doctor_id = $row['Doctor_ID'];
                    $department = $row['Department'];
                    $designation = $row['Designation'];
                    $chamber_timings = $row['Chamber_timing'];
                    $offday = $row['Offday'];
                    $Fee_per_appointment = $row['Fee_per_appointment'];

                    echo "<tr>
                    <td>". $doctor_id."</td>
                    <td>". $doc_name ."</td>
                    <td>". $department."</td>
                    <td>". $designation."</td>
                    <td>". $chamber_timings."</td>
                    <td>". $offday ."</td>
                    <td>". $Fee_per_appointment ."</td>
                    <td>". "<a href='../patient_edits/book.php?id=<?php echo $patient_id ?>'>Book</a>"."</td>  
                    </tr>";
                }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>SORRY!</strong> No slots available
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
              }

            }
            elseif ($doctor != "" && $department != "") {
              $sql = "SELECT doctor.Doctor_ID, Name, Department, Designation, Chamber_timing, Offday, Fee_per_appointment from (doctor_chamber_timing inner join doctor on doctor_chamber_timing.Doctor_id = doctor.Doctor_id) where Department = '$department' and Name = '$doctor'";
              $result1 = mysqli_query($conn, $sql); 

              $num = mysqli_num_rows($result1);

                if($num == 0){
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>SORRY!</strong> No matches found
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }

              while ($row = mysqli_fetch_assoc($result1)){
                //echo "Enter 1";
                $doc_name = $row['Name'];
                
                $sql = "SELECT * from (doctor inner join offers on doctor.Doctor_id = offers.Doctor_id) where Name = '$doctor' and service_serial like 'A%'";
                $result = mysqli_query($conn, $sql);
                // if (!$result){
                //     echo "Genjam";
                // }

                $num = mysqli_num_rows($result);
    

                //echo "There are " . $num . " rows in my table.";


                if($appointment_constant - $num >= 0){
                    //echo "Enter 2";
                    $doctor_id = $row['Doctor_ID'];
                    $doc_namee = $row['Name'];
                    $department = $row['Department'];
                    $designation = $row['Designation'];
                    $chamber_timings = $row['Chamber_timing'];
                    $offday = $row['Offday'];
                    $Fee_per_appointment = $row['Fee_per_appointment'];

                    echo "<tr>
                    <td>". $doctor_id."</td>
                    <td>". $doctor ."</td>
                    <td>". $department."</td>
                    <td>". $designation."</td>
                    <td>". $chamber_timings."</td>
                    <td>". $offday ."</td>
                    <td>". $Fee_per_appointment ."</td>
                    <td>". "<a href='../patient_edits/book.php?pid=".$patient_id."&did=".$doctor_id."&dn=".$doctor."&fpa=".$Fee_per_appointment."'>Book</a>"."</td>  
                    </tr>";
                }else{
                  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>SORRY!</strong> No slots available
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  
                  </div>';
                }
              }
            }
            elseif($doctor == "" and $department == ""){
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>WARNING!</strong> You must have data in one of the search bars for valid query
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        }  
            
        ?>
            
        </tbody>
    </table>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!--  NAVBAR  -->  
</body>
</html>
























