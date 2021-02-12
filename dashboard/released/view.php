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
$sql = "SELECT id,release_date,assistance_type,total FROM tbl_released WHERE id = ?";
$qry = $connection->prepare($sql);
$qry->bind_param('i',$_GET['id']);
$qry->execute();
$qry->bind_result($rid,$dbrdate,$dbastype,$dbt);
$qry->store_result();
$qry->fetch ();

$pages ='released/index';
?>
<?php include('../header.php'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
          <h3 class="col-md-6 text-left">
            <span class="text-left">View Released Beneficiaries</span>

          </h3>
          <h3 class="col-md-6 text-right">
            <span class="text-right"><i class="fa fa-calendar"></i> <?php echo date('D, M. d Y') ?></span>
          </h3>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">
    <?php 
      if(isset($_GET['status'])){
        if($_GET['status'] == 'created'){
          echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-check"></i>  Record Successfully Added.</p>
                   
                  </div>';
        }if($_GET['status'] == 'updated'){
          echo '<div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-info"></i>  Record Successfully Updated.</p>
                   
                  </div>';
        }if($_GET['status'] == 'deleted'){
          echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-remove"></i>  Record Successfully Deleted.</p>
                   
                  </div>';
        }
      }
    ?>
    <div class="row" >
      <div class="col-md-12">
        <div class="box" >
        	<div id="div_print">
          <div class="box-header">
            <div class="row">
            	<div class="col-md-6">
            		<label>Release Date:</label>
            		<input type="text" class="form-control" value="<?php echo $dbrdate; ?>" name="redate" >
            		<label>Assistance Type:</label>
            		<input type="text" class="form-control" value="<?php echo $dbastype; ?>" name="astype" >
            	</div>
            	
            	
            </div>
          </div>
          <div class="box-body">
            
            <div class="row">
            	<div class="col-md-12">
            		<table class="table table-responsive table-bordered">
            			<thead>
            				<tr>
            					<th></th>
            					<th>Name</th>
            					<th>Address</th>
            					<th>Assistance Type</th>
            					<th>Amount</th>
            				</tr>
            			</thead>
            			<tbody>
            				<?php 
            				$cnt = 0;
		                    $sql = "SELECT rb.id,b.firstname,b.middlename,b.lastname,b.purok,b.barangay,b.city,c.assistance_type,c.amount FROM tbl_released_beneficiary AS rb INNER JOIN tbl_beneficiary AS b ON b.id = rb.beneficiary_id INNER JOIN tbl_client AS c ON c.id = b.client_id WHERE released_id = ?";
		                    $qry = $connection->prepare($sql);
		                    $qry->bind_param('i',$_GET['id']);
		                    $qry->execute();
		                    $qry->bind_result($id,$dbf,$dbm,$dbl,$dbp,$dbbar,$dbc,$dbcatype,$dbcamount);
		                    $qry->store_result();
		                    while($qry->fetch ()) {
		                    	$cnt++;
		                    	echo "<tr>";
		                    	echo "<td>";
		                    	echo $cnt;
		                    	echo "</td>";
		                    	echo "<td>";
		                    	echo $dbf." ".$dbm[0].". ".$dbl;
		                    	echo "</td>";
		                    	echo "<td>";
		                    	echo "Prk.".$dbp.", Brgy.".$dbbar.", ".$dbc." City";
		                    	echo "</td>";
		                    	echo "<td>";
		                    	echo $dbcatype;
		                    	echo "</td>";
		                    	echo "<td>";
		                    	echo number_format($dbcamount,2);
		                    	echo "</td>";
		                    	echo "<tr>";

		                    }
		                    ?>
		                    <tr>
		                    	<td></td>
		                    	<td></td>
		                    	<td></td>
		                    	<td></td>
		                    	<td><b>Total: <?php echo number_format($dbt,2); ?></b></td>
		                    </tr>
            			</tbody>
            		</table>
            	</div>
            </div>
           
          </div>
          </div>
          <div class="box-footer" >
          	<div class="pull-right">
          		<a href="<?php echo $baseurl; ?>dashboard/released" class="btn btn-default " > Go Back</a>
          		<button class="btn btn-primary" onClick="printdiv('div_print');"><i class="fa fa-print"></i> Print</button>
          	</div>
          </div>
        </div>
      </div>
    </div>


      
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2020-2021 <a href="#">ALS - Assistance Liquidation System w/ SMS notifier</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<?php include('footer.php') ?>
<!-- iCheck 1.0.1 -->
<script src="<?php echo $baseurl ?>template/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
  //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    });

    function printdiv(printpage)
    {
    var headstr = "<html><head><title></title></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;
    }

    

    
</script>
