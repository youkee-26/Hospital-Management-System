<?php

    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->
    if(isset($_GET['deleteid'])) {  //get method is used to fetch info from url
        $doctorid=$_GET['deleteid'];
    $sql5="delete from offers where Doctor_id='$doctorid'";
    $result5=mysqli_query($conn,$sql5);
      $sql2="delete from doctor_chamber_timing where Doctor_id='$doctorid'";
      $result2=mysqli_query($conn,$sql2);
      $sql3="delete from doctor_degree where Doctor_id='$doctorid'";
      $result3=mysqli_query($conn,$sql3);
      $sql4="delete from doctor_phone where Doctor_id='$doctorid'";
      $result4=mysqli_query($conn,$sql4);
      $sql="delete from doctor where Doctor_id='$doctorid'";
      $result=mysqli_query($conn,$sql);
      if($result && $result2 && $result3 && $result4 && $result5){
        echo "A Doctor's record has been deleted successfully!";
      }
      else{
        die("Unsuccessful operation!".mysqli_connect_error());
      }


    }    
    
    ?>
 
  