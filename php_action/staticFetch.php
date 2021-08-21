<!-- staticFetch -->


<?php 
	include 'db_connect.php';
	$output = '';
	$sqlQuery  = "SELECT * FROM `static` ";
	$result = $connect->query($sqlQuery);
	if($result->num_rows > 0){
		$output .= ' <table class="table border-secondary">

 	<thead>
 		<tr>
 			<th>Name</th>
 			<th>Account Number</th>
 			<th>Amount</th>
 		</tr>

 	</thead>
 	<tbody>';
		while ($row = $result->fetch_assoc()) {
		    $output .= '<tr><td>'.$row['name'].'</td><td>'.$row['acc_num'].'</td><td>'.$row['amount'].' Rs</td></tr>';
		}
		$output .= '</tbody>
  </table>';
	}
echo $output;



 ?>