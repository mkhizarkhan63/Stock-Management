<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Account</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Account</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
				

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" data-target="#addForm"> <i class="glyphicon glyphicon-plus-sign"></i> Add Account </button>
				</div> <!-- /div-action -->				
				<div id="fetchingData">
					


				</div>
				
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


		<!-- add form -->
<div class="modal fade" id="addForm" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
		<form class="form-horizontal" method="POST"  id="addAccount">
			<div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Account</h4>
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
			    <label for="Discount" class="col-sm-2 control-label">Discount</label>
			    <div class="col-sm-8">
			      <input type="number" class="form-control"  required=""     id="clientContact" name="discount" placeholder="Discount %" autocomplete="off" />
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
			 
			   <div class="form-group">
			    <label for="Type" class="col-sm-2 control-label">Type</label>
			    <div class="col-sm-8">
			    	
			      <select name="type" class="form-control">
			      	 <?php 
			  		$sql = "SELECT * FROM `type`";
					$result = $connect->query($sql);

					if ($result->num_rows > 0) {
						
					
					while ($row = $result->fetch_assoc()) {
					    echo "<option value=".$row['id'].">" .$row['type'] . "</option>";
					}
				}
			  		 ?>
			      	

			      </select>
			    </div>
			  </div> <!--/form-group-->	

			  	<div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			   
			      <input type="submit" id="createOrderBtn" class="btn btn-success" name="submit" value="Add Account">

			      
			    </div>
			  </div>
			 
			</form>
	

    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit account -->
<div class="modal fade" id="editBrandModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" id="editModal">
    	
    	

	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<script type="text/javascript" src="../assests/jquery/jquery.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){ ///start jquery

		function fetch_data()   ////fetching data
      {  
           $.ajax({  
                url:"php_action/fetchingAccount.php",  
                 method:"POST",  
          			 success:function(data)
          			 {  
                     $('#fetchingData').html(data);  
      					 $('#manageBrandTable').DataTable();

                	 }

            });  

          
       } 

      	fetch_data(); ///calling fetch func




      	////for edit
      	$(document).on('click','.editClass',function(){
      		var editId = $(this).attr('id'); 
      	$.ajax({
      		method :"POST",
      		url : "php_action/editAccount.php",
      		data : {id : editId},
      		success : function(data){
      			console.log(data);
      				$("#editModal").html(data);
      		}
      	});	
      	});
      	/////////////end edit


      	$(document).on('submit','#editAccounts',function(e){
      		e.preventDefault();
    	 var  editId = $('#editId').val();
    	 var e_name =   $('#editName').val();
    	 var e_acc =  $('#editAcc').val();
    	 var e_dis =  $('#editdiscount').val();
    	 var e_place =  $('#editPlace').val();
    	 var e_contact = $('#editContact').val();
    	 var e_type = $('#type').val();
        $.ajax({
        method:"POST",
        url: "php_action/updateAccount.php",
        data:{id:editId , name : e_name , acc : e_acc , dis : e_dis , place : e_place ,contact : e_contact , type : e_type},
        success: function(data){
        	
        	
	        $('.remove-messages').html(data);

	        setInterval(function(){
	        	$('.remove-messages').html('');

	        }, 5000);
	        
	          $('#editBrandModel').modal('hide'); //hiding modal after inserting
	        	fetch_data(); 

   				 }
   				});
			});


      	///for Inserting
      	$(document).on('submit','#addAccount',function(e){
        e.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "php_action/accountController.php",
        data:$(this).serialize(),
        success: function(data){
	        $('.remove-messages').html(data);

	        setInterval(function(){
	        	$('.remove-messages').html('');

	        }, 5000);
	        
	        	$('#addAccount')[0].reset();
                 $('#addForm').modal('hide'); //hiding modal after inserting
	        	fetch_data(); 

   				 }});
			});


		$(document).on('click', '.delClass', function(){ ////removing records

			//alert("hello");
				var delId = $(this).attr("id");
				$.ajax({
					url : "php_action/delAcc.php",
					method : "POST",
					data:{id : delId },
					success:function(data){
								
							fetch_data();
									}


				}); 
		});



		}); ///end jquery



	



</script>


<?php require_once 'includes/footer.php'; ?>