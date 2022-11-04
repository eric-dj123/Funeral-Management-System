<?php 
include('user/includes/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Funeral Management System - Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?Php include('includes/header2.php'); ?>
 <!-- END nav -->
 <section class="hero-wrap hero-wrap-2" style="background-image: url('images/party2.webp');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end">
      <div class="col-md-9 ftco-animate pb-5">
       <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Services <i class="fa fa-chevron-right"></i></span></p>
       <h1 class="mb-0 bread">Services</h1>
     </div>
   </div>
 </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
        <h2> Welcome to Pay Service about Funeral </h2>
      </div>
    </div>
    <div class="row">
    <?php
                            $st =1;
                            $query = "SELECT * FROM `service_tbl` WHERE status=?";
                            $statment= $dbh->prepare($query);
                            $statment->execute([$st]);
                            
                            if ($statment->rowCount()==0) {
                                ?>
                        <h4>No record Found!</h4>
                        <?php
                            }else{

                            while ($row = $statment->fetch(PDO::FETCH_OBJ)) {
                                
                            ?>
                        <div class="col-lg-4">

                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-0 mt-1 mb-1" style="width: 25rem;"
                                            src="/company/postimages/<?php echo $row->photo; ?>" alt="...">
                                    </div>
                                    <h6 class="m-0 font-weight-bold"
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                        <?php echo $row->servicename; ?>
                                    </h6>
                                    <p
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; color: rgba(0, 0, 0, 1.0); font-size:12px;">
                                        <?php echo $row->description; ?>
                                    </p>
                                    <a class="btn btn-primary" href="index.php?v=<?php echo $row->id; ?>"
                                        style="text-decoration-line: none; font-size:12px;">
                                        Apply For This
                                    </a>

                                    <a class="btn btn-primary" href="#" data-id="<?php echo $row->id; ?>"
                                        data-toggle="modal" data-target="#viewModal"
                                        style="text-decoration-line: none; font-size:12px;">
                                        Read More
                                    </a>
                                </div>

                            </div>

                        </div>
    
    </div>
  </div>
</section>

<?Php include('includes/footer.php'); ?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>