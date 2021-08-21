<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check">Today's Profit/Loss</i>	<!-- Today's Profit/Loss -->
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="" method="POST" id="profit_loss">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="date" class="form-control" id="sDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  
				  <div class="form-group">
				    <div class="col-sm-offset-5 col-sm-10">
				      <input type="submit" class="btn btn-primary " id=""  name="submit"> 
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
		<div class=" col-md-6">
			<div id="output"></div>
		</div>
		

</div>
<!-- /row -->

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('submit', '#profit_loss' , function(e){
			e.preventDefault();
				$.ajax({
			method : 'POST',
			url : 'php_action/profit_lossController.php',
			data : $(this).serialize(),
			success : function(data){

				$("#output").html(data);
				$.ajax({
					method : 'POST',
					url : 'php_action/remainWeight.php',
					data : $('#sDate').serialize(),
					success:function(data){
						var data_abs = Math.abs(data);
						$('#Total #Weight').html(data_abs);

					}



				});

			}



			});
				

		//$(this)[0].reset();

		});

	});



</script>

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>