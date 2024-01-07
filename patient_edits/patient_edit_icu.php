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

    <title>ICU status</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Intensive Care Units at Asha</a>
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
        <div class = "container">
            <button type="show_all" class="btn btn-primary" name = 'show_all'>Search availabilty now</button>
        </div>

<div class = "container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">ICU Serial</th>
      <th scope="col">Room number</th>
      <th scope="col">Bed number</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_POST['show_all'])){
        $sql = "SELECT * from icu where Discharge_date is not NULL";
        //getting all info
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);

        $num = mysqli_num_rows($result);

        if($num == 0){
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>SORRY!</strong> No ICU available at the moment <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }else{
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>ICU Available</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }


        while ($row = mysqli_fetch_assoc($result)){
            $serial = $row['Serial'];
            $room = $row['Room_no'];
            $bed = $row['Bed_no'];


            echo "<tr>
                <td>". $serial."</td> 
                <td>". $room."</td>
                <td>". $bed ."</td>
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





