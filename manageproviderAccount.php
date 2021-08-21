<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li class="active">Sells</li>
  <li >
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "Sells";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" style="height: 250px;">
			
		<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addProviderAccount"> <i class="glyphicon glyphicon-plus-sign"></i> Add Provider Account </button>
				</div>

				<!-- add form -->
<div class="modal fade" id="addProviderAccount" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
		<form class="form-horizontal" method="POST"  id="addProvAccount">
			<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Provider Account</h4>
	      </div>
			  <div class="form-group">
			    <label for="Name" class="col-sm-2 control-label">Name</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="orderDate" required="" placeholder="Account Name" name="name" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Account</label>
			    <div class="col-sm-8">
			      <input type="number" class="form-control" required="" id="clientName" name="account" placeholder="Khata no" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			  

			  <div class="form-group">
			    <label for="Place" class="col-sm-2 control-label">Place</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" required="" id="clientContact" name="place" placeholder="Place" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->	
			  <div class="form-group">
			    <label for="Place" class="col-sm-2 control-label">Contact </label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" required="" id="clientContact" name="contact" placeholder="Contact" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->	
			 
			   

			  	<div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			   
			      <input type="submit" id="addProvAcc" class="btn btn-success" name="submit" value="Add Provider Account">

			      
			    </div>
			  </div>
			 
			</form>
	

    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
			
  		<form class="form-horizontal"  method="POST" id="myForm">

			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Provider Name</label>
			    <div class="col-sm-6">
			     <select id="selectProviderAcc" name="provider" class="form-control">
			     	
			      
					 
			     </select>
			    </div>
			  </div> <!--/form-group-->

			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">ShopKeeper </label>
			    	<div class="col-sm-6" id="">
			    		<select name="ShopKeeper[]" id="ex-multiselect" multiple>
			    			<option selected hidden disabled>Choose</option>
			   				<?php 
	
	$sql = "SELECT accounts.id , accounts.name FROM `accounts` inner join type t on t.id=accounts.type_id where t.id = 2  and accounts.prov_under_id = 0"; 

			   	$result = $connect->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) { 

							echo  "<option value=".$row['id'].">".$row['name']."</option>";
							}
						}
						?>
			    		
			    		</select>
				 	</div>
			</div>
			<input type="hidden" name="hiddenProvid" id="hiddenprovid">

			<div class="form-group">
				<div class="col-md-6 pull-right">
					<input type="submit" name="submit" value="Save Changes" class="btn btn-primary">
				</div>
			</div>
						 
			</form>
		
			  	  <hr>
			  	  <div id="tableHere" style="
			  	  position: relative;">
			  	  

			  	  </div>
			  
	  														

<script src="custom/js/order.js"></script>





		  	
			  	
	<script type="text/javascript">
		$(document).ready(function(){

					// (function ($) {
  			// 					$.ajax({
					// 			method: 'GET',
					// 				url : 'php_action/FETCHSHOPKEEPER.php',
					// 			success : function(data){
					// 				$('#ex-multiselect').html(data);
					// 				console.log(data);
					// 				}

					// 				});
					// 		})(jQuery);


			$(document).on('change' , '#selectProviderAcc' , function(e){
					
					var providerId = $('#selectProviderAcc').val();
					$.ajax({
					method : 'POST',
					url : 'php_action/getIDprovider.php',
					data : {provId : providerId},
					success : function(data){

						$('#hiddenprovid').val(data);
						//console.log(data);

					}

					});

				});
			//submitting form grouping the shopkeeper accounts under the provider
			$(document).on('submit' , '#myForm' , function(e){
					e.preventDefault();

					$.ajax({
					method : 'POST',
					url : 'php_action/addshopkeeperunderprovider.php',
					data : $(this).serialize(),
					success : function(data){

						alert(data);
						$(this)[0].reset();
						//console.log(data);

					}

					});


			});

			$('#ex-multiselect').picker();


			
			// fetch_shopKeeper();




			function fetch_data(){
				$.ajax({
					method : 'POST',
					url : 'php_action/fetchingProviderAccount.php',
					success : function(data){

						$('#selectProviderAcc').html(data);
						//$('#hiddenprovid').val(data);
					}




				});


			}

			fetch_data();



			//for adding form of provider
			$(document).on('submit','#addProvAccount', function(e){
				e.preventDefault();
				$.ajax({
					method : 'POST',
					url : 'php_action/addProviderController.php',
					data : $(this).serialize(),
					success : function(data){
						alert(data);
							$('#addProvAccount')[0].reset();
               				  $('#addProviderAccount').modal('hide');
               				  fetch_data();

					}



				});


			});

			

			

			
	});

	</script>	
	<?php require_once 'includes/footer.php'; ?>