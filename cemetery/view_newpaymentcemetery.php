<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<div class="card-body">
  <?php
  $eid=$_POST['edit_id4'];
  $sql="SELECT * from payementcem_tbl,citizenuser_tbl,cemetery_tbl where citizenuser_tbl.citizenuser_id = payementcem_tbl.citizenuser_id AND cemetery_tbl.cemetery_id = payementcem_tbl.cemetery_id
                 AND payementcem_tbl.status='1' AND payementcem_tbl.paycem_id=:eid";
  $query = $dbh -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  $cnt=1;
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
    { 
      ?>
      <table border="1" class="table align-items-center table-flush table-bordered">
        <tr>
          <th>FirstName</th>
          <td><?php  echo $row->firstname;?></td>
          <th>lastname</th>
          <td><?php  echo $row->lastname;?></td>
        </tr>


        <tr>
          <th>Mobile Number</th>
          <td><?php  echo $row->phonenumber;?></td>
          <th>Cemetery Name</th>
          <td><?php  echo $row->cemeteryname;?></td>
        </tr>
        <tr>

          <th>Category</th>
          <td><?php  echo $row->category;?></td>
          <th>Date</th>
          <td><?php  echo $row->requested_on;?></td>
        </tr>
        <tr>

         
         
        </tr>
      </table> 
      <?php 
      $cnt=$cnt+1;
    }
  } ?>
</div>