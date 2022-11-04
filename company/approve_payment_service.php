<?php
$conn=new mysqli("localhost","root","","funeral_db");
$payserv=$_GET['payserv'];
$number=1;
$sql="UPDATE `payservice_tbl` SET `status`='$number' WHERE payserv=$payserv";
if ($conn->query($sql))
 {
    echo"<script>alert('Payment Has been approved');window.location='manage_service_payment.php';</script>";
}
else
{
    echo"<script>alert('samething went wrong');window.location='manage_service_payment.php';</script>";
}
?>