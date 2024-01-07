<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../dbconnect.php';//dbconnect
    $patientid = $_POST["patientid"];
    $patientpassword = $_POST["patientpassword"];
    
    
        $sql = "select * from Patient where  Patient_ID= '$patientid' and Password='$patientpassword'";
        $result = mysqli_query($conn, $sql);
        $num=mysqli_num_rows( $result );  //sql problem
        if ($num==1){
            $login = true;
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['patientid'] = $patientid;
            header("location: ../seperate_homepage/patient_homepage.php?id=".$patientid." ");//redirects

        
        }
        else{
            
            $showError = "You have inserted wrong credentials.Please insert valid credentials";
        }
}
    
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Patient Login</title>
  </head>
  <body>
    
    <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
     <h1 class="text-center"> Patient Login </h1>
     <form action="patient_login.php" method="post">
        <div class="form-group">
            <label for="patientid">Patient ID</label>
            <input type="text" class="form-control" id="patientid" name="patientid" aria-describedby="emailHelp">
            
        </div>
        <div class="form-group">
            <label for="patientpassword">Patient Password</label>
            <input type="password" class="form-control" id="patientpassword" name="patientpassword">
        </div>
        
         
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="doctor_login.php"><button type="button" class="btn btn-link" href='doctor_login.php'>I am a Doctor</button></a>
        <a href="admin_login.php"><button type="button" class="btn btn-link" href='admin_login.php'>I am a Admin</button></a>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
