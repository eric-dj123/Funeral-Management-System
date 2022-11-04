<?php
$conn=new mysqli("localhost","root","","funeral_db");
$payserv=$_GET['payserv'];
$number=0;
$sql="UPDATE `payservice_tbl` SET `status`='$number' WHERE payserv=$payserv";
if ($conn->query($sql))
 {
    echo"<script>alert('Payment Has been Restored');window.location='report_payment_welcome_approve.php';</script>";
}
else
{
    echo"<script>alert('samething went wrong');window.location='report_payment__approve.php';</script>";
}
?>