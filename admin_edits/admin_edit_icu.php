<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICU Edits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <h1>    Update, Delete, View or Insert any ICU Records</h1>
    <!--box code starts-->
    <button class='btn '><a href='admin_edit_icu_insert.php'>INSERT NEW ICU BED</a></button>
  <!--box code ends-->

 <!--table display starts-->
 <div class = "container">
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">ICU Serial</th>
      <th scope="col">Room_no</th>
      <th scope="col">Bed_no</th>
      <th scope="col">Entry_date</th>
      <th scope="col">Entry_time</th>
      <th scope="col">Discharge_date</th>
      <th scope="col">Discharge_time</th>
      <th scope="col">Description</th>
      <th scope="col">Operations</th>
      
    </tr>
  </thead>
  <tbody>
    
  <?php


    //<!--database connection code starts-->
    include '../dbconnect.php';
    //<!--database connection code ends-->


    //<!--Post Method starts-->
  

  
  
  //value passing in the variable


  $sql="Select * from Services where Serial like 'I%';";
  $result=mysqli_query($conn,$sql);
  
  #$result_row = mysqli_fetch_assoc($result);//forming a dict from the obtained tuple
  
  $sql2="select * from icu;";
  $result2=mysqli_query($conn,$sql2);
 
  #$result_row2 = mysqli_fetch_assoc($result2);//forming a dict from the obtained tuple


//<!--Post Method ends-->

    

 //printing values from the dict
    
    while(($result_row = mysqli_fetch_assoc($result)) && ($result_row2 = mysqli_fetch_assoc($result2))){
    
    
    echo "<tr>
      
      <td>".$result_row['Serial']."</td>
      <td>".$result_row2['Room_no']."</td>
      <td>".$result_row2['Bed_no']."</td>
      <td>".$result_row['Date']."</td>
      <td>".$result_row['Time']."</td>
      <td>".$result_row2['Discharge_date']."</td>
      <td>".$result_row2['Discharge_time']."</td>
      <td>".$result_row['Description']."</td>
      <td>
      <button class='btn '><a href='admin_edit_icu_update.php'>Update</a></button>
      
      </td>
      </tr>";
      
      
 }

      ?>
  
    
  </tbody>
</table>

  </body>
</html>