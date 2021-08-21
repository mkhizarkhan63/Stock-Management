<?php 
include 'db_connect.php';
$rate = $_POST['rates'];

if ($rate != '') {
	$sql = "INSERT INTO `daily_rate`( `rate`) VALUES ('$rate')";

if ($connect->query($sql)) {
	echo "Submitted Successfully";
}
}
else{
	echo "Please Provide Rate";
}



 ?>