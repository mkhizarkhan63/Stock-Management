<?php 

include 'db_connect.php';

$id = $_POST['id'];

$sql = "DELETE FROM `accounts` WHERE id ='$id'";
$result = $connect->query($sql);





 ?>