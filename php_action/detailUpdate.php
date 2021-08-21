<?php 
include 'db_connect.php';
$id = $_POST['detailsID'];
$details = $_POST['details'];

$sql = "UPDATE `sales` SET `details`='$details' WHERE id = '$id'";
$result = $connect->query($sql);
if ($result) {
	echo 'Inserted';
}


 ?>