<?php 

	include 'db_connect.php';
	$sDate = $_POST['startDate'];
	
	$sql1 = "SELECT SUM(sales.weight) as weight FROM `sales` WHERE date = '$sDate'";
	$result1 = $connect->query($sql1);
	$sql2 = "SELECT SUM(weight) as weight FROM `purchase` WHERE date = '$sDate'";
	$result2 = $connect->query($sql2);
	if($result1->num_rows > 0 && $result2->num_rows > 0){ 
		$row1 = $result1->fetch_assoc();
		$row2 =$result2->fetch_assoc();
		$total = $row1['weight'] - $row2['weight'];
		$output = $total ;
	}
	echo $output;
 ?>