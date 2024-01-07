<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../dbconnect.php';
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $dept = $_POST["dept"];
    $des = $_POST["des"];
    $od = $_POST["od"];
    $fpa = $_POST["fpa"];
    $fps = $_POST["fps"];
    $addr = $_POST["address"];
   
    
    

    $flag_3 = false;
    $pass_check = "Select * from doctor where password='$pass';";
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


        $counting = "Select count(*) from doctor";
        $result_1 = mysqli_query($conn , $counting);
    
    
        $row = mysqli_fetch_assoc($result_1);

        $new_record = $row['count(*)'] +1 ;

        $D_ID = "D" . $new_record;

    
    
    
    
        $insertion = "Insert into doctor values ('$D_ID','$name','$addr','$dept','$des',$fpa,$fps,'$od','$pass')";


        $result = mysqli_query($conn , $insertion);

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> You are now Registered. Please click the button go to the login page.
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
    <h1 class="text-center"> Doctor Signup </h1>
    
    
        <form action="doctor_signup.php" method="POST">
    <div class="form-group col-md-4">
        <label for="patient_id" class="form-label">Name</label>
        <input type="text" class="form-control" id="patient_id" name="name" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="pass">
    </div>
    <div class="form-group col-md-4">
        <label for="dept" class="form-label">Department</label>
        <input type="text" class="form-control" id="dept" name="dept" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="des" class="form-label">Desgination</label>
        <input type="text" class="form-control" id="des" name="des" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="od" class="form-label">Off Day</label>
        <input type="text" class="form-control" id="od" name="od" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="fpa" class="form-label">Fee per Appointment</label>
        <input type="text" class="form-control" id="fpa" name="fpa" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="fps" class="form-label">Fee per surgery</label>
        <input type="text" class="form-control" id="fps" name="fps" aria-describedby="emailHelp">
    </div>
    <div class="form-group col-md-4">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
    </div>

    
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="patient_signup.php"><button type="button" class="btn btn-link" href='doctor_signup.php'>I am a Patient</button></a>
    <a href="admin_signup.php"><button type="button" class="btn btn-link" href='admin_signup.php'>I am an Admin</button></a>
    </form>


    <br><br>

    <a class="btn btn-primary" href="../logins/doctor_login.php" role="button">Login Page</a>


</div>






</body>
</html>