
<?php 
include('user/includes/checklogin.php');
check_login();

?>
<?php
function gen_uuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),

        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,

        // 48 bits for "node"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}
$curl = curl_init();
$phone=$_POST['contact'];
$citizenuser_id=$_POST['citizenuser_id'];
$amount=$_POST['amount'];
$bid=$_GET['bookid'];
$uuid = gen_uuid();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://opay-api.oltranz.com/opay/paymentrequest',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'
{
  "telephoneNumber" : "'.$phone.'",
  "amount" : 100.0,
  "organizationId" : "a6c9d983-d445-441b-9260-cabadd849d22",
  "description" : "Funeral Management System",
  "callbackUrl" : "http://localhost/funeral/fail.php",
  "transactionId" : "'.$uuid.'"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$status=0;
$conn=new mysqli('localhost','root','','funeral_db');
$bid=$_GET['bookid'];
$stm=$conn->prepare("INSERT INTO `payementcem_tbl`(`phonenumber`, `cemetery_id`, `citizenuser_id`, `amount`) VALUES (?,?,?,?)");
$stm->bind_param("ssss",$phone,$bid,$citizenuser_id,$amount);

if($stm->execute() == TRUE)
{
echo"<script>alert('Request being processed at telco side. You will receive confirmation shortly')</script>";
echo $response;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Funeral Management System - Cemetery Payment</title>
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
					<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="fa fa-chevron-right"></i></a></span> <span>Booking <i class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Pay Cemetery</h1>
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
									<h3 class="mb-4">Pay Cemetery Using MTN Number</h3>
									<div id="form-message-warning" class="mb-4"></div>
									<form method="POST"  action="" id="contactForm" name="contactForm" class="contactForm">
								
											<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="name">PhoneNumber</label>
													<input type="text" class="form-control" name="contact" id="name" placeholder="Enter Your Phone Having Money">
												</div>
											</div>
											
											<input type="hidden" class="form-control" name="citizenuser_id" id="name" value="<?php echo $_SESSION['odmsaid']?>" placeholder="Enter Your Phone Having Money">
											
											<input type="hidden" class="form-control" name="amount" id="name" value="100" placeholder="Enter Your Phone Having Money">
										
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" value="PAY Now" name="submit" class="btn btn-danger">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>

							</div>
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5 img" style="background-image: url(images/mtn.webp);">
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
							<h2 class="mb-0" style="color:white; font-size: 24px;">Subcribe to our Newsletter</h2>
						</div>
						<div class="col-md-6 d-flex align-items-center">
							<form action="#" class="subscribe-form">
								<div class="form-group d-flex">
									<input type="text" class="form-control" placeholder="Enter email address">
									<input type="submit" value="Subscribe" class="submit px-3">
								</div>
							</form>
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