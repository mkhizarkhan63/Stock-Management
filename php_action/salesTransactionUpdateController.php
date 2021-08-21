<!-- salesTransactionUpdateController -->

<?php 
	include 'db_connect.php';
	$id = $_POST['hidden'];
	$crates = $_POST['crates'];
	$rates  = $_POST['rates'];
 	$weight = $_POST['weight']; 
	$credit = $_POST['credit']; 
	$status = $_POST['status']; 
	$details = $_POST['details'];
	$date = $_POST['date'];

	//$sql = "UPDATE sales as s  INNER JOIN credit as cd ON  cd.sales_id = s.id SET s.rate = '$rates' , s.weight = '$weight' , s.crates_quan = '$crates' ,s.date = '$date' , cd.credit = '$credit' , cd.status = '$status' WHERE s.id = '$id'";

	$sql = "UPDATE `sales` SET `weight`='$weight',`crates_quan`='$crates',`rate`= '$rates',`date`='$date',`details`='$details' WHERE id = '$id'";
	$result = $connect->query($sql);

	$sql2 = "UPDATE `credit` SET `credit`='$credit',`status`='$status' WHERE sales_id = '$id'";
	$res = $connect->query($sql2);

	if ($result && $res) {
		echo 'Updated Successfully';
	}else{
		echo "Try Again";
	}

	

 ?>