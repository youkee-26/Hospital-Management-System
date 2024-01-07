<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../dbconnect.php';
    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $age = $_POST["age"];
    $bg = $_POST["BG"];
    $weight = $_POST["weight"];
    $address = $_POST["address"];
    $bp = $_POST["BP"];
    $gender = $_POST["gender"];
    $gname = $_POST["gname"];
    $gphone = $_POST["gp"];
    $gaddress = $_POST["ga"];
    $phone = $_POST["phone"];
    
    

    $flag_3 = false;
    $pass_check = "Select * from patient where password='$pass';";
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


        $counting = "Select count(*) from patient";
        $result_1 = mysqli_query($conn , $counting);
    
    
        $row = mysqli_fetch_assoc($result_1);

        $new_record = $row['count(*)'] +1 ;

        $P_ID = "PAT" . $new_record;

    
    
    
    
        $insertion = "Insert into Patient values ('$P_ID','$name',$age,'$bg','$pass',$weight,'$bp','$gender','$address',$phone)";


        $result = mysqli_query($conn , $insertion);

        $insertion = "Insert into P_guardian values ('$P_ID','$gname','$gaddress',$gphone)";
        $result = mysqli_query($conn , $insertion);

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> You are now Registered. Your Patient ID id is '. $P_ID .' Please click the button to go to the login page.
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
    <h1 class="text-center"> Patient Signup </h1>
    
    
        <form action="patient_signup.php" method="POST">
    <div class="form-group col-md-4">
        <label for="patient_id" class="form-label">Name</label>
        <input type="text" class="form-control" id="patient_id" name="name" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="pass">
    </div>
    <div class="form-group col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" id="age" name="age" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="BG" class="form-label">Blood Group</label>
        <input type="text" class="form-control" id="BG" name="BG" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="weight" class="form-label">Weight</label>
        <input type="text" class="form-control" id="weight" name="weight" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="BP" class="form-label">Blood Pressure</label>
        <input type="text" class="form-control" id="BP" name="BP" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="gender" class="form-label">Phone</label>
        <input type="text" class="form-control" id="gender" name="phone" aria-describedby="emailHelp">
        
    </div>
    

    <div class="form-group col-md-4">
        <label for="gname" class="form-label">Guardian's Name</label>
        <input type="text" class="form-control" id="gname" name="gname" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="gname" class="form-label">Guardian's Phone</label>
        <input type="text" class="form-control" id="gname" name="gp" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="gname" class="form-label">Guardian's Address</label>
        <input type="text" class="form-control" id="gname" name="ga" aria-describedby="emailHelp">
        
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="doctor_signup.php"><button type="button" class="btn btn-link" href='doctor_signup.php'>I am a Doctor</button></a>
    <a href="admin_signup.php"><button type="button" class="btn btn-link" href='admin_signup.php'>I am an Admin</button></a>
    </form>

    <br><br>

    <a class="btn btn-primary" href="../logins/patient_login.php" role="button">Login Page</a>

</div>






</body>
</html>