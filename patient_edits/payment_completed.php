

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gateway</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <h1></h1>

	<?php 



$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("ashat6439aed07e661");
$store_passwd=urlencode("ashat6439aed07e661@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

    $arrayString=  explode(" ", $tran_date);
	$date = $arrayString[0];
	$time = $arrayString[1];

	



	include '../dbconnect.php';
	$patient_id = $_GET['pid'];
	$doctor_id = $_GET['did'];

	$sql = "SELECT * from patient where Patient_id='$patient_id';";
	$result = mysqli_query($conn, $sql);
	$result_row = mysqli_fetch_assoc($result);

	$sql2 = "SELECT * from doctor where Doctor_id='$doctor_id';";
	$result2 = mysqli_query($conn, $sql2);
	$result_row2 = mysqli_fetch_assoc($result2);

	$remaining = $result_row2['Fee_per_appointment'] - 200;


	$counting = "Select count(*) from services where serial like 'A%'";
    $result_1 = mysqli_query($conn , $counting);
    $row = mysqli_fetch_assoc($result_1);
	$new_record = $row['count(*)'] +1 ;
	$A_Id = "A" . $new_record;
	$AP_Id = "APP" . $new_record;
	
	
	
	
	
	$sql = "Insert into services values ('$A_Id','$date','$time','Appointment has been approved');";
	$result = mysqli_query($conn, $sql);

	$sql = "Insert into Appointment values ('$A_Id','$AP_Id');";
	$result = mysqli_query($conn, $sql);

	$sql = "Insert into offers values ('$doctor_id','$A_Id');";
	$result = mysqli_query($conn, $sql);

	$sql = "Insert into takes values ('$patient_id','$A_Id');";
	$result = mysqli_query($conn, $sql);


	
	$counting = "Select count(*) from billing";
    $result_1 = mysqli_query($conn , $counting);
    $row = mysqli_fetch_assoc($result_1);
	$new_record = $row['count(*)'] +1 ;
	$B_Id = "B" . $new_record;
	
	
	$fee = $result_row2['Fee_per_appointment'];
	$sta = "Unpaid";
	$ad = Null;
	
	
	$sql = "Insert into billing values ('$B_Id','$date','$time',$remaining,'$sta',$fee,Null,'$A_Id');";
	$result = mysqli_query($conn, $sql);

	
	
	$counting = "Select count(*) from payment_gateway";
    $result_1 = mysqli_query($conn , $counting);
    $row = mysqli_fetch_assoc($result_1);
	$new_record = $row['count(*)'] +1 ;
	$T_Id = "TRSC" . $new_record;
	
	
	
	
	$sql = "Insert into Payment_Gateway values ('$T_Id','$date','$time','$card_type','$tran_id');";
	$result = mysqli_query($conn, $sql);
	
	
	$sql = "Insert into generates values ('$B_Id','$T_Id');";
	$result = mysqli_query($conn, $sql);
	
	
	echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your Payment is Successfully completed Please Click on the button to return to homepage
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';



} else {

	
	
	echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> Your Trasaction could not be processed. Please click the button to return to homepage and try again
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}






?>

<a class="btn btn-primary" href="../seperate_homepage/patient_homepage.php?id=<?php echo $patient_id ?>" role="button">Home</a>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>