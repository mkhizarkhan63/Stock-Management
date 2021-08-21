<?php 
include 'db_connect.php';
$id = $_GET['customer_id'];
 

		$output = '

	<form id="purchaseForm" method="POST">
<input type="hidden" name="accountID" id="accountID" value="'.$id.'" />
		<table class="table" style="font-size:16px; height:100px;"  id="productTable">
			  	<thead>
			  		<tr>
			  			<th style="">Date</th>
			  			<th style="">Description</th>
			  			
			  			<th style="">Crates</th>		  			
			  			<th style="">Discount</th>
			  			<th style="">Rate</th>
			  			<th style="">Weight (KG)</th>			  			
			  			<th style="">Total (Rs)</th>			  			
			  															
			  		</tr>
			  	</thead>

			  	<tbody>

			  		<tr>';

					$sql = "SELECT acc.contact  , acc.acc_num , acc.place , acc.p_discount FROM `accounts` as acc  where id = '$id' ";
						$result = $connect->query($sql);
						if($result->num_rows > 0){
						$row = $result->fetch_assoc(); 

						$sql1 = "SELECT * FROM `daily_rate` ORDER BY id DESC LIMIT 0, 1 ";
						$result1 = $connect->query($sql1);
						$row1 = $result1->fetch_assoc();	
						////
						$sql3 = "SELECT p.weight ,p.crates_quan  , acc.id as acc_id FROM `purchase`as p INNER join accounts as acc on acc.id = p.acc_id WHERE acc_id = '$id' ";
						$result3 = $connect->query($sql3);
						$row3 = $result3->fetch_assoc();


			  		$output .=				'<td><input type="date" 									name="date" class="form-control"  							id="date" /></td>
			  					  			<td><textarea class="form-control"  id="descrip" name="descrip" rows="4" cols="50"></textarea></td>
			  					  			
			  					  			<td><input type="number" style="width:80px" class="form-control" name="crates" id="crates" value="" /></td>
			  					  			<td><input type="number" style="width:80px" class="form-control"  id="discount" value="'.$row['p_discount'].'" /></td>

			  					  			<td><input type="number" style="width:80px" class="form-control" name="rate" id="rate" value="'.$row1['rate'].'" /></td>

			  					  			

			  					  			<td><input type="text" style="width:80px" class="form-control" name="weight" value="" id="weight"  /></td>

			  					  			<td><input type="text" style="width:150px" class="form-control" name="debit" id="total"    /></td>';
			  					  		



			  	$output .=	'</tr> 

			  						</tbody>
			  						


			  						<input  type="submit" style="position:absolute; top:100%; left:89%; " class="btn btn-success " value="Save Changes" />
			  						</form>
			  						';

}
echo $output;




 ?>