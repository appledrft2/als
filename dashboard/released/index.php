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
            <span class="text-left">All Released Beneficiaries</span>

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
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <form method="POST" action="export.php">
              <div class="form-inline">
              <label>Date From :<i style="color:red"></i></label>
              <input type="date" class="form-control" name="dfrom" required>
              <label>To :<i style="color:red"></i></label>
              <input type="date" class="form-control" name="dto" required>
              <button type="submit" name="export" class="btn btn-primary btn-md"> Export to Excel</button>
            </div>
            </form>
          </div>
          <div class="box-body">
            
            <table id="table1" class="table table-bordered">
              <thead>
                <tr>
                
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Date Released</th>
                  <th>Contact Number</th>
                  <th>Assistance Type</th>
                  <th>Amount</th>

                  <th>Date Added</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>

                  <?php 
                    $sql = "SELECT b.id,b.firstname,b.middlename,b.lastname,b.purok,b.barangay,b.city,c.assistance_type,b.contact,b.status,c.timestamp,c.amount,b.release_date,c.id FROM tbl_beneficiary AS b INNER JOIN tbl_client AS c ON c.id = b.client_id WHERE b.status = 'Released' ORDER BY timestamp ASC";
                    $qry = $connection->prepare($sql);
                    $qry->execute();
                    $qry->bind_result($id,$dbf,$dbm,$dbl,$dbpr,$dbb,$dbc,$dbat,$dbcontact,$dbs, $dbtimestamp,$dba,$dbrd,$dbc_id);
                    $qry->store_result();
                    while($qry->fetch ()) {
                      echo"<tr>";
                     
                      echo"<td>";
                      echo $dbf." ".$dbm." ".$dbl;
                      echo"</td>";
                      echo"<td>";
                      echo "Prk.".$dbpr.", Brgy.".$dbb.", ".$dbc." City";
                      echo"</td>";
                      echo"<td>";
                      echo $dbrd;
                      echo"</td>";
                      echo"<td>";
                      echo $dbcontact;
                      echo"</td>";
                      echo"<td>";
                      echo $dbat;
                      echo"</td>";
                      echo"<td>";
                      echo $dba;
                      echo"</td>";
                      
                      echo"<td>";
                      echo $dbtimestamp;
                      echo"</td>";
                      echo"<td>";
                      echo '
                        <a href="delete.php?id='.$dbc_id.'" ';?>onclick="return confirm('Are you sure?')"<?php echo 'class="btn btn-danger btn-sm" ><i class="fa fa-remove"></i></a>';
                      echo"</td>";
                      echo"</tr>";
                    }

                  ?>
                </tbody>
            </table>
           
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


    $('.checkvar').on('change', function() {
      
      if ($('input[name="checkboxvar[]"]:checked').length > 0) {
          $('.redate').prop('disabled',false);
          $('.redate').prop('required',true);
          $('.btnm').prop('disabled',false);
      }else{
        $('.redate').prop('disabled',true);
        $('.redate').prop('required',false);
        $('.btnm').prop('disabled',true);
      }

    });
</script>

<?php 
if(isset($_POST['btnMark'])){

  if(isset($_POST['checkboxvar'])){

    print_r($_POST['checkboxvar']);
  }else{
    echo 'empty';
  }


}


 ?>