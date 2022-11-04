
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login']))
{
    $phonenumber=$_POST['phonenumber'];
    $password=md5($_POST['password']);
    $sql ="SELECT * FROM citizenuser_tbl WHERE phonenumber=:phonenumber and password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':phonenumber', $phonenumber, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        foreach ($results as $result) 
        {
            $_SESSION['odmsaid']=$result->citizenuser_id;
            $_SESSION['login']=$result->phonenumber;
         
            $_SESSION['permission']=$result->firstname;
            
            $get=$result->status;
        }
        $aa= $_SESSION['odmsaid'];
        $sql="SELECT * from citizenuser_tbl  where citizenuser_id=:aa";
        $query = $dbh -> prepare($sql);
        $query->bindParam(':aa',$aa,PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $row)
            {            
                if($row->status=="0")
                { 
                    echo "<script type='text/javascript'> document.location ='../services.php'; </script>";                  

                } else
                { 
                    echo "<script>
                    alert('Your account was disabled Approach Admin');document.location ='index.php';
                    </script>";
                }
            } 
        } 
    } else{
        echo "<script>alert('Invalid Details');</script>";
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
                            <div class="brand-logo" align="center">
                           
                                <h4 class="text-muted mt-4">
                                    Welcome to Citizen User Login Page
                                </h4>
                            </div>
                            <form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal">  
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control form-control-lg" name="phonenumber" id="exampleInputEmail1" placeholder="Phonenumber" required>
                                </div>
                                <div class="form-group mt-3">
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                </div>
                                <div class="mt-3">
                                    <button name="login" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> 
                                    <a href="createaccount.php" class="text-primary"> 
                                        if you do not have account click here to create
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