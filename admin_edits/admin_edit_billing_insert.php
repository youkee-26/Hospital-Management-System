



<?php
 include '../dbconnect.php';
    



    

if($_SERVER["REQUEST_METHOD"]=="POST" ){

    include '../dbconnect.php';
    
    $date = $_POST["date"];
    $time = $_POST["time"];
    $rem = $_POST["rem"];
    $status = $_POST["status"];
    $amount = $_POST["amount"];
    $serial = $_POST["serial"];
    $admin_id = $_POST["admin_id"];
   





        $counting = "Select count(*) from billing";
        $result_1 = mysqli_query($conn , $counting);
    
    
        $row = mysqli_fetch_assoc($result_1);

        $new_record = $row['count(*)'] +1 ;

        $B_Id = "B" . $new_record;
        
    

    
        $insertion = "Insert into billing values ('$B_Id','$date','$time',$rem,'$status',$amount,'$admin_id','$serial');";


        $result = mysqli_query($conn , $insertion);

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Billings entered
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    }
    
    
    
    
    
    

    












?>


















<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  




<!-- This is the Alert Message -->



    






    <!-- This is the FORM -->

    <?php
    echo '<div class="container">
    <h1 class="text-center"> Billing Entry</h1>
    
    
        <form action="admin_edit_billing_insert.php?" method="POST">
    <div class="form-group col-md-4">
        <label for="patient_id" class="form-label">Date</label>
        <input type="text" class="form-control" id="patient_id" name="date" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="password" class="form-label">Time</label>
        <input type="text" class="form-control" id="password" name="time">
    </div>

    <div class="form-group col-md-4">
        <label for="sID" class="form-label">Remaining</label>
        <input type="text" class="form-control" id="sID" name="rem" aria-describedby="emailHelp">
        
    </div>
    <div class="form-group col-md-4">
        <label for="sal" class="form-label">Status</label>
        <input type="text" class="form-control" id="sal" name="status" aria-describedby="emailHelp">
    </div>
    <div class="form-group col-md-4">
        <label for="address" class="form-label">Amount</label>
        <input type="text" class="form-control" id="address" name="amount" aria-describedby="emailHelp">
    </div>
    <div class="form-group col-md-4">
        <label for="address" class="form-label">Service_Serial_no</label>
        <input type="text" class="form-control" id="address" name="serial" aria-describedby="emailHelp">
    </div>
    <div class="form-group col-md-4">
    <label for="address" class="form-label">Admin_ID</label>
    <input type="text" class="form-control" id="address" name="admin_id" aria-describedby="emailHelp">
    </div>
    

    
    
    <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>



</div>'
?>






</body>
</html>