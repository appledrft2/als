<?php 
session_start();
include('../../includes/autoload.php');
if(isset($_SESSION['dbu'])){ 
  if($_SESSION['dbc'] != false){
      header("location:".$baseurl."dashboard");
  }else{
  	if(isset($_GET['id'])){
  		$sql = "DELETE FROM tbl_beneficiary WHERE client_id=?";
  		$qry = $connection->prepare ($sql);
  		$qry->bind_param("i",$_GET['id']);
  		if($qry->execute()){

  			$sql = "DELETE FROM tbl_family_info WHERE client_id=?";
        $qry = $connection->prepare ($sql);
        $qry->bind_param("i",$_GET['id']);
        if($qry->execute()){

          $sql = "DELETE FROM tbl_client WHERE id=?";
          $qry = $connection->prepare ($sql);
          $qry->bind_param("i",$_GET['id']);
          if($qry->execute()){
            header('location:index.php?status=deleted');
          }
          
        }
  		}
  	}
  }
}else{
  header('location:'.$baseurl.'');
} 


?>