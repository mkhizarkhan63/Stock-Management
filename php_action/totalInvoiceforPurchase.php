<?php include 'db_connect.php'; ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Chicken Management</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.0/html2pdf.bundle.min.js" integrity="sha512-YLG3N5dufxTTEyEgDIKb3IMDTz/NsWiGH6+6OvzrJBu/XZNRiZb9UxuNoMn8RdTtuKgpjtzTeWm/ITkZkj2i3Q==" crossorigin="anonymous"></script>
    <style>
      .invoice {
        margin-bottom: 15px;
        border-top: 1px solid;
        border-bottom: 1px solid;
        background: lightblue;
        padding: 0 17px;
      }
      .border {
        border: 1px solid #e5e5e5;
      }
    </style>
  </head>

  <body>


    <div class="container" id="invoice">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 border">
          <div class="row">
            <div class="col-md-12 invoice text-center text-primary">
              <h2>Invoice</h2>
            </div>
          </div>
          <div class="row">
          	<div class="col-md-12 text-center " style="margin-top: 0"><img src="img/invoiceLogo.png" width="150" height="150"></div>
            
          </div>

          <?php 
          $total = 0;
          $id = $_GET['id'];
          $s = $_GET['s'];
          $e = $_GET['e'];
          $sql1 = "SELECT * from `accounts` WHERE id = '$id'";
          $res = $connect->query($sql1);
          $row1 = $res->fetch_assoc();
          ?>
           <div class="row mt-3">
            <div class="col-md-6 " style="">
              <p class="" style=""><strong>Name: </strong> <?= $row1['name'] ?></p>
               <p class="" style=""><strong>Contact: </strong> <?= $row1['contact'] ?></p>
              
            </div>
            <div class="col-md-6">
             

               <p class="text-right" style=""><strong>Place: </strong><?= $row1['place']?></p>
            </div>
          </div>

          <?php


      $sql = "SELECT * FROM `debit` INNER JOIN purchase ON purchase.id = debit.purchase_id INNER JOIN accounts ON accounts.id = purchase.acc_id WHERE accounts.id = '$id' AND purchase.date between '$s' and '$e' order by purchase.date ASC ";
       
        $result = $connect->query($sql) or die($connect->error);

        
        if ($result->num_rows > 0) {

        	?>
        	<table class="table"><thead><tr><td>Date</td><td>Weight</td><td>Crates</td><td>Rate</td><td>Description</td><td>Amount</td></tr></thead><tbody>
        	<?php
        	while($row = $result->fetch_assoc()){
        		$total += $row['debit'];
        		?>
        		<tr><td><?= $row['date']?></td><td><?= $row['weight']?></td><td><?= $row['crates_quan']?></td><td><?= $row['rate']?></td><td><?= $row['description']?></td><td><?=  $row['debit']?></td></tr>

        <?php		
        	}?>
        	<tr><td></td><td></td><td></td><td></td><td></td><td><strong>Total: <?= $total?></strong></td></tr>
        </tbody></table>
        	<?php
        }
        ?>
         
          <div class="row">
            <div class="col-md-6">
               <b>M.sharif: </b>  03332606501  <br>  
                <b>M.tariq: </b> 03342614463<br>
                <b>M.shoaib: </b> 03453601265
                  
         

            </div>
            <div class="col-md-6 text-right mt-5 mb-2">Signature</div>
          </div>
        </div>
      </div></div>
      </div>
    </div>
    <div class="container">
      <div class="row ">
        <div class="col-md-12 text-center mb-4">
          <button class="btn btn-warning" id="downloadPdf">
            Generate Invoice
          </button>
        </div>
      </div>
    </div>
     <script>
    document
      .getElementById("downloadPdf")
      .addEventListener("click", function download() {
        const element = document.getElementById("invoice");
        html2pdf()
          .from(element)
          .save();
      });
  </script>
  </body>
