













<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bill Edits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  

    <h1>    Update, Delete or View record of any Billing!</h1>

    <div class="container">
    <form action="admin_edit_billing.php" method="POST">
  <div class="mb-3">
    <label for="Bill_id" class="form-label">Enter the billing ID</label>
    <input type="text" class="form-control" id="Bill_id" name="Bill_id" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>

  <?php
  echo '<button class="btn"><a href="admin_edit_billing_insert.php">Insert new record</a></button>'
    ?>
</form>
</div>



<div class = "container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">B_ID</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Remaining</th>
      <th scope="col">Status</th>
      <th scope="col">Amount</th>
      <th scope="col">Admin_ID</th>
      <th scope="col">Service_Serial_No</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    
  <?php
  
  
  if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../dbconnect.php';
    
    $bill_id = $_POST["Bill_id"];
    


    $sql = "Select * from billing where B_Id='$bill_id';";
    $result = mysqli_query($conn, $sql);
    $result_row = mysqli_fetch_assoc($result);

    


    echo "<tr>
      
      <td>".$result_row['B_Id']."</td>
      <td>".$result_row['Date']."</td>
      <td>".$result_row['Time']."</td>
      <td>".$result_row['remaining']."</td>
      <td>".$result_row['status']."</td>
      <td>".$result_row['amount']."</td>
      <td>".$result_row['Admin_ID']."</td>
      <td>".$result_row['Service_Serial_no']."</td>
      <td>
      
      <button class='btn '><a href='admin_edit_billing_delete.php?deleteid=".$result_row['B_Id']."'>Delete</a></button>
      <button class='btn '><a href='admin_edit_billing_update.php?x=".$result_row['B_Id']."'>Update</a></button>
      </td>
      </tr>";
      
      
}  
      
      ?>

  



    
  </tbody>
</table>

</div>

</body>


</html>













