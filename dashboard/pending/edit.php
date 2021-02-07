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
if(isset($_GET['id'])){
  $sql = "SELECT id,client_id,firstname,lastname,middlename,extension,gender,contact,dob,civil_status,purok,barangay,city FROM tbl_beneficiary WHERE id=?";
  $qry = $connection->prepare($sql);
  $qry->bind_param("i",$_GET['id']);
  $qry->execute();
  $qry->bind_result($dbbid,$dbclient_id,$dbbf,$dbbl,$dbbm,$dbbex,$dbbg,$dbbcon,$dbbdob,$dbbcs,$dbbpurok,$dbbbarangay,$dbbcity);
  $qry->store_result();
  if($qry->fetch()){
    $sql = "SELECT id,firstname,lastname,middlename,extension,gender,contact,dob,civil_status,purok,barangay,city,relation_to_beni,id_presented,assistance_type,client_cat,ben_cat,amount FROM tbl_client WHERE id=?";
    $qry = $connection->prepare($sql);
    $qry->bind_param("i",$dbclient_id);
    $qry->execute();
    $qry->bind_result($dbcid,$dbcf,$dbcl,$dbcm,$dbcex,$dbcg,$dbccon,$dbcdob,$dbccs,$dbcpurok,$dbcbarangay,$dbccity,$dbcrelation,$dbcid_presented,$dbcat,$dbcclient_cat,$dbcben_cat,$dbbcamount);
    $qry->store_result();
    $qry->fetch();
  }
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
            <span class="text-left">Update Intake Sheet</span>

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
        }if($_GET['status'] == 'error'){
          echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <p><i class="icon fa fa-remove"></i>  There was an error.</p>
                   
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
                <input type="text" class="form-control" name="clastname" value="<?php echo $dbcl; ?>" required>
                <label>Firstname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cfirstname" value="<?php echo $dbcf; ?>" required>
                <label>Middlename <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cmiddlename" value="<?php echo $dbcm; ?>" required>
                <label>Extension (Jr., Sr. etc.)<i style="color:red"></i></label>
                <input type="text" class="form-control" name="cextension" value="<?php echo $dbcex; ?>">
                
                <label>Gender <i style="color:red">*</i></label>
                <select class="form-control" name="cgender" required>
                  <option selected disabled value="">Select Gender</option>
                  <option <?php if($dbcg == 'Male'){ echo 'selected'; }?> >Male</option>
                  <option <?php if($dbcg == 'Female'){ echo 'selected'; }?> >Female</option>
                </select>
                <label>Contact Number <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="ccontact" value="<?php echo $dbccon; ?>" required>
                <label>Date of birth <i style="color:red">*</i></label>
                <input type="date" class="form-control" name="cdob" value="<?php echo $dbcdob; ?>"  required>
              </div>
              <div class="col-md-6">
                <label>Civil Status <i style="color:red">*</i></label>
                <select class="form-control" name="ccivil_status" required>
                  <option selected disabled value="">Select Status</option>
                  <option <?php if($dbccs == 'Single'){ echo 'selected'; }?>>Single</option>
                  <option <?php if($dbccs == 'Married'){ echo 'selected'; }?> >Married</option>
                </select>
                 <label>Relationship to Beneficiary <i style="color:red">*</i></label>
                <select class="form-control" name="crelation" required>
                  <option selected disabled value="">Select Relation</option>
                  <option <?php if($dbcrelation == 'Here in Client'){ echo 'selected'; }?>>Here in Client</option>
                  <option <?php if($dbcrelation == 'Grand Mother'){ echo 'selected'; }?>>Grand Mother</option>
                  <option <?php if($dbcrelation == 'Grand Father'){ echo 'selected'; }?> >Grand Father</option>
                  <option <?php if($dbcrelation == 'Mother'){ echo 'selected'; }?> >Mother</option>
                  <option <?php if($dbcrelation == 'Father'){ echo 'selected'; }?> >Father</option>
                  <option <?php if($dbcrelation == 'Aunt'){ echo 'selected'; }?> >Aunt</option>
                  <option <?php if($dbcrelation == 'Uncle'){ echo 'selected'; }?> >Uncle</option>
                  <option <?php if($dbcrelation == 'Sister'){ echo 'selected'; }?> >Sister</option>
                  <option <?php if($dbcrelation == 'Brother'){ echo 'selected'; }?> >Brother</option>
                  <option <?php if($dbcrelation == 'Niece'){ echo 'selected'; }?> >Niece</option>
                  <option <?php if($dbcrelation == 'Live in Partner'){ echo 'selected'; }?> >Live in Partner</option>
                  <option <?php if($dbcrelation == 'Mother in Law'){ echo 'selected'; }?> >Mother in Law</option>
                  <option <?php if($dbcrelation == 'Father in Law'){ echo 'selected'; }?> >Father in Law</option>
                  <option <?php if($dbcrelation == 'Relative'){ echo 'selected'; }?> >Relative</option>
                </select>
                
                <label>ID Presented <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cid_presented" value="<?php echo $dbcid_presented; ?>" edrequired>
                <hr>
                <label>Address <i style="color:red"></i></label>
                <hr>
                <label>Purok <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cpurok" value="<?php echo $dbcpurok; ?>" required>
                <label>Barangay <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="cbarangay" value="<?php echo $dbcbarangay; ?>" required>
                <label>City/Municipality <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="ccity" value="<?php echo $dbccity; ?>" required>
              </div>
            </div>
           
            <div class="row" id="beninfo" <?php if($dbcrelation == 'Here in Client'){ echo "style='display:none;'";} ?> >
              <div class="col-md-12">
                <h4><b>IMPORMASYON UKOL SA BENEPISYARYO</b> (Beneficiary's Identifying Information)</h4>
              </div>
              <div class="col-md-6">
                <label>Lastname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="blastname" value="<?php echo $dbbl; ?>" required>
                <label>Firstname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bfirstname" value="<?php echo $dbbf; ?>" required>
                <label>Middlename <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bmiddlename" value="<?php echo $dbbm; ?>" required>
                <label>Extension (Jr., Sr. etc.) <i style="color:red"></i></label>
                <input type="text" class="form-control" name="bextension" value="<?php echo $dbbex; ?>" >
                <label>Gender <i style="color:red">*</i></label>
                <select class="form-control" name="bgender" required>
                  <option selected disabled value="">Select Gender</option>
                  <option <?php if($dbbg == 'Male'){ echo 'selected'; }?> >Male</option>
                  <option <?php if($dbbg == 'Female'){ echo 'selected'; }?>>Female</option>
                </select>
                <label>Contact Number <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bcontact" value="<?php echo $dbbcon; ?>" required>
                <label>Date of birth <i style="color:red">*</i></label>
                <input type="date" class="form-control" name="bdob" value="<?php echo $dbbdob; ?>" required>
              </div>
              <div class="col-md-6">
                <label>Civil Status <i style="color:red">*</i></label>
                <select class="form-control" name="bcivil_status" required>
                  <option selected disabled value="">Select Status</option>
                  <option <?php if($dbbcs == 'Single'){ echo 'selected'; }?>>Single</option>
                  <option <?php if($dbbcs == 'Married'){ echo 'selected'; }?>>Married</option>
                </select>
               
                <hr>
                <label>Address <i style="color:red"></i></label>
                <hr>
                <label>Purok <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bpurok" value="<?php echo $dbbpurok; ?>" required>
                <label>Barangay <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bbarangay" value="<?php echo $dbbbarangay; ?>" required>
                <label>City/Municipality <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="bcity" value="<?php echo $dbbcity; ?>" required>
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
                    <?php 
   
                      $disabled = 0;
                      $sql = "SELECT id,firstname,lastname,middlename,gender,dob,relation,occupation,income FROM tbl_family_info WHERE client_id=?";
                      $qry = $connection->prepare($sql);
                      $qry->bind_param("i",$dbclient_id);
                      $qry->execute();
                      $qry->bind_result($fiid,$dbff,$dbfl,$dbfm,$dbfg,$dbfdob,$dbfrel,$dbfocc,$dbfincome);
                      $qry->store_result();
                      while($qry->fetch ()){
                      echo '<tr>
                          <td><input type="text" class="form-control" name="ffirstname[]" value="'.$dbff.'" required></td>
                          <td><input type="text" class="form-control" name="flastname[]" value="'.$dbfl.'" required></td>
                          <td><input type="text" class="form-control" name="fmiddlename[]" value="'.$dbfm.'" required></td>
                          <td>
                            <select class="form-control" name="fgender[]" required>
                              <option selected disabled value="">Select Gender</option>';
                            if($dbfg == 'Male'){
                              echo '<option selected>Male</option>';
                              echo '<option>Female</option>';
                            }else{
                              echo '<option>Male</option>';
                              echo '<option selected>Female</option>';
                            }
                             

                    echo'</select>
                          </td>
                          <td><input type="date" class="form-control" name="fdob[]" value="'.$dbfdob.'" required></td>
                          <td><input type="text" class="form-control" name="frelation[]" value="'.$dbfrel.'" required></td>
                          <td><input type="text" class="form-control" name="foccupation[]" value="'.$dbfocc.'" required></td>
                          <td><input type="text" class="form-control" name="fincome[]" value="'.$dbfincome.'" required></td>';
                        if($disabled == 0){
                        echo '<td><button class="btn btn-danger btn-sm" disabled><i class="fa fa-remove"></i></button></td>';
                        }else{
                        echo '<td><button class="btn btn-danger btn-sm delfam" ><i class="fa fa-remove"></i></button></td>';
                        }
                        echo '</tr>';
                        $disabled++;
                      }
                    
                    ?>
                 
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
                <select class="form-control" name="cassistance_type" >
                  <option selected disabled value="">Select Type</option>
                  <option <?php if($dbcat == 'Educational Support'){ echo 'selected'; }?>>Educational Support</option>
                  <option <?php if($dbcat == 'Medical Needs'){ echo 'selected'; }?>>Medical Needs</option>
                  <option <?php if($dbcat == 'Burial Needs'){ echo 'selected'; }?>>Burial Needs</option>
                  <option <?php if($dbcat == 'Transportation Needs'){ echo 'selected'; }?>>Transportation Needs</option>
                  <option <?php if($dbcat == 'Food Subsidy'){ echo 'selected'; }?>>Food Subsidy</option>
                  <option <?php if($dbcat == 'Non-Food Items'){ echo 'selected'; }?>>Non-Food Items</option>
                </select>
                <label>Amount <i style="color:red">*</i></label>
                <input type="number" class="form-control" name="camount" value="<?php echo $dbbcamount; ?>" required>
              </div>
              <div class=col-md-6>
                <label><b>CLIENTS CATEGORY</b></label>
                <select class="form-control" name="cclient_category">
                  <option selected disabled value="">Select Category</option>
                  <option <?php if($dbcclient_cat == 'Children in Need of Special Protection'){ echo 'selected'; }?>>Children in Need of Special Protection</option>
                  <option <?php if($dbcclient_cat == 'Youth in Need of Special Protection'){ echo 'selected'; }?>>Youth in Need of Special Protection</option>
                  <option <?php if($dbcclient_cat == 'Women in Especially Difficult Circumstances'){ echo 'selected'; }?>>Women in Especially Difficult Circumstances</option>
                  <option <?php if($dbcclient_cat == 'Person with Disability'){ echo 'selected'; }?>>Person with Disability</option>
                  <option <?php if($dbcclient_cat == 'Senior Citizen'){ echo 'selected'; }?>>Senior Citizen</option>
                  <option <?php if($dbcclient_cat == 'Family Head and Other Needy Adult'){ echo 'selected'; }?>>Family Head and Other Needy Adult</option>
                </select>
                <label><b>BENEFICIARYS CATEGORY</b></label>
                <select class="form-control" name="cben_category">
                  <option selected disabled value="">Select Category</option>
                  <option <?php if($dbcben_cat == 'Children in Need of Special Protection'){ echo 'selected'; }?>>Children in Need of Special Protection</option>
                  <option <?php if($dbcben_cat == 'Youth in Need of Special Protection'){ echo 'selected'; }?>>Youth in Need of Special Protection</option>
                  <option <?php if($dbcben_cat == 'Women in Especially Difficult Circumstances'){ echo 'selected'; }?>>Women in Especially Difficult Circumstances</option>
                  <option <?php if($dbcben_cat == 'Person with Disability'){ echo 'selected'; }?>>Person with Disability</option>
                  <option <?php if($dbcben_cat == 'Senior Citizen'){ echo 'selected'; }?>>Senior Citizen</option>
                  <option <?php if($dbcben_cat == 'Family Head and Other Needy Adult'){ echo 'selected'; }?>>Family Head and Other Needy Adult</option>
                </select>
              </div>
            </div>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <a href="<?php echo $baseurl; ?>dashboard/pending" class="btn btn-default" > Go Back</a>
                <button name="btnSave" class="btn btn-primary" > Save Changes</button>
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

  $sql = "UPDATE tbl_client SET lastname=?,firstname=?,middlename=?,extension=?,gender=?,contact=?,dob=?,civil_status=?,relation_to_beni=?,id_presented=?,purok=?,barangay=?,city=?,assistance_type=?,client_cat=?,ben_cat=?,amount=? WHERE id=?";
  $qry = $connection->prepare($sql);
  $qry->bind_param("sssssssssssssssssi",$_POST['clastname'],$_POST['cfirstname'],$_POST['cmiddlename'],$_POST['cextension'],$_POST['cgender'],$_POST['ccontact'],$_POST['cdob'],$_POST['ccivil_status'],$_POST['crelation'],$_POST['cid_presented'],$_POST['cpurok'],$_POST['cbarangay'],$_POST['ccity'],$_POST['cassistance_type'],$_POST['cclient_category'],$_POST['cben_category'],$_POST['camount'],$dbclient_id);

  if($qry->execute()) {

      $sql = "UPDATE tbl_beneficiary SET lastname=?,firstname=?,middlename=?,extension=?,gender=?,contact=?,dob=?,civil_status=?,purok=?,barangay=?,city=? WHERE id=?";
      $qry = $connection->prepare($sql);
      $qry->bind_param("sssssssssssi",$_POST['blastname'],$_POST['bfirstname'],$_POST['bmiddlename'],$_POST['bextension'],$_POST['bgender'],$_POST['bcontact'],$_POST['bdob'],$_POST['bcivil_status'],$_POST['bpurok'],$_POST['bbarangay'],$_POST['bcity'],$_GET['id']);

      if($qry->execute()) {
          
          $sql = "DELETE FROM tbl_family_info WHERE client_id=?";
          $qry = $connection->prepare ($sql);
          $qry->bind_param("i",$dbclient_id);
          $qry->execute();

          $fam_arr = count($_POST['ffirstname']);
          echo $fam_arr;

          for($i = 0;$i < $fam_arr;$i++){

            $sql = "INSERT INTO tbl_family_info(client_id,firstname,middlename,lastname,gender,dob,relation,occupation,income) VALUES(?,?,?,?,?,?,?,?,?)";
            $qry = $connection->prepare($sql);
            $qry->bind_param('issssssss',$dbclient_id,$_POST['ffirstname'][$i],$_POST['fmiddlename'][$i],$_POST['flastname'][$i],$_POST['fgender'][$i],$_POST['fdob'][$i],$_POST['frelation'][$i],$_POST['foccupation'][$i],$_POST['fincome'][$i]);
            if($qry->execute()){
              echo '<meta http-equiv="refresh" content="0; URL=index.php?status=updated">';
            }else{
              echo '<meta http-equiv="refresh" content="0; URL=edit.php?status=error">';
            }

          }

      }else{
        echo '<meta http-equiv="refresh" content="0; URL=edit.php?status=error">';
      }


    }else{
      echo '<meta http-equiv="refresh" content="0; URL=edit.php?status=error">';
    }

}

 ?>