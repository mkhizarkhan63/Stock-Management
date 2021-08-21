<?php 
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php'; 


?>
    <div class="row text-center">
       <h1> Daily Expenses </h1>
        <div class="col-md-offset-3 col-md-6">
    <div class="well clearfix">
        <form method="POST" id="Expenses">
        <div id="czContainer">
            <div id="first">
                <div class="recordset">
                    <div class="fieldRow clearfix">
                        
                        <div class="col-md-5">
                            <div id="div_id_stock_1_service" class="form-group">
                                <label for="id_stock_1_product" class="control-label  requiredField">
                                    Product<span class="asteriskField">*</span>
                                </label><div class="controls ">
                                            <input type="text" name="Product[]" id="id_stock_1_product" class="textinput form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="div_id_stock_1_quantity" class="form-group">
                                <label for="id_stock_1_quantity" class="control-label  requiredField">
                                    Price<span class="asteriskField">*</span>
                                </label><div class="controls "><input class="numberinput form-control" id="id_stock_1_quantity" name="Price[]"  step="" type="number" /> </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <input type="submit" class="btn btn-primary" id="mybtn" value="submit" name="submit">
        </form>
    </div>

</div>
</div>
    <script type="text/javascript">
        
        
        $(document).ready(function(){
            function fetchInput(){
                var PriceArr = [];
                $('input[name *="Price"]').each(function(){
                    if($(this).val()==''){

                    }else{
                        PriceArr.push($(this).val());
                    }
                });
                return PriceArr;

            }

            $("#czContainer").czMore();
             $(document).on('submit', '#Expenses' , function(e){
                e.preventDefault();
                var myArr=[];
                 e.preventDefault();
                 var isValild = false;
            $('input[name  *="Product"]').each(function(){

                if($(this).val() == ""){
                    
                }else{
                    isValild = true;
                    myArr.push($(this).val());
                }

               
                
            });
            if(isValild){
                var price = fetchInput();
                var product = myArr;
                
              $.ajax({
                    method : 'POST',
                    url : 'php_action/dailyExpenseController.php',
                    data : {Product : product ,Price : price},
                    success:function(data){
                        alert(data);
                    }

                 });

                $(this)[0].reset();
                
                  isValild = false;

            }else{
                 alert("Enter required Field which You have Selected");
            }
            
        });
                
                
                   

                 

   
          




           

        });
    </script>
    
    <script src="js/jquery.czMore-1.5.3.2.js"></script>

<?php require_once 'includes/footer.php'; ?>