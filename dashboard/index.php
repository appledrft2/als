<?php 
session_start();
include('../includes/autoload.php');
if(isset($_POST['btnLogout'])){
  session_unset();
  header('location:'.$baseurl.'');
}
if(isset($_SESSION['dbu'])){ 
  if($_SESSION['dbc'] != false){
      header("location:".$baseurl."client/dashboard");
  }
}else{
  header('location:'.$baseurl.'');
}
$pages ='dashboard/index';
?>
<?php include('header.php'); ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
          <h3 class="col-md-6 text-left">
            <span class="text-left">Overview</span>

          </h3>
          <h3 class="col-md-6 text-right">
            <span class="text-right"><i class="fa fa-calendar"></i> <?php echo date('D, M. d Y') ?></span>
          </h3>
        </div>
      </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-green"><i class="fa fa-clock-o"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Pending</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-red"><i class="fa fa-history"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Released</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
               <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-default"><i class="fa fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Beneficiaries</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->
              <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Total Users</span>
                    <span class="info-box-number"></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.col -->

      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="text-center">OUR MISSION</h3>
            </div>
            <div class="box-body">
                <h4 class="text-justify">To provide social protection and
promote the rights and welfare
of the poor, vulnerable and the
disadvantaged individual, family
and community to contribute to
poverty allevation and
empowerment throught swd
policies, programs, projects and
services implemted with or
through LGUs, NGOs, POs, other GOs
 and other members of civil society.</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="text-center">OUR VISION</h3>
            </div>
            <div class="box-body">
                <h4 class="text-justify">The Deparment of Social Welfare and
                Development envisions all Filipinos
                free from hunger and poverty,
                have equal access to opportunities,
                enabled by a fair, just and
                peaceful society.</h4>
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
