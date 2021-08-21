<?php 
include 'db_connect.php';
error_reporting(0);
$id = $_POST['shopkeeper'];
$s = $_POST['S_date'];
$e = $_POST['E_date'];

if ($s == '' && $e == '') {
	$sql = "SELECT DISTINCT p.id, p.rate ,p.weight,p.details , p.crates_quan , p.date , acc.name , acc.acc_num , acc.place ,acc.contact ,acc.id  as accounts , cd.credit ,cd.id as cd_id ,cd.status FROM `sales` as p INNER JOIN accounts as acc on p.acc_id = acc.id INNER JOIN credit as cd on cd.sales_id = p.id where acc.id = '$id'  ORDER BY date DESC";
							
							$result = $connect->query($sql);
							$output = '<table class="table " id="manageBrandTable">
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
							<th>Total</th>
							<th>Description</th>
							<th>Payment Status</th>
							<th>Options</th>
							<th>Invoice</th>
						
						
						</tr></thead><tbody>';  
						if($result->num_rows > 0){    
							while ($row = mysqli_fetch_assoc($result)) {

							if ($row['status'] == 1) {
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['weight']."</td><td>".$row['credit']."</td><td>".$row['details']."</td><td class='text-success' id='paid'>
									Paid
								 	
								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a  class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Add Details</a></li>
									    <li ><a class='Update' data-id='".$row['id']."' data-target='#Update' data-toggle='modal'>Edit</a></li>

									    <li ><a  class='remove' data-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
									  </div>
									  </td>
									  <td>
								<div class = 'invoice-button'>
								<a href='php_action/invoiceGeneratorforSales.php?id=".$row['id']."'>Invoice</a>
								</div>


 									</td>
 										</tr>"; 
							}else{
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['weight']."</td><td>".$row['credit']."</td><td>".$row['details']."</td><td class=''>
								 <select  id='".$row['cd_id']."' class='form-control statusId'> 
								 	<option  value='-1' selected disabled hidden>Choose Status</option>
								 	<option value='1' >Paid</option>
								 	<option value='0' >Unpaid</option>
								 </select>


								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a  class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Add Details</a></li>

									   <li ><a  class='Update' data-id='".$row['id']."' data-target='#Update' data-toggle='modal'>Edit</a></li>

									    <li ><a  class='remove' data-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
									  </div>
									  </td>
								<td>
								<div class = 'invoice-button'>
								<a href='php_action/invoiceGeneratorforSales.php?id=".$row['id']."'>Invoice</a>
								</div>
                                  </td></tr>"; 
							}

								}
 								}else{

 									echo "<h4 class='text-secondary'>No record found</h4>";

 								}
 									
 										$output .= '</tbody>
													</table>';
 								
 								

 									echo $output;
	
}else{

	
						$sql = "SELECT DISTINCT p.id, p.rate ,p.weight , p.details,p.crates_quan , p.date , acc.name , acc.acc_num , acc.place ,acc.contact ,acc.id  as accounts , cd.credit ,cd.id as cd_id ,cd.status FROM `sales` as p INNER JOIN accounts as acc on p.acc_id = acc.id INNER JOIN credit as cd on cd.sales_id = p.id where acc.id = '$id' and p.date BETWEEN '$s' and '$e' ORDER BY date ASC";
							$result = $connect->query($sql);
							
							$output = '<table class="table " id="manageBrandTable">
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
							<th>Total</th>
							<th>Description</th>
							<th>Payment Status</th>
							<th>Options</th>
							<th>Invoice</th>
						
						
						</tr></thead><tbody>';  
						if($result->num_rows > 0){    
							while ($row = mysqli_fetch_assoc($result)) {
							if ($row['status'] == 1) {
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['weight']."</td><td>".$row['credit']."</td><td>".$row['details']."</td><td class='text-success' id='paid'>
									Paid
								 	
								 </td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Add Details</a></li>
									    <li ><a  class='Update' data-id='".$row['id']."' data-target='#Update' data-toggle='modal'>Edit</a></li>
									    <li ><a  class='remove' data-id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
									  </td>
								</div>
								<td>
									</div>
								<div class = 'invoice-button'>
								<a href='php_action/invoiceGeneratorforSales.php?id=".$row['id']."'>Invoice</a>
								</div>
								</td></tr>"; 
							}
							else{
								 $output .= "<tr><td>".$row['date']."</td><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['crates_quan']."</td><td>".$row['rate']."</td><td>".$row['weight']."</td><td>".$row['credit']."</td><td>".$row['details']."</td><td class=''>
									 <select  id='".$row['cd_id']."' class='form-control statusId'> 
								 	<option  value='-1' selected disabled hidden>Choose Status</option>
								 	<option value='1' >Paid</option>
								 	<option value='0' >Unpaid</option>
									 </select>


								 </td><td>
									<div class='dropdown'>
  										<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a  class='editClass' data-id='".$row['id']."' data-toggle='modal' data-target='#editTransaction'>Add Details</a></li>
									      <li ><a  class='Update'  id='".$row['id']."' data-target='#Update' data-toggle='modal'>Edit</a></li>

									    <li ><a  class='remove' data-id='".$row['id']."'>Remove</a></li>
									   
										  </ul>
										  </div>
	 									</td>
	                                    <td>
									<div class = 'invoice-button'>
									<a href='php_action/invoiceGeneratorforSales.php?id=".$row['id']."'>Invoice</a>
									</div>
									</td>
 									</tr>"; 
							}

								}
 								}else{

 									echo "<h4 class='text-secondary'>No record found</h4>";

 								}
 									
 										$output .= '</tbody>
													</table>';
 								
 								

 									echo $output;	

 								}

 ?>

