<?php 
session_start();
include('includes/autoload.php'); 
echo 'test1';
?> 
<?php

      if(isset($_POST['btnLogin'])){
        echo 'test2';
          $username = $_POST['email-user'];
          $password = $_POST['password'];

          // condition for checking email or id number
          function checkEmail($email) {
             $find1 = strpos($email, '@');
             $find2 = strpos($email, '.');
             return ($find1 !== false && $find2 !== false && $find2 > $find1);
          }
          if(checkEmail($username)){
            $sql = "SELECT id,firstname,lastname,gender,password,type FROM tbl_user WHERE email=?";
          }else{
            $sql = "SELECT id,firstname,lastname,gender,password,type FROM tbl_user WHERE username=?";
          }
          
          $qry = $connection->prepare($sql);
          $qry->bind_param('s', $username);
          $qry->execute();
          $qry->bind_result($id,$dbf,$dbl,$dbg,$dbp,$dbtype);
          $qry->store_result();
          $qry->fetch();

          if($qry->num_rows() > 0) {
            if(password_verify($password, $dbp)){
              $_SESSION['dbu'] = $id;
              $_SESSION['dbf'] = $dbf;
              $_SESSION['dbl'] = $dbl;
              $_SESSION['dbtype'] = $dbtype;
              $_SESSION['dbc'] = false;
              $dbg = ($dbg == 'Male') ? 'Mr.' : "Ms.";
              $_SESSION['dbg'] = $dbg;
              header('location:'.$baseurl.'dashboard/');
            }else{
              header('location:index.php?error=true');
            }
        }else{
          header('location:index.php?error=true');
        }
    }
?>