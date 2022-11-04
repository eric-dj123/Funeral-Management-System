
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $eid=$_SESSION['edid'];
  $comment=$_POST['comment'];
  $sql="update prayerrquest_tbl set comment =:comment where prayerrquest_tbl.parr_id=:eid";
  $query=$dbh->prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->bindParam(':comment',$comment,PDO::PARAM_STR);

  $query->execute();
  if ($query->execute()){
    echo '<script>alert("FeedBack Send")</script>';
  }else{
    echo '<script>alert("update failed! try again later")</script>';
  }
}
?>
<div class="card-body">

  <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
    <?php
    $eid=$_POST['edit_id'];

    $sql="SELECT * FROM prayerrquest_tbl LEFT JOIN citizenuser_tbl ON citizenuser_tbl.citizenuser_id= prayerrquest_tbl.citizenuser_id
    where prayerrquest_tbl.religion='anglican' AND prayerrquest_tbl.parr_id=:eid";            
    $query = $dbh -> prepare($sql);
    $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
      foreach($results as $row)
      { 
        $_SESSION['edid']=$row->parr_id;
        ?>        
        <div class="form-group">
        
          <input type="hidden" name="servicename" class="form-control" id="servicename" value="<?php  echo $row->parr_id;?>"required>
        </div>
        <div class="form-group">
      <label for="exampleTextarea1">Feedback To Christian</label>
      <textarea class="form-control" name="comment" id="servicedes" rows="4" placeholder="Enter Feedback in details" required></textarea>
    </div>
        <?php
        $cnt=$cnt+1;
      }
    } ?>
    <button type="submit" name="submit" class="btn btn-primary btn-fw mr-2">Send Feedback</button>
    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
  </form>
</div>