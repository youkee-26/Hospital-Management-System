<?php

    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->
    if(isset($_GET['deleteid'])) {  //get method is used to fetch info from url
      $patientid=$_GET['deleteid'];

      $sql3="delete from takes where p_id='$patientid'";
      $result3=mysqli_query($conn,$sql3);
      $sql2="delete from P_Guardian where P_id='$patientid'";
      $result2=mysqli_query($conn,$sql2);
      $sql="delete from patient where Patient_ID='$patientid'";
      $result=mysqli_query($conn,$sql);
      
      if($result && $result2 && $result3){
        echo "A Patient's record has been deleted successfully!";
      }
      else{
        die("Unsuccessful operation!".mysqli_connect_error());
      }


    }    
    
    ?>
