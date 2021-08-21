<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li>View</li>
  <li class="active">
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "View Transactions";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" style="">
			
		<div class="text-danger"><p>Note: You can view record with selecting name or with the date.</p></div>
			
  		<form class="form-horizontal"  action="" id="fetchTrans">

			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Account Name</label>
			    <div class="col-sm-6">
			     <select id="purchaseTransaction" class="form-control">
			     	<option value="-1" disabled selected hidden> Choose </option>
			      <?php 
			    	$sql = "SELECT * FROM `accounts` WHERE type_id ='1'";

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
			  <div class="form-group">
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
			  <div class="form-group ">
			  	<div class="col-sm-2 col-sm-offset-5">
			  	<input type="submit" class="btn btn-primary form-control" name="submit">
			  	</div>
			   </div>

			</form>
					<br><br>
			  	  <hr>
			  	  
			  	<div class="col-sm-offset-4 col-sm-6">
			  	 		<label>Start</label>
			  	 	 <input type="date" name="InvoiceStart" id="InvoiceStart" class="form-control" name="" style="width: 400px;"><br>
			  	 	 <label>End</label>
			  	 	 <input type="date" name="InvoiceEnd" id="InvoiceEnd" class="form-control" name="" style="width: 400px;">
			  	 	 <br>

			  			 <a  id="totalInvoice" class="btn btn-info"> Invoice</a>
			  	 
			  	</div>
			  	  
			  	  <br>
			  	  <br>
			  	  <div id="tableHere" style="">
			  	
			  	  

			  	  </div>
			  </div></div>
			  <!-- edit account -->
<form method="POST" id="editTransactionForm">
	<input type="hidden" name="updateId" id="updateId">
 	<div class="modal fade" id="editTransaction" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 	 <div class="modal-dialog" role="document">
  	  <div class="modal-content">
      <div class="modal-header">
    	    <h5 class="modal-title" id="exampleModalLabel">Updata Transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="bodyData">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
      </div>
	    </div>
	  </div>
		</div>
</form>
<form method="POST" id="addDetailsForm">
	<div class="modal fade" id="addDetails" tabindex="-1" role="dialog" 				aria-labelledby="exampleModalLabel" aria-hidden="true">
	 		 <div class="modal-dialog" role="document">
	    	<div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add Description</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body" id="">
	      		<input type="hidden" name="detailsID" id="detailsID" >
        	<div class="form-group">
   	 			<label for="exampleFormControlTextarea1">Add Description </label>
   			 <textarea class="form-control" name="details" id="" rows="3"></textarea>
  		</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" name="submit" class="btn btn-primary">Add Details</button>
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
				var Acc_id = $('#purchaseTransaction').val();
				var Sdate = $('#InvoiceStart').val();
				var Edate = $('#InvoiceEnd').val();

				window.location.href = "php_action/totalInvoiceforPurchase.php?id="+Acc_id+"&s="+Sdate+"&e="+Edate+"";
				
			});
				
			$(document).on('submit' , '#fetchTrans' , function(e){
				e.preventDefault();
				// var a = $('#purchaseTransaction').val();
				// var s_date = $('#S_date').val();
				// var e_date = $('#E_date').val();
				// 	$.ajax({
				// 		method : 'POST',
				// 		url : 'php_action/viewTrans.php',
				// 		data : {id : a , start : s_date , end : e_date},
				// 		success : function(data){
				// 			$('#tableHere').html(data);
				// 		}
				fetch_data();

				// 	});



			});

			function fetch_data(){
				var a = $('#purchaseTransaction').val();
				var s_date = $('#S_date').val();
				var e_date = $('#E_date').val();
				$.ajax({
						method : 'POST',
						url : 'php_action/viewTrans.php',
						data : {id : a , start : s_date , end : e_date},
						success : function(data){
							$('#tableHere').html(data);
							console.log(data);
							
							$('#manageBrandTable').DataTable();	
						}


					});

			}

			$(document).on('change','.statusId' , function(){
 			var status = $(this).val();
 			var id = $(this).attr('id');
 			$.ajax({
 				method:"POST",
 				url: "php_action/updateStatus.php",
 				data:{status : status  , id : id},
 				success : function(data){
 					fetch_data();
 					alert(data);


 				}


 			});



 		});

			function removeRow(){
				$(document).on('click', '.delClass' , function(){
					var removeId = $(this).attr('del-id');
					$.ajax({
						method : 'POST',
					url : 'php_action/removeTransactionController.php',
						data :  {id : removeId},
						success : function(data){
							alert(data);
							fetch_data();
							removeId = '';
						}
					});
				});
			}
			removeRow();

			///for edit Code
			function gettingID(){
				$(document).on('click','.editClass',function(){
				var dataid = $(this).attr('data-id');
				$('#updateId').val(dataid);
				//console.log(dataid);
					$.ajax({
						method: 'POST',
						url: 'php_action/editTransaction_FetchRequest_controller.php',
						data : {id : dataid},
						success : function(data){
							$('#bodyData').html(data);
							//console.log(data);
						}
					});			

					dataid = '';
				});
			}
			gettingID();
			
			//updating form
		$(document).on('submit' , '#editTransactionForm' , function(e){

			e.preventDefault();
			$.ajax({
				method: 'POST',
				url : 'php_action/editTransactionUpdataController.php',
				data : $(this).serialize(),
				success : function(data){
					alert(data);
					fetch_data();
					$('#editTransaction').modal('hide'); 
					//for hiding modal
				}
			});




			});
			
			$(document).on('click' , '.details' , function(e){
				var id  = $(this).attr('data-id');
				$('#detailsID').val(id);
				e.preventDefault();

			});

			$(document).on('submit' , '#addDetailsForm' , function(e){
					e.preventDefault();
				$.ajax({
					method : 'POST',
					url : 'php_action/addDetailsForPurchase.php',
					data : $(this).serialize(),
					success : function(data){
						alert(data);
						fetch_data();	
						$("#addDetails").modal('hide');					
						$("#addDetailsForm")[0].reset();
					}


				});

			});

		
		});



 
	</script>		  														

<script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>


