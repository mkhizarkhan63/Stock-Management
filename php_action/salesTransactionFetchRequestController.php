
<?php 
	include 'db_connect.php';
	$id = $_POST['id'];
	$output = '';
	$sql = "SELECT s.id ,s.weight ,s.details ,s.rate , s.date, s.crates_quan , cd.credit FROM `sales` as s INNER JOIN credit as cd ON cd.sales_id = s.id WHERE s.id = '$id'";

	$result = $connect->query($sql);
	if ($result->num_rows > 0) {
		
	
	$row = $result->fetch_assoc();

	$output .= '
	<input type="hidden" id="hidden" name="hidden" value="'.$row['id'].'" />
	<div class="form-group">
    		<label for="exampleInputEmail1">Crates</label>
   			 <input type="number" class="form-control" name="crates" id="crate1" aria-describedby="" value="'.$row['crates_quan'].'" placeholder="">
   		</div>
   		<div class="form-group">
    		<label for="exampleInputEmail1">Rates</label>
   			 <input type="number" class="form-control" name="rates" id="rate1" aria-describedby="" value="'.$row['rate'].'" placeholder="">
   		</div>
   		<div class="form-group">
    		<label for="exampleInputEmail1">Weight</label>
   			 <input type="text" class="form-control" name="weight" id="weight1" aria-describedby="" value="'.$row['weight'].'" placeholder="">
   		</div>
   		<div class="form-group">
    		<label for="exampleInputEmail1">Total</label>
   			 <input type="text" class="form-control" name="credit" id="credit1" aria-describedby="" value="'.$row['credit'].'" placeholder="">
   		</div>
      <div class="form-group">
        <label for="">Description</label>
        <textarea name="details" class="form-control">'.$row['details'].'</textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Date</label>
         <input type="date" class="form-control" name="date" id="date1" aria-describedby="" value="'.$row['date'].'" placeholder="">
      </div>
   		<div class="form-group">
   		<label for="exampleInputEmail1">Status</label>
   			<select class="form-control" name="status">
   				<option value="0">Unpaid</option>
   				<option value="1">Paid</option>
   				
   			</select>
   			
   		</div>';
   		}
   		echo $output;



 ?>