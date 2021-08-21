<?php 
include 'db_connect.php';
	$id= $_POST['id'];
	$sql = "DELETE debit , purchase FROM debit INNER JOIN purchase ON debit.purchase_id = purchase.id WHERE purchase.id = '$id'";
	$result = $connect->query($sql);
	if($result){
		echo 'Deleted Successfully';
	}
	else{
		echo 'Try Again';
	}

 ?>