<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $eid=$_SESSION['edid'];
  $servicename=$_POST['servicename'];
  $servicedes=$_POST['servicedes'];
  $price=$_POST['price'];
  $sql="update tblservice set ServiceName =:servicename,SerDes=:servicedes,ServicePrice=:price  where tblservice.ID=:eid";
  $query=$dbh->prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->bindParam(':servicename',$servicename,PDO::PARAM_STR);
  $query->bindParam(':servicedes',$servicedes,PDO::PARAM_STR);
  $query->bindParam(':price',$price,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()){
    echo '<script>alert("Service has been updated")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
<div class="card-body">
  <h4 class="card-title">Update Service Form </h4>
  <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
    <?php
    $eid=$_POST['edit_id'];
    $sql="SELECT * from  tblservice where tblservice.ID=:eid";
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['edid']=$row->ID;
        ?>        
        <div class="form-group">
          <label for="exampleInputName1">Service Name</label>
          <input type="text" name="servicename" class="form-control" id="servicename" value="<?php  echo $row->ServiceName;?>"required>
        </div>
        <div class="form-group">
          <label for="exampleInputName1">Service Price</label>
          <input type="text" name="price" class="form-control" id="price" value="<?php  echo $row->ServicePrice;?>" required>
        </div>
        <div class="form-group">
          <label for="exampleTextarea1">Service Description</label>
          <textarea class="form-control" name="servicedes" id="servicedes" rows="4" style="line-height: 30px;" required><?php  echo $row->SerDes;?></textarea>
        </div>
        <?php
        $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Update</button>
    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
  </form>
</div>