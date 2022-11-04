<?php
$conn=new mysqli("localhost","root","","funeral_db");
$paycem_id=$_GET['paycem_id'];
$number=2;
$sql="UPDATE `payementcem_tbl` SET `status`='$number' WHERE paycem_id=$paycem_id";
if ($conn->query($sql))
 {
    echo"<script>alert('Payment Has been Canceled');window.location='manage_cemetery_payment.php';</script>";
}
else
{
    echo"<script>alert('samething went wrong');window.location='manage_cemetery_payment.php';</script>";
}
?>