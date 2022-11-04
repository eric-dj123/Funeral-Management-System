<?php
include 'includes/config.php';
$error = "";
$msg = "";

if (isset($_POST['submit'])) {
    $firstname=mysqli_real_escape_string($con,trim($_POST['firstname']));
    $lastname=mysqli_real_escape_string($con,trim($_POST['lastname']));
    $phonenumber=mysqli_real_escape_string($con,trim($_POST['phonenumber']));
    $email=mysqli_real_escape_string($con,trim($_POST['email']));
    $password=mysqli_real_escape_string($con,trim($_POST['password']));
    $cpass =$_POST['rpassword']; 
    $select_chech = mysqli_query($con, "SELECT * FROM cemeteryuser_tbl WHERE email='".trim($_POST['email'])."' OR phonenumber='".trim($_POST['phonenumber'])."'");

    if (mysqli_num_rows($select_chech) > 0) {
        echo "<script>
        alert('Your phonenumber and email is already exists please check');document.location ='add_new_cemetery_user.php';
        </script>";
    }
elseif ($password != $cpass) {
    $error ="Password are not Match";
}
   
elseif (mysqli_num_rows($select_chech)==0) { 
    $password=md5($_POST['password']);
    $status=0;
    $insert=mysqli_query($con,"INSERT INTO `cemeteryuser_tbl`(`firstname`, `lastname`, `phonenumber`, `email`, `password`, `status`) 
    VALUES ('$firstname','$lastname','$phonenumber','$email','$password','$status')");
    if ($insert) {
        
        echo "<script>
        alert('New Account  is  created Successfully');document.location ='add_new_cemetery_user.php';
        </script>";
    }else {
        echo "<script>
        alert('New Account  is  created Successfully');document.location ='add_new_cemetery_user.php';
        </script>";
    }
}else {
    echo "<script>
    alert('Your phonenumber or email is already exists please check');document.location ='add_new_cemetery_user.php.php';
    </script>";
}
}
?>

     

<div class="card-body">
<form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal" action="">  
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg" name="firstname" id="exampleInputEmail1" placeholder="Firstname" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" name="lastname" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Lastname" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" name="phonenumber" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Phonenumber" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="text" name="email" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Email" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="rpassword" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Create</button>
                                </div>
                                
                                
                            </form>
</div>