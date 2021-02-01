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
$pages ='user/index';
?>
<?php include('../header.php'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
          <h3 class="col-md-6 text-left">
            <span class="text-left">Users List</span>

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
            <a href="add.php" class="btn btn-primary btn-md"><i class="fa fa-plus-circle"></i> Add User</a>
          </div>
          <div class="box-body">
            <table id="table1" class="table table-bordered">
              <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Gender</th>
                  <th>Type</th>
                  <th>Phone</th>
                  <th>Date Created</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>
                  <?php 
                    $sql = "SELECT id,firstname,lastname,gender,type,phone,timestamp FROM tbl_user ORDER BY timestamp ASC";
                    $qry = $connection->prepare($sql);
                    $qry->execute();
                    $qry->bind_result($id,$dbf,$dbl,$dbg,$dbt,$dbp, $dbtimestamp);
                    $qry->store_result();
                    while($qry->fetch ()) {
                      echo"<tr>";
                      echo"<td>";
                      echo $dbf;
                      echo"</td>";
                      echo"<td>";
                      echo $dbl;
                      echo"</td>";
                      echo"<td>";
                      echo $dbg;
                      echo"</td>";
                      echo"<td>";
                      echo $dbt;
                      echo"</td>";
                      echo"<td>";
                      echo $dbp;
                      echo"</td>";
                      echo"<td>";
                      echo $dbtimestamp;
                      echo"</td>";
                      echo"<td>";
                      echo '<a class="btn btn-info btn-sm" href="edit.php?id='.$id.'"><i class="fa fa-edit"></i></a>
                        <a href="delete.php?id='.$id.'" ';?>onclick="return confirm('Are you sure?')"<?php echo 'class="btn btn-danger btn-sm" ><i class="fa fa-remove"></i></a>';
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
