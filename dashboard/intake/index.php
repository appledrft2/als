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
            <div class="row">
              <div class="col-md-6">
                <label>Lastname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Firstname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="fname" required>
                <label>Middlename <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="fname" required>
                <label>Extension (Jr., Sr. etc.)<i style="color:red"></i></label>
                <input type="text" class="form-control" name="fname" required>
                
                <label>Gender <i style="color:red">*</i></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <label>Contact Number <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Date of birth <i style="color:red">*</i></label>
                <input type="date" class="form-control" name="fname" required>
              </div>
              <div class="col-md-6">
                <label>Civil Status <i style="color:red">*</i></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Status</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
                 <label>Relationship to Beneficiary <i style="color:red">*</i></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Relation</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
                
                <label>ID Presented <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <hr>
                <label>Address <i style="color:red"></i></label>
                <hr>
                <label>Purok <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Barangay <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>City/Municipality <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
              </div>
            </div>
            <h4><b>IMPORMARSYON UKOL SA BENEPISYARYO</b> (Beneficiary's Identifying Information)</h4>
            <div class="row">
              <div class="col-md-6">
                <label>Lastname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Firstname <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Middlename <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Extension (Jr., Sr. etc.) <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Gender <i style="color:red">*</i></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Gender</option>
                  <option>Male</option>
                  <option>Female</option>
                </select>
                <label>Contact Number <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Date of birth <i style="color:red">*</i></label>
                <input type="date" class="form-control" name="fname" required>
              </div>
              <div class="col-md-6">
                <label>Civil Status <i style="color:red">*</i></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Status</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
               
                <hr>
                <label>Address <i style="color:red"></i></label>
                <hr>
                <label>Purok <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>Barangay <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
                <label>City/Municipality <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
              </div>
            </div>
            <h4><b>IMPORMARSYON NG PAMILYA</b> (Family Information)</h4>
            <div class="row">
              <div class="col-md-12">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Middlename</th>
                      <th>Date of Birth</th>
                      <th>Relation</th>
                      <th>Occupation</th>
                      <th>Monthly Income</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" class="form-control" name="lname" required></td>
                      <td><input type="text" class="form-control" name="lname" required></td>
                      <td><input type="text" class="form-control" name="lname" required></td>
                      <td><input type="date" class="form-control" name="lname" required></td>
                      <td><input type="text" class="form-control" name="lname" required></td>
                      <td><input type="text" class="form-control" name="lname" required></td>
                      <td><input type="text" class="form-control" name="lname" required></td>
                      <td><button class="btn btn-danger btn-sm" disabled=""><i class="fa fa-remove"></i></button></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="8"><button id="morepet" class="pull-right btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i>&nbsp;Add more</button></td>
                    </tr>
                  </tfoot>
                </table>
                
              </div>
            </div>

            <div class="row">
              <div class=col-md-6>
                
                <label>Financial Assistance Type <i style="color:red">*</i></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Type</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
                <label>Amount <i style="color:red">*</i></label>
                <input type="text" class="form-control" name="lname" required>
              </div>
              <div class=col-md-6>
                <label><b>CLIENTS CATEGORY</b></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Category</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
                <label><b>BENEFICIARYS CATEGORY</b></label>
                <select class="form-control" name="gender">
                  <option selected disabled value="">Select Category</option>
                  <option>Single</option>
                  <option>Married</option>
                </select>
              </div>
            </div>
            </div>
            <div class="box-footer">
              <div class="pull-right">
                <a href="<?php echo $baseurl; ?>dashboard/users" class="btn btn-default" > Go Back</a>
                <button name="btnSave" class="btn btn-primary" > Save Changes</button>
             
              </div>
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
