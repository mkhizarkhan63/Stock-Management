<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Chicken Management </title>
    <link rel="stylesheet" type="text/css" href="custom/picker/dist/picker.min.css">
  
  
  
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  

	<!-- DataTables -->
 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  
  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  

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
<body style=" ">



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