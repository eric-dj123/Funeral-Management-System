<?php
$conn=new mysqli("localhost","root","","funeral_db");
$paywel_id=$_GET['paywel_id'];
$number=0;
$sql="UPDATE `paymentwel_tbl` SET `status`='$number' WHERE paywel_id=$paywel_id";
if ($conn->query($sql))
 {
    echo"<script>alert('Payment Has been Restored');window.location='report_payment_welcome_approve.php';</script>";
}
else
{
    echo"<script>alert('samething went wrong');window.location='report_payment_welcome_approve.php';</script>";
}
?>