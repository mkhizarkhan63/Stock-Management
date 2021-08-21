<?php 
	include 'db_connect.php';

	$sDate = $_POST['startDate'];
	
	$output = "";
	$total = 0;
	$creditQl = "SELECT SUM(credit.credit) as credit FROM `credit` INNER JOIN `sales` on sales.id = credit.sales_id where sales.date =  '$sDate' ";
	$res1 = $connect->query($creditQl);
	$row1 = $res1->fetch_assoc();
	$debitQl = "SELECT SUM(debit.debit) as debit FROM `debit` INNER JOIN `purchase` on purchase.id = debit.purchase_id  where purchase.date = '$sDate'";
	$res2 = $connect->query($debitQl) or die($connect->error);
	//echo $res2;
	$row2 = $res2->fetch_assoc();

	
	if($res1->num_rows > 0 || $res2->num_rows > 0){
		
		
		$cred = $row1['credit'];
		$deb = $row2['debit'];
		
		if($cred > $deb){
			$total = $cred - $deb;

			$output .= "
		<div class='card'>
		  <div class='cardHeader'>
		  	<i style='font-size:25px;'><b>Current Profit/Loss</b></i><br>

		  	<span style='font-size: 18px'>Today's Date: ".$sDate."</span>
		    <h1 id='daily_rate'></h1>
		  </div>

		  <div class='cardContainer' style='font-size:25px;'>
		   <span class='text-success' style='font-size:20px'><b>Credit</b></span> <p>".$cred."   Rs</p>
		   <span class='text-danger'><span style='font-size:20px'><b>Debit</b></span></span> <p>".$deb." Rs</p>
		   	
		   	<div id='Total'>
		   		<span><b class='text-success'> Profit:</b><p id=''>".$total." Rs</p></span>
		   		<span><b>Remaining Weight:</b><p id='Weight'></p></span>
		   	</div>
		  </div>
		</div> ";

		}else if ($deb > $cred) {
			$total = $deb  - $cred;
			$output .= "
		<div class='card'>
		  <div class='cardHeader'>
		  	<i style='font-size:25px;'><b>Current Profit/Loss</b></i><br>

		  	<span style='font-size: 18px'>Today's Date: ".$sDate."</span>
		    <h1 id='daily_rate'></h1>
		  </div>

		  <div class='cardContainer' style='font-size:25px;'>
		   <span class='text-success' style='font-size:20px'><b>Credit</b></span> <p>".$cred."   Rs</p>
		   <span class='text-danger'><span style='font-size:20px'><b>Debit</b></span></span> <p>".$deb." Rs</p>
		   
		   	<div id='Total'>
		   		<span><b class='text-danger'> Loss:</b><p id=''>".$total." Rs</p></span>
		   		<span><b>Remaining Weight:</b><p id='Weight'></p></span>
		   	</div>
		  </div>
		</div> ";
			
		}




		

		
	}

	else{

			$output .= "<div class='card'>
		  <div class='cardHeader'>
		  	<i style='font-size:25px;'><b>Current Profit/Loss</b></i><br>

		  	<span style='font-size: 18px'>Today's Date: ".$sDate."</span>
		    <h1 id='daily_rate'></h1>
		  </div>

		  <div class='cardContainer'  style='font-size:20px;'>
		   <span class='text-danger'><b>Not find any Transaction on your given date.</b> </span>
		
		   
		  </div>
		</div> ";
	}

echo $output;


 ?>