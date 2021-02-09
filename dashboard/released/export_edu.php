<?php 
session_start();
include('../../includes/autoload.php');
if(isset($_POST['btnLogout'])){
  session_unset();
  header('location:'.$baseurl.'');
}
if(isset($_SESSION['dbu'])){ 
  if($_SESSION['dbc'] != false){
      header("location:".$baseurl."dashboard");
  }
}else{
  header('location:'.$baseurl.'');
}

if(isset($_POST['export'])){
	$output = '';
	$sql = "SELECT b.release_date,c.city,c.barangay,c.purok,c.lastname,c.firstname,c.middlename,c.extension,c.gender,c.dob,c.assistance_type,c.client_cat,c.contact,c.work,c.salary,c.relation_to_beni,b.lastname,b.firstname,b.middlename,b.extension,b.gender,b.dob,b.contact,b.city,b.barangay,b.purok,c.id_presented,c.ben_cat FROM tbl_beneficiary AS b INNER JOIN tbl_client AS c ON c.id = b.client_id WHERE b.status = 'Released' AND c.assistance_type = 'Educational Support' AND b.release_date BETWEEN ? AND ? ";
	$qry = $connection->prepare($sql);
	$qry->bind_param("ss",$_POST['dfrom'],$_POST['dto']);
	$qry->execute();
	$qry->bind_result($dbbrd,$dbccity,$dbcb,$dbcp,$dbcl,$dbcf,$dbcm,$dbce,$dbcg,$dbcdob,$dbcat,$dbcc,$dbcconttact,$dbcw,$dbcs,$dbcrelation,$dbbf,$dbbm,$dbbl,$dbbe,$dbbg,$dbbdob,$dbbcontact,$dbbcity,$dbbbarangay,$dbbp,$dbcip,$dbcbc);
	$qry->store_result();

	$output .= '<table class="table" border="1">
				<tr>
				<th>Release Date</th>
				<th>City/Municipality</th>
				<th>Barangay</th>
				<th>No./St./Purok.</th>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Extension</th>
				<th>Gender</th>
				<th>Date of Birth</th>
				<th>Age</th>
				<th>Type of Assistance</th>
				<th>Client Category</th>
				<th>Contact Number (Client)</th>
				<th>Occupation</th>
				<th>Salary</th>
				<th>Purpose</th>
				<th>Relation to Beneficiary</th>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Extension</th>
				<th>Gender</th>
				<th>Date of Birth</th>
				<th>Age</th>
				<th>Contact Number (Bene)</th>
				<th>Purok</th>
				<th>Barangay</th>
				<th>City</th>
				<th>Beneficiary Category</th>
				<th>ID Presented</th>
				</tr>';
	while($qry->fetch ()) {
		//get age
		 $date = new DateTime($dbcdob);
		 $now = new DateTime();
		 $interval = $now->diff($date);
		 $dbcage = $interval->y;

		 $date = new DateTime($dbbdob);
		 $now = new DateTime();
		 $interval = $now->diff($date);
		 $dbbage = $interval->y;

		if($dbcrelation == 'Here in Client'){
			$output .= '<tr>
					<td>'.$dbbrd.'</td>
					<td>'.$dbccity.'</td>
					<td>'.$dbcb.'</td>
					<td>'.$dbcp.'</td>
					<td>'.$dbcl.'</td>
					<td>'.$dbcf.'</td>
					<td>'.$dbcm.'</td>
					<td>'.$dbce.'</td>
					<td>'.$dbcg.'</td>
					<td>'.$dbcdob.'</td>
					<td>'.$dbcage.'</td>
					<td>'.$dbcat.'</td>
					<td>'.$dbcc.'</td>
					<td>'.$dbcconttact.'</td>
					<td>'.$dbcw.'</td>
					<td>'.$dbcs.'</td>
					<td>purpose</td>
					<td>'.$dbcrelation.'</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>'.$dbcbc.'</td>
					<td>'.$dbcip.'</td>
					</tr>';
		}else{
			$output .= '<tr>
					<td>'.$dbbrd.'</td>
					<td>'.$dbccity.'</td>
					<td>'.$dbcb.'</td>
					<td>'.$dbcp.'</td>
					<td>'.$dbcl.'</td>
					<td>'.$dbcf.'</td>
					<td>'.$dbcm.'</td>
					<td>'.$dbce.'</td>
					<td>'.$dbcg.'</td>
					<td>'.$dbcdob.'</td>
					<td>'.$dbcage.'</td>
					<td>'.$dbcat.'</td>
					<td>'.$dbcc.'</td>
					<td>'.$dbcconttact.'</td>
					<td>'.$dbcw.'</td>
					<td>'.$dbcs.'</td>
					<td>purpose</td>
					<td>'.$dbcrelation.'</td>
					<td>'.$dbbl.'</td>
					<td>'.$dbbf.'</td>
					<td>'.$dbbm.'</td>
					<td>'.$dbbe.'</td>
					<td>'.$dbbg.'</td>
					<td>'.$dbbdob.'</td>
					<td>'.$dbbage.'</td>
					<td>'.$dbbcontact.'</td>
					<td>'.$dbbp.'</td>
					<td>'.$dbbbarangay.'</td>
					<td>'.$dbbcity.'</td>
					<td>'.$dbcbc.'</td>
					<td>'.$dbcip.'</td>
					</tr>';
		}

	}
	$output .= '</table>';

  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=released-from-'.$_POST['dfrom'].'-to-'.$_POST['dto'].'.xls');
  echo $output;

}

?>