<?php 

					include 'db_connect.php';
	

						$sql = "SELECT a.id as id ,a.name,a.acc_num,a.p_discount ,a.place,a.contact ,a.type_id , t.type FROM accounts as a INNER JOIN type as t on a.type_id = t.id ";
							$result = $connect->query($sql);
							$output = '<table class="table" id="manageBrandTable">
							<thead>
								<tr>							
							<th>Name</th>
							<th>Account (Khata)</th>
							<th>Person Discount</th>
							<th>Place</th>
							<th>Contact</th>
							<th>Type</th>
						<th style="width:15%;">Options</th>
						
						</tr> </thead><tbody>';  
						if($result->num_rows > 0){    
							while ($row = mysqli_fetch_assoc($result)) {
						 $output .= "<tr><td>".$row['name']."</td><td>".$row['acc_num']."</td><td>".$row['p_discount']."</td><td>".$row['place']."</td><td>".$row['contact']."</td><td>".$row['type']."</td><td>
								<div class='dropdown'>
  									<button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>Options
									  <span class='caret'></span></button>
									  <ul class='dropdown-menu'>
									    <li><a href='".$row['id']."' class='editClass' id='".$row['id']."' data-toggle='modal' data-target='#editBrandModel'>Edit</a></li>
									    <li ><a href='#' class='delClass' id='".$row['id']."'>Remove</a></li>
									   
									  </ul>
								</div>


 									</td></tr>"; }
 								}else{

 									echo "<h4 class='text-secondary'>No record found</h4>";

 								}
 									
 										$output .= '</tbody>
													</table>';
 								
 								

 									echo $output;	

 						 ?>

 						