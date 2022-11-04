
<?php 
include('user/includes/checklogin.php');
check_login();

?>
<?php
session_start();
error_reporting(0);
include('includes/configs.php');

	if(isset($_POST['Apply'])){
		$religion= $_POST['religion'];
		$reason= $_POST['reason'];
        $citizenuser_id= $_POST['citizenuser_id'];
		$request_id=mt_rand(100000000, 999999999);
        $status=0;


		$sql = "INSERT INTO prayerrquest_tbl(religion,reason,citizenuser_id,status,request_id) VALUES ('$religion', '$reason','$citizenuser_id','$status','$request_id')";
		if($con->query($sql)){
            echo '<script>alert("Your Request is Send Please wait to Feedback")</script>';
		}
		else{
            echo '<script>alert("Something Went Wrong Please try Again.")</script>';
		}

	}
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Funeral Management System - Service Payment</title>
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
	<section class="hero-wrap hero-wrap-2" style="background-image: url('images/im1.webp');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Prayer  <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Request Prayer</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container mt-4 mb-4">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row no-gutters">
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Select Religion You want </h3>
									<div id="form-message-warning" class="mb-4"></div>
									<form method="POST"  action="" id="contactForm" name="contactForm" class="contactForm">
								
                                    <div class="form-group">
                                            <label for="exampleInputName1">Select Religion</label>
                                            <select class="form-control" name="religion" id="">
                                            <option value="catholic">Catholic</option>
                                            <option value="advantist">Advantist</option>
                                            <option value="adpr">ADEPR</option>
                                            <option value="anglican">Anglican</option>
                                            </select>
                                        </div>
                                            <div class="col-md-12">
												<div class="form-group">
													<label class="label" for="#">Describe Your Request in details</label>
													<textarea name="reason" class="form-control" id="info" cols="30" rows="4" placeholder=""></textarea>
												</div>
											</div>
                                            <input type="hidden" class="form-control" name="citizenuser_id" id="name" value="<?php echo $_SESSION['odmsaid']?>" placeholder="Enter Your Phone Having Money">
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="Send Rquest" name="Apply" class="btn btn-danger">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>

							</div>
							<div class="col-md-5 d-flex align-items-stretch">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb bg-primary">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-lg-8 py-4">
					<div class="row">
						<div class="col-md-6 ftco-animate d-flex align-items-center">
							<h2 class="mb-0" style="color:white; font-size: 24px;">.</h2>
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