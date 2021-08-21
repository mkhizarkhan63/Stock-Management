<?php 
	include 'db_connect.php';
	
		$name = $_POST['name'];
		$acc =  $_POST['account'];
		$place =  $_POST['place'];
		$contact =  $_POST['contact'];

		$sql = "INSERT INTO `provider`( `name`, `place`, `contact`, `acc`) VALUES ('$name','$place','$contact','$acc')";
		$res = $connect->query($sql);
		if ($res) {
				echo "Provider Inserted";
			}	
			else{

				echo 'Try Again';

			}
		

	
	


	





 ?>