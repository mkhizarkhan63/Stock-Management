<?php 
include 'db_connect.php';

$sql = "SELECT * FROM `daily_rate` ORDER BY id DESC LIMIT 0, 2";
$query = $connect->query($sql);
$row = $query -> fetch_array(MYSQLI_NUM);
echo $row[1];


 ?>