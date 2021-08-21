<?php require_once 'includes/header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-offset-4 col-md-4">
			<form method="POST" id="staticForm">
  <div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" class="form-control" id="" aria-describedby="" placeholder="">
   
  </div>
  <div class="form-group">
    <label for="">Account Number</label>
    <input type="text" name="acc" class="form-control" id="" placeholder="">
  </div>
  <div class="form-group">
    <label for="">Amount</label>
    <input type="text" name="amount" class="form-control" id="" placeholder="">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

		</div>

	</div>
	<br>
	<br>
	<hr>
<div class="row">
	<div class="col-md-6 col-md-offset-3" id="myCon"></div>
</div>

</div>	


<script type="text/javascript">
$(document).ready(function(){

	$(document).on('submit','#staticForm' , function(e){
		e.preventDefault();
		$.ajax({
		method : 'POST',
		url : 'php_action/staticController.php',
		data : $(this).serialize(),
		success : function(data){
				alert(data);
				fetch();
				$('#staticForm')[0].reset();
				

		}



	});

	});
	

	function fetch(){

$.ajax({
		method : 'GET',
		url : 'php_action/staticFetch.php',
		success : function(data){
				$('#myCon').html(data);
				

		}



	});

	}

	fetch();



});



</script>







<?php require_once 'includes/footer.php'; ?>