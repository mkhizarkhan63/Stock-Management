
<?php 
	include 'db_connect.php';
	$id = $_POST['detailsID'];
	$desc = $_POST['details'];

	$sql = "UPDATE `purchase` SET `description`='$desc' WHERE id = '$id'";
	$res = $connect->query($sql);
	if($res){
		echo 'Updated Successfully';
	}else{
		echo 'Please Try Again';
	}


 ?>