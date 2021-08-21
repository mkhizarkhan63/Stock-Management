<?php 
//session_start();
include 'php_action/db_connect.php';
require_once 'includes/header.php'; 

?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Account_Balance</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Account Balance</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">
				<p class="text-danger">Note: Click on the name to view more details</p>
								
				<table class="" id="myTable">
							<thead>
							<tr>							
							<th>Name</th>
							<th>Account (Khata)</th>
							<th>Place</th>
							<th>Contact</th>
							<th>Account Type</th>
							<th>Debit</th>
							<th>Credit</th>
							
							
							</tr> 
							</thead>
							<tbody>
							<?php 
								$sql = "SELECT DISTINCT acc.id ,acc.name, acc.acc_num, type.type, acc.place ,acc.contact, SUM(cd.debit) as debit FROM `purchase` INNER join accounts as acc on acc.id = purchase.acc_id INNER JOIN type on type.id = acc.type_id INNER JOIN debit cd on cd.purchase_id = purchase.id GROUP BY acc.id";
								$result = $connect->query($sql);
								if ($result->num_rows > 0) {
									
									while ($row = $result->fetch_assoc()) {
									    

							?>
							
								<tr><td><?=$row['name']?></a></td><td><?= $row['acc_num']?></td>
									<td><?=$row['place']?></td><td><?= $row['contact']?></td> <td><?= $row['type']?></td><td><?= $row['debit']?></td><td class="text-danger">No Credit</td>
									


								</tr>



							<!-- </tbody> -->

						<?php }

								} ?>
						
 								
					<?php 
				$sql1 = "SELECT acc.id ,acc.name, acc.acc_num, type.type, acc.place ,acc.contact  ,SUM(cd.credit) as credit FROM `sales` INNER join accounts as acc on acc.id = sales.acc_id INNER JOIN type on type.id = acc.type_id INNER JOIN credit cd on cd.sales_id = sales.id GROUP BY acc.id";
				$result1 = $connect->query($sql1);
								if ($result1->num_rows > 0) {

									while ($row1 = $result1->fetch_assoc()) { ?>
								<!-- <tbody> -->
								<tr><td><?=$row1['name']?></a></td><td><?= $row1['acc_num']?></td>
									<td><?=$row1['place']?></td><td><?= $row1['contact']?></td> <td><?= $row1['type']?></td><td class="text-danger">No Debit</td><td><?=$row1['credit']?></td>
									


								</tr>



									


			<?php								
									}

								}


			 ?>								

			
			 </tbody>		
				</table>
				<!-- /table -->


			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<div class="container">
	<?php 
		$totalSQL = "SELECT SUM(debit) as debit  FROM `debit`";
		$res = $connect->query($totalSQL);
		$Debit= $res->fetch_assoc();

		$creditQL = "SELECT SUM(credit) as credit FROM `credit`";
		$res1  = $connect->query($creditQL);
		$Credit = $res1->fetch_assoc();

	 ?>
	
	 <h2><b class="text-secondary">Debit: </b><i class="text-warning"> <?= $Debit['debit']?> Rs</i></h2>
	 <h2><b class="text-secondary">Credit: </b><i class="text-success"> <?= $Credit['credit']?> Rs</i></h2>
</div>

		

<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assests/jquery/jquery.js"></script>
<script type="text/javascript">
	
$(document).ready( function () {
    $('#myTable').DataTable();
} );
	
</script>

<?php require_once 'includes/footer.php'; ?>

