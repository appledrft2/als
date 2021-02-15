<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <form action="#" method="post" enctype="multipart/form-data">
  upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="import" name="btnImport">
</form>
</body>
</html>

<?php 
if(isset($_POST['btnImport'])){
	include('../../includes/autoload.php');
	include('PHPExcel/IOFactory.php');
	$html = "<table border='1>";
	$objPHPExcel = PHPExcel_IOFactory::load($_FILES["fileToUpload"]["name"]);
	foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$highestRow = $worksheet->getHighestRow();

		for ($row=2; $row <= $highestRow ; $row++) { 
			$html .= "<tr>";
			$firstname = $worksheet->getCellByColumnAndRow(1,$row)->getValue();
			$middlename = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
			$lastname = $worksheet->getCellByColumnAndRow(3,$row)->getValue();
			$html .= "<td>".$firstname."</td>";
			$html .= "<td>".$middlename."</td>";
			$html .= "<td>".$lastname."</td>";
			$html .= "</tr>";
		}

	}
	$html .= "</table>";
	echo $html;
}

?>