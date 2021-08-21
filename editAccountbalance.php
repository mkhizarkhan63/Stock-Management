<?php 

include 'php_action/db_connect.php';
require_once 'includes/header.php'; 




$id = $_GET['id'];
$name = $_GET['name'];

$sql = "SELECT DISTINCT acc.id ,acc.name,acc.contact,type.type , SUM(cd.debit) as debit , cd.credit FROM `purchase` INNER join accounts as acc on acc.id = purchase.acc_id INNER JOIN type on type.id = acc.type_id INNER JOIN cred_debit cd on cd.p_id = purchase.id where acc.id  = '$id' ";
		$result = $connect->query($sql);
	
		echo '<h2 class="text-center">'.$name.'</h2>';

	while ($row = $result->fetch_assoc()) {
	
	    echo "<h4 class='text-center'>Total Debit: " .$row['debit']."</h4><br/>";
	}


 ?>




 <!-- <form class="form-horizontal" id="editAccounts"  method="POST">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title text-center"></h4>
		        
		      </div>
		      <div class="modal-body">

		      	<div id="edit-brand-messages"></div>

		      		 

	      <div class="form-group ">
			    <div class="col-sm-offset-5 col-sm-10">
			   
			      <input type="submit" id="update" class="btn btn-success" name="submit" value="Save Changes">

			      
			    </div>
			  </div>
	   
     	</form> -->

     	
<script type="text/javascript" src="../assests/jquery/jquery.js"></script>


<?php require_once 'includes/footer.php'; ?>