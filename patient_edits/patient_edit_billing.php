<?php
include '../dbconnect.php';
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

    <title>Your payments</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Pending Payments</a>
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
      
      <th scope="col">Service serial</th>
      <th scope="col">Service Avail Date</th>
      <th scope="col">Service Avail Time</th>
      <th scope="col">Billing ID</th>
      <th scope="col">Remaining</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT p_id, services.serial, b_id, services.date, services.time, remaining from ((takes inner join services on takes.service_serial = services.Serial) inner join billing on services.Serial = billing.Service_Serial_no) where p_id = '$patient_id' and status = 'Unpaid'";
        //getting all info
        $result = mysqli_query($conn, $sql); 

        // $sql2 = "SELECT sum(remaining) from ((takes inner join services on takes.service_serial = services.Serial) inner join billing on services.Serial = billing.Service_Serial_no) where p_id = '$patient_id' and status = 'Unpaid'";
        // $result2 = mysqli_query($conn, $sql2); 

        $total = 0;

        while ($row = mysqli_fetch_assoc($result)){
            $serial = $row['serial'];
            $date = $row['date'];
            $time = $row['time'];
            $billing_id = $row['b_id'];
            $remaining = $row['remaining'];
            $total = $total + $remaining;

            echo "<tr>
                <td>". $serial."</td> 
                <td>". $date."</td>
                <td>". $time ."</td>
                <td>". $billing_id ."</td>
                <td>". "BDT ".$remaining ."</td>
                </tr>";

            //echo "Ekhon total".$total."<br>";
        }

    ?>
    <div class = "container">
        <?php
        if($total == 0){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>NO WORRIES!</strong> All your payments have been cleared.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
          
        }
        else{
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>WARNING!</strong> Clear your dues asap. <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        
        ?>
    </div>

    </tbody>
  </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
  
</html>





