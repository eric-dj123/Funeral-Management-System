<?php
$conn=new mysqli("localhost","root","","funeral_db");
$paywel_id=$_GET['paywel_id'];
$number=1;
$sql="UPDATE `paymentwel_tbl` SET `status`='$number' WHERE paywel_id=$paywel_id ";
if ($conn->query($sql))
 {
    echo"<script>alert('Payment Has been approved');window.location='manage_welcome_payment.php';</script>";
}
else
{
    echo"<script>alert('samething went wrong');window.location='manage_welcome_payment.php';</script>";
}
?>