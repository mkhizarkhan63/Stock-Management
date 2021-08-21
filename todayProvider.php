<?php 

require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li class="active">Today's Provider</li>
  <li >
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "Today's Provider";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" >
			
		<div class="text-danger"><p>Note: Select the Provider with date it will shows date wise transaction</p></div>
			
  		<form class="form-horizontal"  action="" id="viewTrans">

			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Provider Name</label>
			    <div class="col-sm-6">
			     <select id="provider" name="provider" class="form-control">
			     	<option value="-1" disabled selected hidden> Choose </option>
			      <?php 
			    	$sql = "SELECT * FROM `provider` ";

					$result = $connect->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
							    echo "<option value=".$row['id'].">".$row['name']."</option>";
							}
						}
						
					 ?>	
					 <option value="0">none</option>
			     </select>
			    </div>
			  </div> <!--/form-group-->

			  <div class="form-group" id="">
			  	<label class="col-sm-2 control-label">Start Date </label>
			  	 	<div class="col-sm-4">
			  			<input type="date" class="form-control" id="S_date" name="S_date">
			  		</div>
			  		<label class="col-sm-1  control-label">End Date </label>
			  	 	<div class="col-sm-4">
			  			<input type="date" class="form-control" id="E_date" name="E_date">
			  		</div>
			  </div>
			<br>
				<div class="col-sm-4 col-sm-offset-4 ">
					<input type="submit" name="submit" id="submit" value="submit" class="btn btn-success btn-block">
			
				</div>




			</form>

			
			  	</div></div>
			  	  <div id="tableHere" style="
			  	  position: relative;">
			  	  

			  	  </div>

<!-- 2 panel -->

<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "Credit on Provider";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" >
			
		<div class="text-danger"><p>Note: Check the provider Total Credit.</p></div>
			
  		<form class="form-horizontal"  action="" id="totalProvider">

			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Provider Name</label>
			    <div class="col-sm-6">
			     <select id="provider1" name="provider1" class="form-control">
			     	<option value="-1" disabled selected hidden> Choose </option>
			      <?php 
			    	$sql = "SELECT * FROM `provider` ";

					$result = $connect->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
							    echo "<option value=".$row['id'].">".$row['name']."</option>";
							}
						}
						
					 ?>	
					 <option value="0">none</option>
			     </select>
			    </div>
			  </div> <!--/form-group-->

				<div class="col-sm-4 col-sm-offset-4 ">
					<input type="submit" name="submit" id="submit" value="submit" class="btn btn-success btn-block">
			
				</div>




			</form>

			
			  	</div></div>

			  	<div class="container text-center">
			  		<h2 class="text-secondary" id="myText"></h2>
			  	</div>

			  	  <script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
			  	  <script type="text/javascript">
			  	  	$(document).ready(function(){
			  	  		
   						
						$(document).on('submit' , '#viewTrans' , function(e){
							e.preventDefault();
							//var sk_id = $(this).val();
				
					$.ajax({

							method : 'POST',
							url :'php_action/todayProviderController.php',
							data : $(this).serialize(),
							success : function(data){
								$('#tableHere').html(data);	
								 $('#manageBrandTable').DataTable();
								}

						});

			  	  	});

						$(document).on('submit' , '#totalProvider' , function(e){
							e.preventDefault();
							$.ajax({
								method : 'POST',
								url : 'php_action/checkTotalProviderCredit.php',
								data : $(this).serialize(),
								success : function(data){
									$('#myText').html(data);
								}
							});


						});

					});

			  	  </script>


 <script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>
