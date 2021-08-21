<?php 
include 'db_connect.php';
		$id = $_POST['id'];
		$s = $_POST['start'];
		$e = $_POST['end'];
		if($s == '' && $e =='' ){

			$sql = "SELECT p.id , p.date, p.crates_quan ,p.weight ,p.description, p.rate, debit.id as debitID, debit.debit as total , debit.status , acc.name , acc.acc_num , acc.place , acc.contact 
				FROM `debit` INNER JOIN purchase as p ON p.id = debit.purchase_id INNER JOIN accounts as acc ON acc.id = p.acc_id where acc.id = '$id' ";
							$result = $connect->query($sql);
							$output = '
							
							<table class="table text-center" id="manageBrandTable">
							<thead>
								<tr>							
							<th>Date</th>
							<th>Name</th>
							<th>Account (khata)</th>
							<th>Place</th>
							<th>Contact</th>
							<th>Crates</th>
							<th>Rate</th>
							<th>Description</th>
							<th>Weigth</th>
							<th>Total</th>
							<th>Payment Status</th>
							<th>Options</th>
							<th>Invoice</th>
						
						
						</tr></thead><tbody>';  
						if($result->num_rows > 0){    
							while ($row = mysqli_fetch_assoc($result)) {
							if ($row['status'] == 1) {
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['description']."</td><td>".$row['weight']."</td><td>".$row['total']."</td><td class='text-success'>
								
								 Paid
								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a  class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Edit</a></li>

									    <li><a  class='details' data-id='".$row['id']."' data-toggle='modal' data-target='#addDetails'>Add Details</a></li>

									    <li ><a  class='delClass' del-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
								</div>


 									</td><td><a href='php_action/invoiceGenerator.php?id=".$row['id']."'>Invoice</a></td></tr>"; 
							}else{
								 $output .= "<tr><td>".$row['date']."</td>
								 <td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td>
								 <td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td>
								 <td>".$row['description']."</td><td>".$row['weight']."</td><td>".$row['total']."</td><td class=''>
								 <select  id='".$row['debitID']."' class='form-control statusId'> 
								 	<option  value='-1' selected disabled hidden>Choose Status</option>
								 	<option value='1' >Paid</option>
								 	<option value='0' >Unpaid</option>
								 </select>


								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a  class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Edit</a></li>
									     <li><a  class='details' data-id='".$row['id']."' data-toggle='modal' data-target='#addDetails'>Add Details</a></li>

									    <li ><a  class='delClass' del-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
								</div>


 									</td><td><a href='php_action/invoiceGenerator.php?id=".$row['id']."'>Invoice</a></td></tr>"; 
							}

								}
 								}else{

 									echo "<h4 class='text-secondary'>No record found</h4>";

 								}
 									
 										$output .= '</tbody>
													</table>';
 								
 								

 									echo $output;	




		}else{
	
						$sql = "SELECT p.id , p.date, p.crates_quan ,p.weight ,p.description, p.rate, debit.id as debitID, debit.debit as total , debit.status , acc.name , acc.acc_num , acc.place , acc.contact 
				FROM `debit` INNER JOIN purchase as p ON p.id = debit.purchase_id INNER JOIN accounts as acc ON acc.id = p.acc_id where acc.id = '$id' and p.date BETWEEN '$s' and '$e' ORDER BY date ASC";

							$result = $connect->query($sql);
							$output = '<table class="table text-center" id="manageBrandTable">
							<thead>
								<tr>							
							<th>Date</th>
							<th>Name</th>
							<th>Account (khata)</th>
							<th>Place</th>
							<th>Contact</th>
							<th>Crates</th>
							<th>Rate</th>
							<th>Description</th>
							<th>Weigth</th>
							<th>Total</th>
							<th>Payment Status</th>
							<th>Options</th>
						
						
						</tr></thead><tbody>';  
						if($result->num_rows > 0){    
							while ($row = mysqli_fetch_assoc($result)) {
							if ($row['status'] == 1) {
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['description']."</td><td>".$row['weight']."</td><td>".$row['total']."</td><td class='text-success'>
								
								 Paid
								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
							<li><a  class='ediClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Edit</a></li>
							 <li><a  class='details' data-id='".$row['id']."' data-toggle='modal' data-target='#addDetails'>Add Details</a></li>
									    <li ><a  class='delClass' del-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
								</div>


 									</td><td><a href='php_action/invoiceGenerator.php?id=".$row['id']."'>Invoice</a></td></tr>"; 
							}else{
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['description']."</td><td>".$row['weight']."</td><td>".$row['total']."</td><td class=''>
								 <select  id='".$row['debitID']."' class='form-control statusId'> 
								 	<option  value='-1' selected disabled hidden>Choose Status</option>
								 	<option value='1' >Paid</option>
								 	<option value='0' >Unpaid</option>
								 </select>


								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a  class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Edit</a></li>
									     <li><a  class='details' data-id='".$row['id']."' data-toggle='modal' data-target='#addDetails'>Add Details</a></li>
									    <li ><a  class='delClass' del-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
								</div>


 									</td><td><a href='php_action/invoiceGenerator.php?id=".$row['id']."'>Invoice</a></td></tr>"; 
							}

								}
 								}else{

 									echo "<h4 class='text-secondary'>No record found</h4>";

 								}
 									
 										$output .= '</tbody>
													</table>';
 								
 								

 									echo $output;	}

 ?>

