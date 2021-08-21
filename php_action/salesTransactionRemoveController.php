
<?php 
	include 'db_connect.php';
	$id = $_POST['id'];
	
	$sql = "DELETE credit , sales FROM credit 

		INNER JOIN sales ON credit.sales_id=sales.id 
	
		WHERE sales.id = '$id'";
	
	$result = $connect->query($sql);
	if($result){
		echo 'Deleted Successfully';
	}
	else{
		echo 'Try Again';
	}

 ?>