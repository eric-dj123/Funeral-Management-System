<?php
$conn=new mysqli("localhost","root","","funeral_db");
$paycem_id=$_GET['paycem_id'];
$number=0;
$sql="UPDATE `payementcem_tbl` SET `status`='$number' WHERE paycem_id=$paycem_id";
if ($conn->query($sql))
 {
    echo"<script>alert('Payment Has been Restored');window.location='report_payment_cemetery_approve.php';</script>";
}
else
{
    echo"<script>alert('samething went wrong');window.location='report_payment_cemetery_approve.php';</script>";
}
?>