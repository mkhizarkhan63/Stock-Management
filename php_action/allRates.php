<?php 
include 'db_connect.php';
$count = 1;
$sql = "SELECT * FROM `daily_rate` ";
$query = $connect->query($sql);
$output = '

<table class="table" id="dailyTable" style="" >
  		 		  <thead style="">
  		 		    <tr>
  		 		      <th scope="col" style="">#</th>
  		 		      <th scope="col" style="">Last Rates</th>
  		 		      <th scope="col" style="">Dates</th>
  		 		      
  		 		    </tr>
  		 		  </thead>

  		 		  <tbody style="" >';
while ($row = $query -> fetch_array(MYSQLI_NUM)) {
  $output .= 
  		 '    
        
  		 		    <tr>
  		 		      <td >'.$count.'</td>
  		 		      <td>'.$row['1'].'</td>
  		 		      <td>'.$row['2'].'</td>
  		 		      
  		 		    </tr>
              
  		 		  
  		 		  	';

  		 		++$count;
}

$output .= '</tbody>
  		 		</table>';
  echo $output;



 ?>