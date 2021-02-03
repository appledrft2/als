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
$pages ='intake/index';
?>
<?php include('../header.php'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
          <h3 class="col-md-6 text-left">
            <span class="text-left">General Intake Sheet</span>

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
            
          </div>
          <div class="box-body">
            <form id="form1" method="POST" action="#">
            <div class="row">
              <div class="col-md-6">
                <label>Lastname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="clastname" required>
                <label>Firstname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cfirstname" required>
                <label>Middlename <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cmiddlename" required>
                <label>Extension (Jr., Sr. etc.)<i style="color:red"></i></label>
                <input type="text" class="form-control" name="cextension">
                
                <label>Gender <i style="color:red">*</i></label>
                <select class="form-control" name="cgender" required>
                  <option selected disabled value="">Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <label>Contact Number <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="ccontact" required>
                <label>Date of birth <i style="color:red">*</i></label>
                <input type="date" class="form-control" name="cdob" required>
              </div>
              <div class="col-md-6">
                <label>Civil Status <i style="color:red">*</i></label>
                <select class="form-control" name="ccivil_status" required>
                  <option selected disabled value="">Select Status</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
                 <label>Relationship to Beneficiary <i style="color:red">*</i></label>
                <select class="form-control" name="crelation" required>
                  <option selected disabled value="">Select Relation</option>
                  <option>Grand Mother</option>
                  <option>Grand Father</option>
                  <option>Mother</option>
                  <option>Father</option>
                  <option>Aunt</option>
                  <option>Uncle</option>
                  <option>Sister</option>
                  <option>Brother</option>
                  <option>Niece</option>
                  <option>Live in Partner</option>
                  <option>Mother in Law</option>
                  <option>Father in Law</option>
                  <option>Relative</option>
                </select>
                
                <label>ID Presented <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cid_presented" required>
                <hr>
                <label>Address <i style="color:red"></i></label>
                <hr>
                <label>Purok <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cpurok" required>
                <label>Barangay <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cbarangay" required>
                <label>City/Municipality <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="ccity" required>
              </div>
            </div>
            <h4><b>IMPORMASYON UKOL SA BENEPISYARYO</b> (Beneficiary's Identifying Information)</h4>
            <div class="row">
              <div class="col-md-6">
                <label>Lastname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="blastname" required>
                <label>Firstname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bfirstname" required>
                <label>Middlename <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bmiddlename" required>
                <label>Extension (Jr., Sr. etc.) <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bextension" required>
                <label>Gender <i style="color:red">*</i></label>
                <select class="form-control" name="bgender" required>
                  <option selected disabled value="">Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <label>Contact Number <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bcontact" required>
                <label>Date of birth <i style="color:red">*</i></label>
                <input type="date" class="form-control" name="bdob" required>
              </div>
              <div class="col-md-6">
                <label>Civil Status <i style="color:red">*</i></label>
                <select class="form-control" name="bcivil_status" required>
                  <option selected disabled value="">Select Status</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
               
                <hr>
                <label>Address <i style="color:red"></i></label>
                <hr>
                <label>Purok <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bpurok" required>
                <label>Barangay <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bbarangay" required>
                <label>City/Municipality <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bcity" required>
              </div>
            </div>
            <h4><b>IMPORMASYON NG PAMILYA</b> (Family Information)</h4>
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Middlename</th>
                      <th>Gender</th>
                      <th>Date of Birth</th>
                      <th>Relation</th>
                      <th>Occupation</th>
                      <th>Monthly Income</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="tbl_fam">
                    <tr>
                      <td><input type="text" class="form-control" name="ffirstname[]" required></td>
                      <td><input type="text" class="form-control" name="flastname[]" required></td>
                      <td><input type="text" class="form-control" name="fmiddlename[]" required></td>
                      <td>
                        <select class="form-control" name="fgender[]" required>
                          <option selected disabled value="">Select Gender</option>
                          <option>Male</option>
                          <option>Female</option>
                        </select>
                      </td>
                      <td><input type="date" class="form-control" name="fdob[]" required></td>
                      <td><input type="text" class="form-control" name="frelation[]" required></td>
                      <td><input type="text" class="form-control" name="foccupation[]" required></td>
                      <td><input type="text" class="form-control" name="fincome[]" required></td>
                      <td><button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-remove"></i></button></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="9"><button id="morefamily" type="button" class="pull-right btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i>&nbsp;Add more</button></td>
                    </tr>
                  </tfoot>
                </table>
                
              </div>
            </div>

            <div class="row">
              <div class=col-md-6>
                
                <label>Financial Assistance Type <i style="color:red">*</i></label>
                <select class="form-control" name="cassistance_type">
                  <option selected disabled value="">Select Type</option>
                  <option>Educational Support</option><option>Medical Needs</option><option>Burial Needs</option>
                  <option>Transportation Needs</option><option>Food Subsidy</option><option>Non-Food Items</option>
                </select>
                <label>Amount <i style="color:red">*</i></label>
                <input type="number" class="form-control" name="camount" required>
              </div>
              <div class=col-md-6>
                <label><b>CLIENTS CATEGORY</b></label>
                <select class="form-control" name="cclient_category">
                  <option selected disabled value="">Select Category</option>
                  <option>Children in Need of Special Protection</option>
                  <option>Youth in Need of Special Protection</option>
                  <option>Women in Especially Difficult Circumstances</option>
                  <option>Person with Disability</option>
                  <option>Senior Citizen</option>
                  <option>Family Head and Other Needy Adult</option>
                </select>
                <label><b>BENEFICIARYS CATEGORY</b></label>
                <select class="form-control" name="cben_category">
                  <option selected disabled value="">Select Category</option>
                  <option>Children in Need of Special Protection</option>
                  <option>Youth in Need of Special Protection</option>
                  <option>Women in Especially Difficult Circumstances</option>
                  <option>Person with Disability</option>
                  <option>Senior Citizen</option>
                  <option>Family Head and Other Needy Adult</option>
                </select>
              </div>
            </div>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <button name="btnSave" class="btn btn-primary" > Confirm Process</button>
              </form>
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
<script type="text/javascript">
  $('#morefamily').click(function(){
    $("#tbl_fam").append('<tr><tr>                      <td><input type="text" class="form-control" name="ffirstname[]" required></td>                      <td><input type="text" class="form-control" name="flastname[]" required></td>                      <td><input type="text" class="form-control" name="fmiddlename[]" required></td>                      <td>                        <select class="form-control" name="fgender[]" required>                          <option selected disabled value="">Select Gender</option>                          <option>Male</option>                          <option>Female</option>                        </select>                      </td>                      <td><input type="date" class="form-control" name="fdob[]" required></td>                      <td><input type="text" class="form-control" name="frelation[]" required></td>                      <td><input type="text" class="form-control" name="foccupation[]" required></td>                      <td><input type="text" class="form-control" name="fincome[]" required></td>                      <td><button class="delfam btn btn-danger btn-sm"><i class="fa fa-remove"></i></button></td></tr>');

  });
   $('#tbl_fam').on('click', '.delfam', function () { 
       $(this).closest('tr').remove();
  });
</script>
<?php 
if(isset($_POST['btnSave'])){

  $sql = "INSERT INTO tbl_client(firstname,middlename,lastname,extension,gender,contact,dob,civil_status,relation_to_beni,id_presented,purok,barangay,city,client_cat,ben_cat,assistance_type,amount) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
  $qry = $connection->prepare($sql);
  $qry->bind_param("ssssssssssssssssi",$_POST['cfirstname'],$_POST['cmiddlename'],$_POST['clastname'],$_POST['cextension'],$_POST['cgender'],$_POST['ccontact'],$_POST['cdob'],$_POST['ccivil_status'],$_POST['crelation'],$_POST['cid_presented'],$_POST['cpurok'],$_POST['cbarangay'],$_POST['ccity'],$_POST['cclient_category'],$_POST['cben_category'],$_POST['cassistance_type'],$_POST['camount']);

  if($qry->execute()) {
    $last_id = mysqli_insert_id($connection);
    echo 'SUCCESSS';
    echo $last_id;

    $sql = "INSERT INTO tbl_beneficiary(client_id,firstname,middlename,lastname,extension,gender,contact,dob,civil_status,purok,barangay,city,status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $qry = $connection->prepare($sql);
    $qry->bind_param('issssssssssss',$last_id,$_POST['bfirstname'],$_POST['bmiddlename'],$_POST['blastname'],$_POST['bextension'],$_POST['bgender'],$_POST['bcontact'],$_POST['bdob'],$_POST['bcivil_status'],$_POST['bpurok'],$_POST['bbarangay'],$_POST['bcity'],'Pending');

    if($qry->execute()) {
      echo 'SUCCESSS2';
      $fam_arr = count($_POST['ffirstname']);
      for($i = 0;$i < $fam_arr;$i++){

        $sql = "INSERT INTO tbl_family_info(client_id,firstname,middlename,lastname,gender,dob,relation,occupation,income) VALUES(?,?,?,?,?,?,?,?,?)";
        $qry = $connection->prepare($sql);
        $qry->bind_param('issssssss',$last_id,$_POST['ffirstname'][$i],$_POST['fmiddlename'][$i],$_POST['flastname'][$i],$_POST['fgender'][$i],$_POST['fdob'][$i],$_POST['frelation'][$i],$_POST['foccupation'][$i],$_POST['fincome'][$i]);
        if($qry->execute()) {
          echo '<meta http-equiv="refresh" content="0; URL=index.php?status=created">';
        }else{
          echo '<meta http-equiv="refresh" content="0; URL=add.php?status=error">';
        }

      }

      

    }else{
      echo '<meta http-equiv="refresh" content="0; URL=add.php?status=error">';
    }



  }else{
    
    echo '<meta http-equiv="refresh" content="0; URL=add.php?status=error">';

  }

}

 ?>