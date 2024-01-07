<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../dbconnect.php';
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    
    $sID = $_POST["sID"];
    $addr = $_POST["address"];
   
    
    

    $flag_3 = false;
    $pass_check = "Select * from administrator where password='$pass';";
    $result_3 = mysqli_query($conn, $pass_check);
    $result_3_row = mysqli_fetch_assoc($result_3);
    if($result_3_row==NULL){
        $flag_3 = true;
    }
    
    
    
    if($flag_3==false){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Password invalid!! Use a different password.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    
    else{


        $counting = "Select count(*) from administrator";
        $result_1 = mysqli_query($conn , $counting);
    
    
        $row = mysqli_fetch_assoc($result_1);

        $new_record = $row['count(*)'] +1 ;

        $AD_ID = "AD" . $new_record;

    
    
    
    
        $insertion = "Insert into administrator values ('$AD_ID','$name','$addr','$pass',5000,'$sID')";


        $result = mysqli_query($conn , $insertion);

        
        

        
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> You are now Registered. Please click on the button to go to the login page.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    }
    
    
    
    
    
    

    

}










?>


















<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGNUP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  




<!-- This is the Alert Message -->



    






    <!-- This is the FORM -->


    <div class="container">
    <h1 class="text-center"> Admin Signup </h1>
    
    
        <form action="admin_signup.php" method="POST">
    <div class="form-group col-md-4">
        <label for="patient_id" class="form-label">Name</label>
        <input type="text" class="form-control" id="patient_id" name="name" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="pass">
    </div>

    <div class="form-group col-md-4">
        <label for="sID" class="form-label">Supervisor ID</label>
        <input type="text" class="form-control" id="sID" name="sID" aria-describedby="emailHelp">
        
    </div>
    
    <div class="form-group col-md-4">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
    </div>

    
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="doctor_signup.php"><button type="button" class="btn btn-link" href='doctor_signup.php'>I am a Doctor</button></a>
    <a href="patient_signup.php"><button type="button" class="btn btn-link" href='patient_signup.php'>I am a Patient</button></a>
    </form>

    <br><br>

    <a class="btn btn-primary" href="../logins/admin_login.php" role="button">Login Page</a>

</div>






</body>
</html>