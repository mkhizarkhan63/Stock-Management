<?php 
require_once 'includes/header.php'; 
?>


<div class="container" id="tableHere"  >
             

     
    
</div>
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	
	$(document).ready( function () {
    	
    	$.ajax({
			method:'GET',
			url:'php_action/unpaidFetching.php',
			success:function(data){
				
				$('#tableHere').html(data);
				$('#myTable').DataTable();
			}


    	});



} );
</script>
<?php require_once 'includes/footer.php'; ?>