<?php

    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->
    if(isset($_GET['deleteid'])) {  //get method is used to fetch info from url
      $patientid=$_GET['deleteid'];


      $sql2="delete from P_Guardian where P_id='$patientid'";
      $result2=mysqli_query($conn,$sql2);
      
      if($result2 ){
        echo "A Guardian's record has been deleted successfully!";
      }
      else{
        die("Unsuccessful operation!".mysqli_connect_error());
      }


    }    
    
    ?>
