<?php 
	include 'db_connect.php';
	
	$id =  $_POST['accountID'];
	$rate = $_POST['rate'];
	$crates =  $_POST['crates'];
	$weight =  floatval($_POST['weight']);
	$credit = $_POST['credit'];
	$date  = $_POST['date'];
	$desc = $_POST['desc'];
	$last_id = '';
	
	$sql = "INSERT INTO `sales`( `weight`, `crates_quan`,`rate` ,`acc_id` , `date` , `details`) VALUES ('$weight','$crates', '$rate' ,'$id' , '$date' , '$desc') ";
	$result= $connect->query($sql);
	
		$last_id = $connect->insert_id;
			//echo($last_id);
			$sql1 ="INSERT INTO `credit`( `credit`,`status` ,`sales_id`) VALUES ('$credit','0','$last_id')";
			$res = $connect->query($sql1);
			if ($res) {
				echo 'Successfully Inserted';
			}
			
	

	

 ?>