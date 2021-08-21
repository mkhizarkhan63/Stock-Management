<?php 
	include 'db_connect.php';
	$name = $_POST['name'];
	$acc = $_POST['acc'];
	$amount = $_POST['amount'];

	$sql  = "INSERT INTO `static`( `name`, `acc_num`, `amount`) VALUES ('$name','$acc','$amount')";
	$res = $connect->query($sql);
	if($res){
		echo "Sucessfully Inserted";
	}
	

 ?>

 		
 	