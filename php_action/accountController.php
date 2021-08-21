

<?php
include 'db_connect.php';


	$msg = "";

	$name = $_POST['name'];
	$acc = $_POST['account'];
	$dis = $_POST['discount'];
	$place = $_POST['place'];
	$contact = $_POST['contact'];
	$type = $_POST['type'];


			if($name != '' && $acc != '' && $dis != '' && $place != '' )
	{
		$sql = "INSERT INTO `accounts`( `name`, `acc_num`, `p_discount`, `place`,`contact`, `type_id`) VALUES ('$name','$acc','$dis','$place','$contact','$type')";

		$result = $connect->query($sql);
		
		$msg .= '<p class="text-success" >Record insert Successfully</p>';


	}


	

	echo $msg;
		  


 ?>