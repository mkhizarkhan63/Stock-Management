<?php 
	include 'db_connect.php';
$Product = $_POST['Product'];
$Price = $_POST['Price'];


$output = '';
foreach ($Product as $key => $value) {
	$pro = $Product[$key];
	$pri = $Price[$key];
	
	$sql = "INSERT INTO `expenses`( `name` , `price`) VALUES ('$pro','$pri')";
	$result = $connect->query($sql);
		if ($result) {
			$output= 'Inserted';
		}
	
}
	echo $output;



	
	

 ?>