<?php 
include 'db_connect.php';
$id = 	$_POST['id'];
$name =	$_POST['name'];
$acc =	$_POST['acc'];
$dis =	 $_POST['dis'];
$place = $_POST['place'];
$type = $_POST['type'];
$contact = $_POST['contact'];
$msg = '';
$query = "UPDATE `accounts` SET `name`='$name',`acc_num`='$acc',`p_discount`='$dis',`place`='$place',`contact` = '$contact',`type_id`='$type' WHERE id = '$id'";


if($connect->query($query))
{
	$msg .= "<p class='text-success'>Data Updated Successfully</p>";
}else{

	$msg .= "<p class='text-danger'>Please try again</p>";
}
echo $msg;


 ?>