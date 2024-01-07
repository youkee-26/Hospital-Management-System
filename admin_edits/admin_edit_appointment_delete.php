<?php

    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->
    if(isset($_GET['deleteid'])) {  //get method is used to fetch info from url
      $appointmentserial=$_GET['deleteid'];

      
      $sql3="Select * from billing where Service_Serial_no='$appointmentserial'";
      $result3=mysqli_query($conn,$sql3);
      $result_row3=mysqli_fetch_assoc($result3);
      $target1 = $result_row3['B_Id'];

      $sql4="Select * from generates where b_id='$target1'";
      $result4=mysqli_query($conn,$sql4);
      $result_row4=mysqli_fetch_assoc($result4);
      $target2 = $result_row4['Payment_Transaction_id'];
      
      
      
      
      $sql="delete from generates where b_id='$target1'";
      $result=mysqli_query($conn,$sql);


      $sql="delete from Payment_Gateway where Transaction_ID='$target2'";
      $result=mysqli_query($conn,$sql);
      
      
      $sql="delete from billing where B_Id='$target1'";
      $result=mysqli_query($conn,$sql);
      
      
      
      $sql="delete from takes where service_serial='$appointmentserial'";
      $result=mysqli_query($conn,$sql);


      $sql="delete from offers where service_serial='$appointmentserial'";
      $result=mysqli_query($conn,$sql);
      
      
      $sql="delete from appointment where Serial='$appointmentserial'";
      $result=mysqli_query($conn,$sql);
      $sql2="delete from services where Serial='$appointmentserial'";
      $result2=mysqli_query($conn,$sql2);
      if($result && $result2){
        echo "An appointment has been deleted successfully!";
      }
      else{
        die("Unsuccessful operation!".mysqli_connect_error());
      }


    }    
    
    ?>
