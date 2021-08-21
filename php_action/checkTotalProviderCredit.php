<!-- checkTotalProviderCredit -->


<?php 

	include 'db_connect.php';
	$prov = $_POST['provider1'];
	$output = '';
	if($prov != 0){
	$sql = "SELECT   SUM(s.weight) as weight , SUM(s.crates_quan) as crates , SUM(cd.credit) as credit FROM `accounts` as acc INNER JOIN  provider as pr ON pr.id = acc.prov_under_id INNER JOIN sales as s ON s.acc_id = acc.id INNER JOIN cred_debit as cd ON s.id = cd.p_id where cd.status  = '0' AND pr.id = '$prov'";
	
	$res = $connect->query($sql);
	if ($res->num_rows > 0) {
	  
	  $row = $res->fetch_assoc();

	  $output .= 'Weight: <span class="text-danger">' . $row['weight'] . ' KG</span>  ' .' Crates: <span class="text-danger">'. $row['crates'] . '</span>  ' .' Credit: <span class="text-danger">'. $row['credit']. " Rs</span>";
		    
		
		
	}


}
else{

$output .= '';

}
echo $output;
 ?>
