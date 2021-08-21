<?php 

	include 'db_connect.php';

		$sql = "SELECT * FROM `provider` ";
			$output = '';
			$output .= '<option value="-1" disabled selected hidden> Choose Provider </option> '; 
					$result = $connect->query($sql);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
							    $output  .= "<option value=".$row['id'].">".$row['name']."</option>";
							}
						}

		$output .= '<option value="0">none</option>';
		echo $output;

 ?>