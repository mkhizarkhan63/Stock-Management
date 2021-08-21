<?php 
include 'db_connect.php';
//echo "hellocon";
 $id = $_POST['accountID']; ///accid
 $crates = $_POST['crates'];
 $weight = floatval($_POST['weight']);
 $debit = $_POST['debit']; //total
 $rate  = $_POST['rate'];
 $descrip = $_POST['descrip'];
 $date = $_POST['date'];
// echo $weight;

$sql = "INSERT INTO `purchase`( `weight`, `crates_quan`,`rate`, `description` ,`acc_id` ,`date`) VALUES ('$weight','$crates', '$rate','$descrip' ,'$id' , '$date') ";
$result = $connect->query($sql);


	$last_id = mysqli_insert_id($connect);

	

	if($result && $last_id){
		$sql1 ="INSERT INTO `debit`(`debit`,`status` ,`purchase_id` ) VALUES ('$debit','0','$last_id')";
		$result1 = $connect->query($sql1);
		echo 'Successfully Inserted';
	}




 ?>