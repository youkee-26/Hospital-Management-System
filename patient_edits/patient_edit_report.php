<?php
include '../dbconnect.php';
//echo "Patient Prescription";
$patient_id = $_GET['id'];
?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Your reports</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Your Reports</a>
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
    <form method="POST" my = 20>
  <div class="mb-10">
    <label for="Report" class="form-label">Search reports by date</label>
    <input type="Report" class="form-control" id="appointmentserial" name="search_year">
    <div>Entry format: YYYY-DD-MM</div>
  </div>
  <button type="submit" class="btn btn-primary" name = 'submit'>Search</button><button type="show_all" class="btn btn-primary" name = 'show_all'>Show All</button>

<div class = "container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Report Serial</th>
      <th scope="col">Report ID</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Description</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_POST['submit'])){
      //echo 2;

      $date =  $_POST['search_year'];

      if($date == ""){
        
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>WARNING!</strong> MUST ENTER DATE <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }else{
      
      $sql = "SELECT report.Serial, Report.report_id, date, time, description from ((takes inner join services on takes.service_serial = services.serial) inner join report on report.Serial = services.serial) where takes.p_id = '$patient_id' and date = '$date' and services.serial like 'R%' order by date desc, time desc";
      //getting all info
      $result = mysqli_query($conn, $sql); 
      $num = mysqli_num_rows($result);

      if($num == 0){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>SORRY!</strong> No matches found <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
      }
  
      while ($row = mysqli_fetch_assoc($result)){
        //echo "Enter 1";
        $Report_serial = $row['Serial'];
        $Report_id = $row['report_id'];
        $date = $row['date'];
        $time = $row['time'];
        $description = $row['description'];
  
        // $sql1 = "SELECT Pres_medicine as medicines from (((takes inner join services on takes.service_serial = services.serial) inner join prescription on takes.service_serial = prescription.Serial) inner join prescription_medicine on prescription.Press_id = prescription_medicine.press_id) where takes.p_id = '$patient_id'";
        // //to list out medicines
        // $result1 = mysqli_query($conn, $sql); 
        // echo mysqli_num_rows($result);
        // echo var_dump($result1);
  
        // while ($row = mysqli_fetch_assoc($result1)){
        //   $medicines = $medicine.$row['medicines'];
        // }
  
        // echo $medicines;
  
  
        echo "<tr>
        <td>". $Report_serial."</td> 
        <td>". $Report_id."</td>
        <td>". $date ."</td>
        <td>". $time."</td>
        <td>". $description."</td>
        </tr>";

      }
    }
  }
    elseif(isset($_POST['show_all'])){
    $sql = "SELECT report.Serial, Report.report_id, date, time, description from ((takes inner join services on takes.service_serial = services.serial) inner join report on report.Serial = services.serial) where takes.p_id = '$patient_id' and services.serial like 'R%' order by date desc, time desc";
    //getting all info
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);

    if($num == 0){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>SORRY!</strong> No reports found <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }

    while ($row = mysqli_fetch_assoc($result)){
      //echo "Enter 1";
      $Report_serial = $row['Serial'];
      $Report_id = $row['report_id'];
      $date = $row['date'];
      $time = $row['time'];
      $description = $row['description'];


      // $sql1 = "SELECT Pres_medicine as medicines from (((takes inner join services on takes.service_serial = services.serial) inner join prescription on takes.service_serial = prescription.Serial) inner join prescription_medicine on prescription.Press_id = prescription_medicine.press_id) where takes.p_id = '$patient_id'";
      // //to list out medicines
      // $result1 = mysqli_query($conn, $sql); 
      // echo mysqli_num_rows($result);
      // echo var_dump($result1);

      // while ($row = mysqli_fetch_assoc($result1)){
      //   $medicines = $medicine.$row['medicines'];
      // }

      // echo $medicines;


      echo "<tr>
        <td>". $Report_serial."</td> 
        <td>". $Report_id."</td>
        <td>". $date ."</td>
        <td>". $time."</td>
        <td>". $description."</td>
        </tr>";



    }
    }
    
    ?>


    </tbody>
  </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  
</html>





