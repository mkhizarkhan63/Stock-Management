<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>

<ol class="breadcrumb">
  <li><a href="dashboard.php">Home</a></li>
  <li class="active">View Daily Expenses</li>
  <li >
  	
  </li>
</ol>


<h4>
	<i class='glyphicon glyphicon-circle-arrow-right'></i>
	<?php  
		echo "View Daily Expenses";
	
	?>	
</h4>



<div class="panel panel-default">
	<div class="panel-heading">

		

	</div> <!--/panel-->	
	<div class="panel-body" style="">
			
		
			<form method="POST" class="form-horizontal" id="dailyExpense">
				
		
			<div class="form-group" id="">
			  	<label class="col-sm-4 control-label">Start Date </label>
			  	 	<div class="col-sm-4">
			  			<input type="date" class="form-control" id="S_date" name="S_date">
			  		</div>
			  		
			  </div>
			<br>
				<div class="col-sm-4 col-sm-offset-4 ">
					<input type="submit" name="submit" id="submit" value="View Daily Expenses" class="btn btn-primary btn-block">
			
				</div>
			</form>
			  	  <hr>
			  	  <div id="tableHere" >
			  	  

			  	  </div>
			  	  <script type="text/javascript">
			  	  	$(document).ready(function(){
			  	  	$(document).on('submit','#dailyExpense' , function(e){
			  	  		e.preventDefault();			  	  		
			  	  		$.ajax({
			  	  			method : 'POST',
			  	  			url  :'php_action/viewDailyExpense.php',
			  	  			data :$(this).serialize(),
			  	  			success : function(data){
			  	  			$('#tableHere').html(data);
			  	  			}
			  	  		});

			  	  		});
					});

			  	  </script>


 <script src="custom/js/order.js"></script>

<?php require_once 'includes/footer.php'; ?>
