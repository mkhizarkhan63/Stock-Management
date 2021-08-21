<?php 
	include 'db_connect.php';
	$date =  $_POST['date'];
	$sql = "SELECT SUM(price) as price FROM `expenses` where date='$date'";
	$result = $connect->query($sql);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		echo $row['price'];
	}


 ?>