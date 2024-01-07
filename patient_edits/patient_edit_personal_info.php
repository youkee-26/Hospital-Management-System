<?php
include '../dbconnect.php';
//echo "Patient Personal Info";

$patient_id = $_GET['id'];
//echo $patient_id;
// if(isset($_POST['submit'])){
//   echo "Set hoise";
// }
// else{
//   echo "Set hoynai";
// }



if(isset($_POST['submit'])){
  $to_change = $_POST['field'];
  $old = $_POST['Old_Info'];
  $new = $_POST['New_Info'];
  $password = $_POST['Password'];

  $sql = "SELECT * from patient where Patient_ID = '$patient_id'";
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
  $pass = $row['Password'];

  if ($password != $pass){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>SORRY!</strong> Wrong password entered. Profile not updated. Try again
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }else{
    if ($to_change == "Name"){
      //echo "   Name change korbo   ";
      if($old == $name){
        //echo "       Name matches        ";
        $sql = "UPDATE patient SET $to_change = '$new' WHERE Patient_ID = '$patient_id'";
        $result = mysqli_query($conn, $sql);

        if ($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SUCCESS!</strong> Your name has been updated
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

        }

      }
      else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>SORRY!</strong> Wrong old data entered. Profile not updated. Try again
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

      }
    }
    elseif ($to_change == "Age"){
      if($old == $age){
        //echo "       Name matches        ";
        $sql = "UPDATE patient SET $to_change = '$new' WHERE Patient_ID = '$patient_id'";
        $result = mysqli_query($conn, $sql);

        if ($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SUCCESS!</strong> Your age has been updated
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';

        }

      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>SORRY!</strong> Wrong old data entered. Profile not updated. Try again
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
    }
    elseif ($to_change == "Address"){
      if($old == $address){
        $sql = "UPDATE patient SET $to_change = '$new' WHERE Patient_ID = '$patient_id'";
        $result = mysqli_query($conn, $sql);

        if ($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SUCCESS!</strong> Your address has been updated
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>SORRY!</strong> Wrong old data entered. Profile not updated. Try again
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
    }
    elseif ($to_change == "Phone"){
      if($old == $phone){
        //echo "       Name matches        ";
        $sql = "UPDATE patient SET $to_change = '$new' WHERE Patient_ID = '$patient_id'";
        $result = mysqli_query($conn, $sql);

        if ($result){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>SUCCESS!</strong> Your phone number has been updated
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

      }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>SORRY!</strong> Wrong old data entered. Profile not updated. Try again
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
      }
    }
  }
}




?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patient Profile Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Update Profile</a>
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


      <h1>&nbsp&nbspMake changes</h1> <?php //&nsp adds space in html ?>

      <div class="container">
        <form method = "post">


        <div class="form-group">
          <label for="exampleInputEmail1">Patient_ID</label>
          <input type="patient_ID" class="form-control" placeholder="Enter your ID" name = "PAT_ID">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" placeholder="Password" name = "Password">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Enter field to update</label>
            <input type="field" class="form-control" placeholder="Name/Age/Address/Phone" name = "field">
          </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Old Info</label>
          <input type="oldinfo" class="form-control" placeholder="Old data" name = "Old_Info">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">New Info</label>
          <input type="newinfo" class="form-control" placeholder="New data" name = "New_Info">
        </div>

          <button type="submit" class="btn btn-primary" name = "submit">Update</button>
          </form>
          </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

