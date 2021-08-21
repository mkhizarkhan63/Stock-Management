<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li class="active">Add Sales</li>
  <li >
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "Add Sales";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" style="">
			
		<div class="text-danger"><p>Note: Please Select the Provider First then Select ShopKeeper</p></div>
			
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


			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">ShopKeeper </label>
			    <div class="col-sm-6">
			    	<select id="shopkeeper" class="form-control">
			    		

			    	</select>


			    </div>
			</div>

			</form>
			  	  <hr>
			  	  <div id="tableHere" style="
			  	  position: relative;">
			  	  

			  	  </div>
			  

			  	
	<script type="text/javascript">
		$(document).ready(function(){

			$(document).on('change' ,"#provider" , function(e){

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

			$(document).on('change' , '#shopkeeper' , function(e){
				
				var sk_id = $(this).val();
				
				$.ajax({
					method : 'GET',
					url :'php_action/Shopkeeperfetchtable.php',
					data : {id : sk_id },
					success : function(data){
						$('#tableHere').html(data);	

						}

					});

				


			});

			$(document).on('keyup' , '#weight' ,function(){
			var weight =  $(this).val();
			var rate = $('#rate').val();
			var discount = $('#discount').val();
			

			var rate_dis = (parseInt(rate) + 11) - discount;
			
			var total = rate_dis * parseFloat(weight);
			//console.log(`weight ${weight} rate ${rate} discount ${discount}`);
				
			$('#total').val(Math.ceil(total)); 
		
		});

			$(document).on("submit" , "#AddingsalesForm" , function(e){
				e.preventDefault();

				$.ajax({
					method : 'POST',
					data : $(this).serialize(),
					url : 'php_action/shopKeeperController.php',
					success : function(data){
						console.log(data);
						  alert(data);
						  $('#AddingsalesForm')[0].reset();
					}
					
				});
			});



		}); 


	
	</script>		  														

<script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>


	