<?php 
include 'db_connect.php';

$date =  $_POST['dates'];

$output = '' ;
 $sql = "SELECT purchase.id,purchase.date,SUM(purchase.weight) as weight , SUM(purchase.crates_quan) as crates , purchase.rate , SUM(debit.debit) as debit FROM `purchase` INNER JOIN debit on debit.purchase_id = purchase.id WHERE  purchase.date = '$date'";
	$res = $connect->query($sql);
	$row = $res->fetch_assoc();
	$totalWeight = $row['weight'];
	$output .= '
	<br>
	<br>
	<br>
	<hr>
	

	<div class="col-sm-3 col-sm-offset-1 ">
		<div class="card">
		  <div class="cardHeader">
		  	<h3 style="">Total Weight</h3><br>
		  	<h3 id="daily_rate">'.$totalWeight.' KG</h3>
		  	
		    
		</div> 
	</div>
</div>

	<div class="col-sm-3  ">
		<div class="card">
		  <div class="cardHeader">
		  	<h3 style="">Total Crates</h3><br>
		  	<h3 id="daily_rate">'.$row['crates'].'</h3>
		  	
		    
		  

		  
		</div> 
	</div>
</div>

<div class="col-sm-3  ">
		<div class="card">
		  <div class="cardHeader">
		  	<h3 style="">Total Debit</h3><br>
		  	<h3 id="daily_rate">'.$row['debit'].' Rs</h3>
		  	
		    
		  

		  
		</div> 
	</div>
</div>

<div class="col-sm-2">
		<button type="button" class="btn btn-secondary" id="close">X</button>
	</div>
' ;

echo $output;

   

 ?>