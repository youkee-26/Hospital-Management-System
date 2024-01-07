<!--database connection code starts-->
<?php
include '../dbconnect.php';
//<!--database connection code ends-->
//<!--Post Method starts-->
if(isset($_GET['insertid'])) {  //get method is used to fetch info from url
    $patientid=$_GET['insertid'];}
if(isset($_POST['submit'])){
  $reportserial=$_POST['reportserial'];
  $reportid=$_POST['reportid'];
  $reportdate=$_POST['reportdate'];
  $reporttime=$_POST['reporttime'];
  $reportdesc=$_POST['reportdesc'];
  
  
  //value passing in the variable
  $sql2="insert into services (Serial,Date, Time, Description ) values('$reportserial','$reportdate','$reporttime','$reportdesc')";
  $result2=mysqli_query($conn,$sql2);
  $sql="insert into report (Serial,Report_id) values('$reportserial','$reportid')";
  $result=mysqli_query($conn,$sql);
  $sql3="insert into takes (p_id,service_serial) values('$patientid','$reportserial')";
  $result3=mysqli_query($conn,$sql3);
  if($result && $result2 && $result3){
    echo "A new report has been inserted successfully!";
  }
  else{
    die("Unsuccessful operation!".mysqli_connect_error());
  }
}



//<!--Post Method ends-->

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doctor Insert Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
   <h1> Hello, Doctor! Insert a new report.</h1> 
   <div class="container my-5"> <!-- margin=5 -->
   <!-- THE Insertion FORM STARTS -->
   <form method="post">
  
  <div class="mb-3">
    <label>Report Serial Number</label>
    <input type="text" class="form-control" id="reportserial" name="reportserial">
    <div> Enter serial number of a report(EX:R1)</div>
  </div>
  <div class="mb-3">
    <label>Report ID</label>
    <input type="text" class="form-control" id="reportid" name="reportid">
    <div>Enter ID of a Report(EX:REP)</div>
    
  </div>
  <div class="mb-3">
    <label>report Date</label>
    <input type="text" class="form-control" id="reportdate" name="reportdate">
    <div> Enter Date(YYYY-MM-DD) of an report</div>
    
  </div>
  <div class="mb-3">
    <label>report Time</label>
    <input type="text" class="form-control" id="reporttime" name="reporttime">
    <div>Enter Time(HH-MM) of an report</div>
    
  </div>
  <div class="mb-3">
    <label>report Description</label>
    <input type="text" class="form-control" id="reportdesc" name="reportdesc">
    <div>Enter Description of an report</div>
    
  </div>
  <button type='submit' class="btn btn-primary" name="submit">Submit</button>
</form>
 <!-- THE Insertion FORM ENDS --> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>