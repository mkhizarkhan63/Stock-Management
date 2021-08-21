<?php include 'db_connect.php'; 

	$sql = "SELECT sales.date,acc.id ,acc.name, acc.acc_num, type.type, acc.place ,acc.contact , cd.credit FROM `sales` INNER join accounts as acc on acc.id = sales.acc_id INNER JOIN type on type.id = acc.type_id INNER JOIN credit cd on cd.sales_id = sales.id WHERE cd.status = 0";

	$output = '<table class="table table-bordered"  id="myTable">
    <thead>
      <tr>
      	<th>Date</th>
        <th>Name</th>
        <th>Account Number</th>
        <th>Type</th>
        <th>Place</th>
        <th>Contact</th>
        <th>Payment</th>

        

      </tr>
    </thead>
    <tbody>';

	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		while ($row =$result->fetch_assoc()) {
			    $orgDate = $row['date'];  
			     $date = str_replace('-', '/', $orgDate);
    	$newDate = date("d/m/Y", strtotime($orgDate));  
   	  
		    $output .= '<tr>
		    		<td>'.$newDate.'</td>	
       			 	<td>'.$row['name'].'</td>
       			 	<td>'.$row['acc_num'].'</td>
        			<td>'.$row['type'].'</td>
        			<td>'.$row['place'].'</td>
        			<td>'.$row['contact'].'</td>
        			<td>'.$row['credit'].'</td>
        			</tr>';
		}
	}
	
	$output .= '</tbody>
  </table>';

echo $output;

?>