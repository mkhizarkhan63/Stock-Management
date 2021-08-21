<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li class="active">View_Sales_Transaction</li>
  <li >
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "View Sales Transaction";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" style="">
			
		<div class="text-danger"><p>Note: You can view record with selecting name and with the date.</p></div>
			
  		<form class="form-horizontal"  action="" id="createOrderForm">

			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Provider Name</label>
			    <div class="col-sm-6">
			     <select id="provider" class="form-control">
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




			</form>

			<form method="POST" class="form-horizontal" id="viewTrans">
				
		<div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">ShopKeeper </label>
			    <div class="col-sm-6">
			    	<select id="shopkeeper" name="shopkeeper" class="form-control">
			    		

			    	</select>


			    </div>
			</div>
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
					<input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary btn-block">
			
				</div>
			</form>
			<br><br>
			  	  <hr>
			  	  <div class="col-sm-offset-4 col-sm-6">
			  	 		<label class="">Start</label>
			  	 	 <input type="date" name="InvoiceStart" id="InvoiceStart" class="form-control" name="" style="width: 400px;">
			  	 	 <br>
			  	 	 <label class="control-label">End</label>
			  	 	 <input type="date" name="InvoiceEnd" id="InvoiceEnd" class="form-control" name="" style="width: 400px;">
			  	 	 <br>

			  			 <a  id="totalInvoice" class="btn btn-info"> Invoice</a>
			  	 
			  	</div>
			  	<br>
			  	<br>
			  	  
			  	  <!-- details form -->
			  	  <form method="POST" id="detailForm">
			  	  <div class="modal fade" id="editTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add More Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        
        	<input type="hidden" name="detailsID" id="detailsID" >
        	<div class="form-group">
   	 <label for="exampleFormControlTextarea1">Details </label>
   	 <textarea class="form-control" name="details" id="" rows="3"></textarea>
  		</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Add </button>
      </div>
    </div>
  </div>
</div>

	</form>	
	</div></div>	
	<div id="tableHere" style="position: absolute; left: 0;"> </div>
<form method="POST" id="editSalesForm">
	<div class="modal fade" id="Update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="fetchRequestHere">
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
	</div>
</form>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>  	
	  <script type="text/javascript">
			  	  	$(document).ready(function(){

			  	  		$('#totalInvoice').click(function(e){

								e.preventDefault();
								var Acc_id = $('#shopkeeper').val();
								var Sdate = $('#InvoiceStart').val();
								var Edate = $('#InvoiceEnd').val();

								window.location.href = "php_action/totalInvoiceForSales.php?id="+Acc_id+"&s="+Sdate+"&e="+Edate+"";
								
						});
								
			  	  		
			  	  		$(document).on('change' ,"#provider" , function(e)
			  	  		{
			  	  			e.preventDefault();

							var id = $(this).val();
								$.ajax({

									method : 'GET',
									url : 'php_action/fetchShop_keeper_provider.php',
									data : {id : id},
									success : function(data){
									$('#shopkeeper').html(data);
									}

						    	});	

						    	

						});

				$(document).on('submit' , '#viewTrans' , function(e){
							e.preventDefault();
							//var sk_id = $(this).val();
				
					$.ajax({

							method : 'POST',
							url :'php_action/shopKeeperTransController.php',
							data : $(this).serialize(),
							success : function(data){
								console.log(data);
								$('#tableHere').html(data);	
								$('#manageBrandTable').DataTable();
								}

						});
							// $('#createOrderForm')[0].reset();
							// $(this)[0].reset();

					

			  	  	});

						function fetch_data(){
							$.ajax({

							method : 'POST',
							url :'php_action/shopKeeperTransController.php',
							data : $("#viewTrans").serialize(),
							success : function(data){
								$('#tableHere').html(data);	
								$('#manageBrandTable').DataTable();
								}

							});
						}


						$(document).on('change','.statusId' , function(e){
							e.preventDefault();
 			var status = $(this).val();
 			var id = $(this).attr('id');
 			$.ajax({
 				method:"POST",
 				url: "php_action/updateStatusforSales.php",
 				data:{status : status  , id : id},
 				success : function(data){
 					alert(data);
 					fetch_data();
 					$('#manageBrandTable').DataTable();
 				}


 			});



 		});
			$(document).on('submit' , '#detailForm' , function(e){
				e.preventDefault();
						$.ajax({
							method : 'POST',
							url : 'php_action/detailUpdate.php',
							data : $(this).serialize(),
							success : function(data){
								console.log(data);
								fetch_data();
								$('#detailForm')[0].reset();
								$('#editTransaction').modal('hide');
								$('#manageBrandTable').DataTable();
							}	

						});


						});

	$(document).on('click' , '.editClass' , function(){
	var	id  = $(this).attr('data-id');
	//console.log(id);
		$("#detailsID").val(id);
// alert($(this).attr('data-id'));
						});

// fetchingUpdate Details
	$(document).on('click', '.Update' , function(){
		var fetchingId = $(this).attr('data-id');
		$.ajax({
			method : 'POST',
			url : 'php_action/salesTransactionFetchRequestController.php',
			data : {id : fetchingId},
			success : function(data){
				$('#fetchRequestHere').html(data);
			}

		});
	});

///updateCOntroller
$(document).on('submit', '#editSalesForm' , function(e){
	e.preventDefault();
		
		$.ajax({
			method : 'POST',
			url : 'php_action/salesTransactionUpdateController.php',
			data : $(this).serialize(),
			success : function(data){
				// alert(data);
				console.log(data);
				fetch_data();
				$('#Update').modal('hide');
				$('#manageBrandTable').DataTable();
			}

		});
	});

	////forRemove
	$(document).on('click' , '.remove' , function(e){
		var removeId = $(this).attr('data-id');
		$.ajax({
			method : 'POST',
			url : 'php_action/salesTransactionRemoveController.php',
			data : {id : removeId},
			success : function(data){
				alert(data);
				fetch_data();
				$('#manageBrandTable').DataTable();
			}
		});

	});



					});

			  	  </script>


 <script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>
