<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<div class="card-body">
  <?php
  $eid=$_POST['edit_id4'];
  

$sql="SELECT * from payservice_tbl,citizenuser_tbl,service_tbl where citizenuser_tbl.citizenuser_id = payservice_tbl.citizenuser_id AND service_tbl.service_id = payservice_tbl.service_id
AND payservice_tbl.status='1' AND payservice_tbl.payserv=:eid";
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
          <th>Service Name</th>
          <td><?php  echo $row->servicename;?></td>
        </tr>
        <tr>

          <th>Amount</th>
          <td><?php  echo $row->amount;?></td>
          <th>Date</th>
          <td><?php  echo $row->payed_on;?></td>
        </tr>
        <tr>

         
         
        </tr>
      </table> 
      <?php 
      $cnt=$cnt+1;
    }
  } ?>
</div>