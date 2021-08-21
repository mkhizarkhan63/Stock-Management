<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li class="active">Purchase</li>
  <li >
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "Purchase";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" style="">
			
		
			
  		<form class="form-horizontal"  action="" id="createOrderForm">

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
			</form>
			  	  <hr>
			  	  <div id="tableHere" style="
			  	  position: relative;">
			  	  

			  	  </div>
			  

			  	
	<script type="text/javascript">
		$(document).ready(function(){
		
		$(document).on("change", "#purchaseTransaction",function(){
				
				//$("#loader").show();
				
				var getUserID = $(this).val();
				
				if(getUserID != '0' && getUserID > 0)
				{
					$.ajax({
						method: 'GET',
						url: 'php_action/fetchingPurchase.php',
						data: {customer_id:getUserID},
						success: function(data){
							//$("#loader").hide();
							//console.log(data);
							$("#tableHere").html(data);
						}
					});
				}
				else if(getUserID == 0)
				{
					$("#tableHere").html('');
					//$("#loader").hide();
				}
		});

		
		// var weight =  $('#weight');
		// console.log(weight);
		$(document).on('keyup' , '#weight' ,function(){
			var weight =  $(this).val();
			var rate = $('#rate').val();
			var discount = $('#discount').val();
			var rate_dis = parseInt(rate) - discount;
			//console.log(rate_dis);
			var total = rate_dis * parseFloat(weight);
			//console.log(`weight ${weight} rate ${rate} discount ${discount}`);

			$('#total').val(total); 
		
		});

		///for Inserting
      	$(document).on('submit','#purchaseForm',function(e){
        e.preventDefault();
       	//var accountId = $('#accountID').val();
        $.ajax({
        method:"POST",
        url: "php_action/purchaseController.php",
        data:$(this).serialize(),
        success: function(data){
	        //$('.remove-messages').html(data);
	        alert(data);
	        // setInterval(function(){
	        // 	$('.remove-messages').html('');

	        // }, 5000);
	        
	        	$('#purchaseForm')[0].reset();
                 //$('#addForm').modal('hide'); //hiding modal after inserting
	        	//fetch_data(); 

   				 }
   				});
			});
	});

	</script>		  														

<script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>


	