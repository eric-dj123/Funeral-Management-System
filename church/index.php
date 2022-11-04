

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
                            <div class="brand-logo" align="center">
                            <img class="img-avatar" src="companyimages/deco1.png" alt="">
                                <h4 class="text-muted mt-4">
                                    Wecome to Religion Login Form
                                </h4>
                            </div>
                            <form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal" action="code.php">  
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-lg" name="emaill" id="exampleInputEmail1" placeholder="Email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="passwordd" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login_btn" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> 
                                    <a href="forgot_password.php" class="text-primary"> 
                                        Forgot Password
                                    </a>
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
    <?php @include("includes/foot.php");?>
    <!-- endinject -->
</body>
</html>