<?php 
include 'db_connect.php';

$id = $_GET['id'];
$output = '<option selected="" disabled="" hidden="">Choose</option>';
$sql = "SELECT accounts.id , accounts.name FROM `accounts` INNER JOIN provider as p on p.id = accounts.prov_under_id WHERE p.id = '$id'";

 	$result = $connect->query($sql);
 	if($result->num_rows>0){
 		while($row = $result->fetch_assoc()){

 		$output .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
 
		}
 	}else{

 		$output .= '<option value="-1">None</option>';
 	}
	
	echo $output;

 ?>