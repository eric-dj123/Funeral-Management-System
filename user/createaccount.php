<?php
include 'config.php';
$error = "";
$msg = "";

if (isset($_POST['submit'])) {
    $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
    $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
    $phonenumber=mysqli_real_escape_string($con,trim($_POST['phonenumber']));
    $password=mysqli_real_escape_string($con,trim($_POST['password']));
    $cpass =$_POST['rpassword']; 

    $select_chech = mysqli_query($con, "SELECT * FROM citizenuser_tbl WHERE phonenumber='".trim($_POST['phonenumber'])."'");
    if (mysqli_num_rows($select_chech) > 0) {
        $error= "your phonenumber is already exists please contact system administrator";
    }
elseif ($password != $cpass) {
    $error ="Password are not Match";
}
   
elseif (mysqli_num_rows($select_chech)==0) { 
    $password=md5($_POST['password']);
    $status=0;
    $insert=mysqli_query($con,"INSERT INTO `citizenuser_tbl`(`firstname`, `lastname`, `phonenumber`, `password`, `status`) 
    VALUES ('$firstname','$lastname','$phonenumber','$password','$status')");
    if ($insert) {
        
        $msg ="New account is Created successfully";
    }else {
        $error="There is Something Went Wrong";
    }
}else {
    $error="Your Phonenumber is already exists please contact system administrator!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php @include("includes/head.php");?>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo " align="center" >
                  <img class="img-avatar" src="companyimages/deco.png" alt="">
                </div>
                <div class="card-body">
      <?php if(!empty($msg)): ?>
        <div class="alert alert-success">
          <?= $msg; ?>
        </div>
        <?php endif; ?>
        <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
          <?= $error; ?>
        </div>
      <?php endif; ?>
               
                <form class="js-validation-signin px-30" method="post" name="chngpwd" onSubmit="return valid();">
                    <div class="form-group row">
                    <label for="login-username">FirstName</label>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control" required="true" name="firstname" placeholder="Enter your Firstname">
                              
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="login-username">LastName</label>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input type="text" class="form-control"  name="lastname" required="true" placeholder="Enter your Lastname" >
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="login-password">Phone Number</label>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" name="phonenumber" required="true" placeholder="Enter your PhoneNumber"/>
                              
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="login-password"> Password</label>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input class="form-control" type="password" name="password" required="true" placeholder="Enter your Password"/>
                               
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="login-password"> Confirm password</label>
                        <div class="col-12">
                            <div class="form-material floating">
                                <input class="form-control" type="password" name="rpassword" required="true" placeholder="Re-Type password"/>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3">
                    <button name="submit" type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Create</button>
                  </div>
                  <div class="text-center mt-4 font-weight-light"> Have Account <a href="index.php" class="text-primary">Click here</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin j

      s for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>