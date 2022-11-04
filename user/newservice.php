<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit2']))
{
  $servicename=$_POST['servicename'];
  $servicedes=$_POST['servicedes'];
   $price=$_POST['price'];
  $sql="insert into tblservice(ServiceName,SerDes,ServicePrice)values(:servicename,:servicedes,:price)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':servicename',$servicename,PDO::PARAM_STR);
  $query->bindParam(':servicedes',$servicedes,PDO::PARAM_STR);
   $query->bindParam(':price',$price,PDO::PARAM_STR);
  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert("Service has been added.")</script>';
  }
  else
  {
   echo '<script>alert("Something Went Wrong. Please try again")</script>';
 }
}
?>
<div class="card-body">
  <h4 class="card-title">Add Service Form </h4>
  <form class="forms-sample" method="post">
    <div class="form-group">
      <label for="exampleInputName1">Service Name</label>
      <input type="text" name="servicename" class="form-control" id="servicename" placeholder="Service Name" required>
    </div>
    <div class="form-group">
      <label for="exampleInputName1">Price</label>
      <input type="text" name="price" class="form-control" id="price" placeholder="Price" required>
    </div>
    <div class="form-group">
      <label for="exampleTextarea1">Service Description</label>
      <textarea class="form-control" name="servicedes" id="servicedes" rows="4" required></textarea>
    </div>
    <button type="submit" name="submit2" class="btn btn-primary btn-fw mr-2">Submit</button>
  </form>
</div>