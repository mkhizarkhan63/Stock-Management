<?php 
include 'db_connect.php';
$sdate = $_POST['S_date'];
$sum = 0;
$sql = "SELECT * FROM `expenses` WHERE date = '$sdate'";

$result = $connect->query($sql);
if($result->num_rows > 0){
	$output = '<table class="table" style="" id="manageBrandTable">
							<thead>
								<tr>							
							<th>Product</th>
							<th>Price</th>
							<th>Date</th>
						
						
							</tr>
						</thead>
						<tbody>'; 
	while ($row = $result->fetch_assoc()) {
    	$sum += $row['price'];
    	$output .= "<tr><td>".$row['name']."</td><td>".$row['price']." Rs</td><td>".$row['date']."</td></tr>";



	}
	$output .= "<tr><td></td><td><b>Total: </b>".$sum." Rs</td><td></td></tr>";

$output .= '</tbody>
			</table>';
			echo $output;
		}else{

		$output = "<h3 class='text-danger'>No Expenses on Today</h3>";
		echo($output);	
		}


 ?>