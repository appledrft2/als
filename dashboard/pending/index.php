<?php 
session_start();
include('../../includes/autoload.php');
include('itextmo.php');
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
$pages ='pending/index';
?>
<?php include('../header.php'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
          <h3 class="col-md-6 text-left">
            <span class="text-left">All Pending Beneficiaries</span>

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
        }if($_GET['status'] == 'smsnotified'){
          echo '<div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-info"></i>  Beneficaries Successfully SMS Notified.</p>
                   
                  </div>';
        }
      }
    ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          
          <div class="box-body">
            <form method="POST" action="#" >
            <div class="form-inline" <?php if($_SESSION['dbtype'] == 'Encoder'){ echo 'style="display:none;"';} ?>>
              <label>Release date <i style="color:red"></i>:</label>
              <input type="date" name="rdate" class="redate form-control" disabled>
              <label>Assistance Type <i style="color:red"></i>:</label>
              <select class="form-control astype" name="astype" disabled>
                <option selected disabled value="">Select Type</option>
                <option>General</option><option>Educational Support</option><option>Medical Needs</option><option>Burial Needs</option>
                <option>Transportation Needs</option><option>Food Subsidy</option><option>Non-Food Items</option>
              </select>
              <button type="submit" name="btnMark" class="btn btn-primary btn-md btnm" disabled><i class="fa fa-calendar"></i>&nbsp;Add to Released</button>
              <button type="submit" name="btnsendSms" class="btn btn-primary btn-md btnm"  disabled><i class="fa fa-envelope"></i>&nbsp;&nbsp;Send SMS</button>
              
            </div>
            <br><br>
            <table id="table1" class="table table-bordered">
              <thead>
                <tr>
                  <th width="1%">#</th>
                  <th>Fullname</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Assistance Type</th>
                  <th>Amount</th>
                  <th>SMS notified</th>
                  <th>Date Added</th>
                  <th>Action</th>
                </tr>
              </thead>
               <tbody>

                  <?php 
                    $sql = "SELECT b.id,b.firstname,b.middlename,b.lastname,b.purok,b.barangay,b.city,c.assistance_type,b.contact,b.status,c.timestamp,c.amount,c.id,b.smsnotify FROM tbl_beneficiary AS b INNER JOIN tbl_client AS c ON c.id = b.client_id WHERE b.status = 'Pending' ORDER BY timestamp ASC";
                    $qry = $connection->prepare($sql);
                    $qry->execute();
                    $qry->bind_result($id,$dbf,$dbm,$dbl,$dbpr,$dbb,$dbc,$dbat,$dbcontact,$dbs, $dbtimestamp,$dba,$dbc_id,$dbcsms);
                    $qry->store_result();
                    while($qry->fetch ()){
                      echo"<tr>";
                      echo"<td><center>";
                      if($_SESSION['dbtype'] != 'Encoder'){ 
                      echo "<input type='checkbox' name='checkboxvar[]' class='checkvar' value='".$id."'>";
                      }
                      echo"</center></td>";
                      echo"<td>";
                      echo $dbf." ".$dbm." ".$dbl;
                      echo"</td>";
                      echo"<td>";
                      echo "Prk.".$dbpr.", Brgy.".$dbb.", ".$dbc." City";
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
                      if($dbcsms == ''){
                        echo 'No';
                      }else{
                        echo $dbcsms;
                      }
                      echo"</td>";

                      echo"<td>";
                      echo $dbtimestamp;
                      echo"</td>";
                      echo"<td>";
                      if($_SESSION['dbtype'] != 'Encoder'){ 
                      echo '<a class="btn btn-info btn-sm" href="edit.php?id='.$id.'"><i class="fa fa-edit"></i></a>
                        <a href="delete.php?id='.$dbc_id.'" ';?>onclick="return confirm('Are you sure?')"<?php echo 'class="btn btn-danger btn-sm" ><i class="fa fa-remove"></i></a>';
                      }
                      echo"</td>";
                      echo"</tr>";
                    }

                  ?>
                </tbody>
            </table>
            
            </form>
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
          $('.astype').prop('disabled',false);
          $('.astype').prop('required',true);
          $('.btnm').prop('disabled',false);
      }else{
        $('.redate').prop('disabled',true);
        $('.redate').prop('required',false);
         $('.astype').prop('disabled',true);
        $('.astype').prop('required',false);

        $('.btnm').prop('disabled',true);
      }

    });
</script>

<?php 
if(isset($_POST['btnMark'])){

  if(isset($_POST['checkboxvar'])){
      $st = 'Released';
      $total = 0;
      $length = count($_POST['checkboxvar']);

      $sql = "INSERT INTO tbl_released(release_date,assistance_type) VALUES(?,?)";
      $qry = $connection->prepare($sql);
      $qry->bind_param("ss",$_POST['rdate'],$_POST['astype']);

      if($qry->execute()){

        $released_id = mysqli_insert_id($connection);

        for($i = 0;$i < $length;$i++){

          $sql = "INSERT INTO tbl_released_beneficiary(released_id,beneficiary_id) VALUES(?,?)";
          $qry = $connection->prepare($sql);
          $qry->bind_param("ii",$released_id,$_POST['checkboxvar'][$i]);
          if($qry->execute()){

            $sql = "SELECT b.contact,c.amount FROM tbl_beneficiary AS b INNER JOIN tbl_client as c ON b.client_id = c.id WHERE b.id=?";
            $qry = $connection->prepare($sql);
            $qry->bind_param("i",$_POST['checkboxvar'][$i]);
            $qry->execute();
            $qry->bind_result($db_contact,$dbamount);
            $qry->store_result();
            $qry->fetch();

            $total = $total + $dbamount;

            $sql = "UPDATE tbl_released SET total=? WHERE id=?";
            $qry = $connection->prepare($sql);
            $qry->bind_param("si",$total,$released_id);

            if($qry->execute()) {

              $sql = "UPDATE tbl_beneficiary SET release_date=?,status=? WHERE id=?";
              $qry = $connection->prepare($sql);
              $qry->bind_param("ssi",$_POST['rdate'],$st,$_POST['checkboxvar'][$i]);

              $qry->execute();

            }

          }
             
        }
        echo '<meta http-equiv="refresh" content="0; URL=index.php?status=released">';
      }else{
        echo '<meta http-equiv="refresh" content="0; URL=add.php?status=error">';
      }
      
  }
}

if(isset($_POST['btnsendSms'])){
  $smsyes = "Yes";
  $length = count($_POST['checkboxvar']);

  for($i = 0;$i < $length;$i++){

    $sql = "SELECT b.contact,c.amount FROM tbl_beneficiary AS b INNER JOIN tbl_client as c ON b.client_id = c.id WHERE b.id=?";
    $qry = $connection->prepare($sql);
    $qry->bind_param("i",$_POST['checkboxvar'][$i]);
    $qry->execute();
    $qry->bind_result($db_contact,$dbamount);
    $qry->store_result();
    $qry->fetch();

    $result = itexmo($db_contact,"We are pleased to inform you that we will be releasing you at ".$_POST['rdate'],"TR-ANRAD195024_GQH7E", "5f4hvl)l&1");
    if ($result == ""){
    echo "iTexMo: No response from server!!!
    Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
    Please CONTACT US for help. ";  
    }else if ($result == 0){
      echo '<meta http-equiv="refresh" content="0; URL=index.php?status=smsnotified">';
    }
    else{ 
    echo "Error Num ". $result . " was encountered!";
    }

    $sql = "UPDATE tbl_beneficiary SET smsnotify=? WHERE id=?";
    $qry = $connection->prepare($sql);
    $qry->bind_param("si",$smsyes,$_POST['checkboxvar'][$i]);

    $qry->execute();


  }


}
 ?>
