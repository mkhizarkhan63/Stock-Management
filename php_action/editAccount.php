<?php 
	include 'db_connect.php';
	  $id = $_POST['id'];

		$options ='';
		//$sql = "SELECT * FROM `type` ";
		$sql =  "SELECT DISTINCT type.id ,type.type FROM `type` INNER JOIN accounts ON accounts.type_id = type.id WHERE accounts.id = '$id'";
		$result = $connect->query($sql);
		
		$row = $result->fetch_assoc();
		  $options .= "<option value=".$row['id'].">" .$row['type'] . "</option>";
			
		

	
      // fetch data from student table..  
      $sql1 = "SELECT * FROM `accounts` WHERE id = '$id' ";  
      $query = $connect->query($sql1);  
      	$outputs = '';  

      if ($query->num_rows > 0) {  				
    

					
      while ($row = $query->fetch_assoc()) {  
      $outputs .= '

	      	<form class="form-horizontal" id="editAccounts"  method="POST">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Account</h4>
		      </div>
		      <div class="modal-body">

		      	<div id="edit-brand-messages"></div>

		      		 <input type="hidden"  id="editId" value="'.$row['id'].'">
			      <div class="edit-brand-result">
			      	<div class="form-group">
			        	<label for="editBrandName" class="col-sm-3 control-label"> Name: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input required type="text" class="form-control" id="editName" value="'.$row['name'].'" name="" autocomplete="off">
					    </div>
		        </div>       
		        <div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label"> Account: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" value="'.$row['acc_num'].'" class="form-control" id="editAcc" name="" autocomplete="off">
					    </div>
		        </div> 
		        <div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label"> Discount: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" value="'.$row['p_discount'].'" class="form-control" id="editdiscount"  name="" autocomplete="off">
					    </div>
		        </div> 
		        <div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label"> Place: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" value = "'.$row['place'].'" class="form-control" id="editPlace" name="" autocomplete="off">
					    </div>
		        </div> 	        
		        
		      </div>   
		        <div class="form-group">
		        	<label for="editBrandName" class="col-sm-3 control-label"> Contact: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" value = "'.$row['contact'].'" class="form-control" id="editContact" name="" autocomplete="off">
					    </div>
		        </div> 	        
		        
		      </div>      
   

		     	<div class="form-group">
		     		<label for="editBrandName" class="col-sm-3 control-label"> Type: </label>
		        	<label class="col-sm-1 control-label">: </label>
		     		<div class="col-sm-8">
		     			<select name="type" required="" id="type" class="form-control">
		     				
		     			'.$options.'</select>
		     		</div>
		     	</div>

		        	        
		     

	      </div> 

	      <div class="form-group ">
			    <div class="col-sm-offset-5 col-sm-10">
			   
			      <input type="submit" id="update" class="btn btn-success" name="submit" value="Save Changes">

			      
			    </div>
			  </div>
	   
     	</form>';   

        }

      }  
      
echo $outputs;  

    

			  	


 ?>  







 