<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Chicken Management </title>
    <link rel="stylesheet" type="text/css" href="custom/picker/dist/picker.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  
  
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
  <style type="text/css">
    .cardContainer{
      background-color: white;
      color: black;
    }
    button#close.btn.btn-secondary{
      color: black;
      background: orange;
    }
    

  </style>
</head>
<body style="overflow-x: hidden; background-image: url('img/bg1.jpg'); background-repeat: no-repeat; background-position: center;">


	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Al-Madina C.C</a>
    </div>
    <ul class="nav navbar-nav">
        <li id="" class="active"><a href="index.php"><i class="glyphicon glyphicon-list-alt "></i>  Dashboard</a></li>      

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li id=""><a href="account.php">Manage Acconts</a></li>
         <li id=""><a href="accountbalance.php">Account Balance</a></li>   

        </ul>
      </li>

       <li class="dropdown" id="">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Purchase <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id=""><a href="purchase.php"> Add Transaction   </a></li>  
            <li id=""><a href="viewTrans.php"> View Transaction   </a></li> 
                       
          </ul>
        </li> 

         <li class="dropdown" id="">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-credit-card"></i> Sells <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id=""><a href="manageproviderAccount.php"> Manage Provider Account  </a></li>  
            <li id=""><a href="addSales.php"> Add Sales  </a></li>
            <li id=""><a href="ViewSalesTrans.php"> View Sales Transaction  </a></li>            
            <li id=""><a href="todayProvider.php"> Today's Provider  </a></li>

            <li id=""><a href="static.php">Static Amount</a></li>             
           
          </ul>
        </li> 

        <li class="dropdown" id="">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="" aria-expanded="false"> <i class="glyphicon glyphicon-check"></i> Report <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id=""><a href="profit_loss.php"> Today's Profit or Loss  </a></li>  
            <li id=""><a href="DailyExpenses.php">Add Daily Expenses   </a></li>    
            <li id=""><a href="viewDailyExpenses.php">View Daily Expenses   </a></li>           
                 
          </ul>
        </li> 


      <li class="dropdown text-right" id="navSetting">
          <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
                      
            <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
          </ul>
        </li>   
    </ul>
  </div>
</nav>
	<div class="container">




<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">




	
<div class="row">
	<div class="col-md-4 pull-left">
		<div class="card">
		  <div class="cardHeader">
		  	<p style="">Daily Rates</p>
		  	<p style="font-size: 14px">(Chicken)</p>
		    <h1 id="daily_rate"></h1>
		  </div>

		  <div class="cardContainer">
		    <p> <?php echo date('l') .' '.date('d').', '.date('Y'); ?> </p>
		  </div>
		</div> 
		
	</div>
	<div class="col-md-4 pull-right">
		
		
 <a href="unpaid.php" class="btn btn-warning btn-lg" style="margin-left: 50%;">Check Unpaid</a> 

		  	
		  
		 
	</div>
</div>	<br>

	<div class="row" >
		<div class=" col-md-4 col-md-offset-3 " >
		<h1> <span class="label label-default text-center" style="margin-left: 50%;">Daily Rates</span></h1>
		<div class="col-md-offset-6 col-md-8" id="msg"></div>
		<form class="form-horizontal " method="POST" action="" id="dailyRate">

			  <div class="form-group">
			   
			    <div class="col-sm-offset-4 col-sm-10">
			      <input type="number" class="form-control" id="orderDate"  placeholder="" name="rates" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			 
			  

			  <div class="form-group ">
			    <div class=" col-sm-offset-5 col-sm-10" >
			   
			      <input type="submit" id="createOrderBtn" class="btn btn-success" name="submit" value="Set Daily Rate">
			      <input type="button" value="Previous Rates" id="prev" class="btn btn-primary" data-toggle="modal" data-target="#allRates">
  			
					
			      
			    </div>
			  </div>
			</form>
		</div> 
	</div>
	
	

<div class="row">
<div class="col-md-8 mx-auto col-md-offset-2">
		<div class="card">
		  <div class="cardHeader">
		  	<p style="">Daily Expenses</p>

		  	<p style="font-size: 14px"></p>
		    <h1 id="expense"></h1>
		  </div>

		  <div class="cardContainer">
		    <p> <?php echo date('l') .' '.date('d').', '.date('Y'); ?> </p>
		  </div>
		</div> 
		
</div>
</div>
		

	

	<!-- form_start -->
<div class="row">
	<div class=" col-md-4 col-md-offset-3  " style="margin-top: 1%">
		<h1> <span class="label label-default text-center" style="margin-left: 4em;">Daily Purchase Summary</span></h1>
		<div class="col-md-offset-6 col-md-8" id="msg"></div>
		<form class="form-horizontal " method="POST"  id="pSummaryForm">

			  <div class="form-group">
			   
			    <div class="col-sm-offset-4 col-sm-10">
			      <input type="date" class="form-control" id="date"  placeholder="" name="dates" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			 
			  

			  <div class="form-group ">
			    <div class=" col-sm-offset-7 col-sm-10" >
			   
			      <input type="submit" id="purchaseSummary" class="btn btn-success " name="submit" value="Submit">
			  
  			
					
			      
			    </div>
			  </div>
			</form>
	</div> 
	

	
</div> <!--/row-->

<div class="container"  style="">
	<div class="row " id="mycon" style="">

	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="allRates" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">All Rates</h5>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="max-height: calc(100vh - 210px);
    		overflow-y: auto;" id="table">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" style="" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
			

		function fetchExpense(){
			var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth()+1; 
			var yyyy = today.getFullYear();
			if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;
} 
				today = yyyy+'-'+mm+'-'+dd;
			$.ajax({
				method : 'POST',
				url : 'php_action/fetchExpense.php',
				data :{date : today},
				success : function(data){
					$('#expense').html(data);
				}



			});



		}
		fetchExpense();

		$(document).on('submit' , '#pSummaryForm' , function(e){
			e.preventDefault();
			$.ajax({
			method : "POST",
			url : "php_action/purchaseSummary.php",
			data : $(this).serialize(),
			success :function(data){
				$("#mycon").html(data).slideDown();

			}


		});



		});
		
		$(document).on('click' , '#close' , function(e){
			e.preventDefault();
				console.log('close');
				$("#mycon").slideUp("slow");

		});



			function fetch_data()   ////fetching data
      {  
           $.ajax({  
                url:"php_action/fetchingDailyRate.php",  
                 method:"POST",  
          			 success:function(data)
          			 {  
                     $('#daily_rate').html(data);  
      					

                	 }

            });  

          
       } 

      	fetch_data(); ///calling fetch func
      	
    	


      	function fetchAllRate(){
      		$.ajax({
      			url : "php_action/allRates.php",
      			method : "POST",
      			success : function(data){

      				$('#table').html(data);

      				$('#dailyTable').DataTable();
      			}


      		});


      	}
      	//fetchAllRate();
      	$(document).on('click' , '#prev' , function(){

      		fetchAllRate();		

      	});

		///for inserting rates
		$(document).on('submit','#dailyRate',function(e){
			e.preventDefault();
			$.ajax({
				method : "POST",
				url : "php_action/dailyRate.php",
				data :$(this).serialize(),
				success : function(data){
						fetch_data();
					$('#dailyRate')[0].reset();
					//$('#msg').html(data);
					alert(data);
					//setInterval(function(){
	        			// $('#msg').html('');

	       				//  }, 5000);	

				}



			});	


		});



	});
	
</script>

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>




<?php require_once 'includes/footer.php'; ?>