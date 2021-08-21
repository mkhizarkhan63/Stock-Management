<?php 

	include 'db_connect.php';

	$id = $_POST['updateId'];
	$crates = $_POST['crates'];
	$rates = $_POST['rates'];
	$weight = $_POST['weight'];
	$total = $_POST['debit'];
	$date = $_POST['date'];
	$descrip = $_POST['descrip'];
	$status = $_POST['status'];

	$sql = "UPDATE `purchase` SET `weight`= '$weight',`crates_quan`='$crates',`rate`='$rates',`description`='$descrip',`date`='$date' WHERE id = '$id'";

	 $result = $connect->query($sql);
	 
	 
	 
	 	$sql1 = "UPDATE `debit` SET `debit`='$total',`status`='$status' WHERE purchase_id = '$id'";
	 $res = $connect->query($sql1);
	 
	 if($res && $result){
	 	echo 'Updated Successfully';
	 }	else{
	 	echo "Try Again";
	 }
	


	  // $sql = "UPDATE purchase as p  INNER JOIN cred_debit as cd ON  cd.p_id = p.id SET p.rate = '$rates' , p.weight = '$weight' , p.crates_quan = '$crates',p.date = '$date' , cd.debit = '$debit' , cd.status = '$status' WHERE p.id = '$id'";
 ?>