<?php 
	include "db_connect.php";
	$status =  $_POST['status'];

	$id = $_POST['id'];

	if($status  == 1){
	$sql = "UPDATE `credit` SET `status`='$status' WHERE id = '$id'";
	$result= $connect->query($sql);
		if($result){
			echo "Successfully Changed ";
		}
	}else{
		echo "Already Set by default";
	}


 ?>