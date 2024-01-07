<?php
  



  


    include '../dbconnect.php';
    
    
    if($_SERVER["REQUEST_METHOD"]=="GET"){
    $id = $_GET['deleteid'];
    


    $sql1 = "Select * from generates where b_id='$id';";
    $result1 = mysqli_query($conn,$sql1);
    

    if($result1){
        $sql = "Select * from generates where b_id='$id';";
        $result = mysqli_query($conn,$sql);
        $result_row = mysqli_fetch_assoc($result);
        $ans = $result_row['Payment_Transaction_id'];
        
        

        $sql2 = "delete from generates where b_id='$id';";
        $result2 = mysqli_query($conn,$sql2);

        $sql3 = "delete from Payment_gateway where Transaction_ID='$ans';";
        $result3 = mysqli_query($conn,$sql3);
    
    
        $sql4 = "delete from Billing where b_id='$id';";
        $result4 = mysqli_query($conn,$sql4);
    

        echo "Successful";
    }else{
        $sql4 = "delete from Billing where b_id='$id';";
        $result4 = mysqli_query($conn,$sql4);
        echo "Successful";
    }
    
    }
    
    
    ?>