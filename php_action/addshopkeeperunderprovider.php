<?php 
include 'db_connect.php';

$provId = $_POST['hiddenProvid'];



foreach ($_POST['ShopKeeper'] as $key => $value) {

	$accId = $_POST['ShopKeeper'][$key];
	$sql = "UPDATE `accounts` SET prov_under_id='$provId' WHERE id = '$accId'";
	
	$result = $connect->query($sql);
	

}
if($result){

		echo "Account Successfully added";
	}else{

		echo 'Try again';
	}


 ?>