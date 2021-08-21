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
          $id = $_GET['id'];
      $sql = "SELECT DISTINCT p.id, p.rate ,p.weight , p.crates_quan , p.date , acc.name , acc.acc_num , acc.place ,acc.contact ,acc.id  as accounts , cd.credit ,cd.id as cd_id ,cd.status FROM `sales` as p INNER JOIN accounts as acc on p.acc_id = acc.id INNER JOIN credit as cd on cd.sales_id = p.id where p.id = '$id'  ORDER BY date DESC ";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();


     ?>
          <div class="row mt-3">
            <div class="col-md-6 " style="">
              <p class="" style=""><strong>Name: </strong> <?= $row['name'] ?></p>
               <p class="" style=""><strong>Contact: </strong> <?= $row['contact'] ?></p>
              
            </div>
            <div class="col-md-6">
              <p class="text-right" style=""><strong>Date:</strong> <?= $row['date'] ?></p>

               <p class="text-right" style=""><strong>Place: </strong><?= $row['place']?></p>
            </div>
          </div>
          <div class="row mt-5">
            <div class="col-md-12 well invoice-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Weight</th>
                    <th>Crates</th>
                    <th>Rates</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $row['weight'] ?> KGs</td>
                    <td><?= $row['crates_quan'] ?></td>
                    <td><?= $row['rate']?></td>
                    <td><?= $row['credit'] ?> Rs</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><strong>Total</strong></td>
                    <td><strong><?= $row['credit'] ?> Rs</strong></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
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
 