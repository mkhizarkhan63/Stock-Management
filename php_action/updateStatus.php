<?php 

include 'db_connect.php';

$status =  $_POST['status'];

$id = $_POST['id'];



$sql = "UPDATE `debit` SET `status`='$status' WHERE id = '$id'";
$result= $connect->query($sql);
if($result){
	echo "Successfully Changed and It can not be Changed Again";
}


 ?>