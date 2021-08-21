<?php 
	include 'db_connect.php';

	$prov = $_POST['provider'];
	$sDate = $_POST['S_date'];
	$eDate = $_POST['E_date'];
	$output = '';
	if ($prov == 0) {
		$output .= '';
	}else{
	$output .= '<table class="table text-center" id="manageBrandTable">
							<thead>
								<tr>							
							<th>Date</th>
							<th>Name</th>
							<th>Account (khata)</th>
							<th>Place</th>
							<th>Contact</th>
							<th>Crates</th>
							<th>Rate</th>
							<th>Weigth</th>
							<th>Total credit</th>	
							</tr></thead><tbody>';
	$sql = " SELECT DISTINCT sales.rate ,acc.name , acc.acc_num, acc.place, acc.contact , sales.weight as weight , sales.date , sales.crates_quan as crates , cd.credit FROM provider INNER JOIN accounts as acc on acc.prov_under_id = provider.id INNER JOIN sales ON sales.acc_id = acc.id INNER JOIN cred_debit as cd ON cd.p_id = sales.id WHERE provider.id = '$prov' OR sales.date BETWEEN '$sDate' AND '$eDate'";
	$result = $connect->query($sql);
	if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates']."</td><td>".$row['rate']."</td><td>".$row['weight']."</td><td>".$row['credit']."</td><td>
								


 									</td></tr>";



	}//whileclose
}///ifclose
else{
	$output .= '<td class="text-danger"><h3>No Transaction </h3></td>';
}
	$output .= '</tbody></table>';
 			}					
 echo $output;
 ?>