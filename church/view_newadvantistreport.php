<?php
session_start();
include('dbconfig.php');
include('includes/dbconnection.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: dbconfig.php");
}

if(!$_SESSION['email'])
{
    header('Location: index.php');
}
?>
<div class="card-body">
  <?php
  $eid=$_POST['edit_id4']; 
$sql="SELECT * FROM prayerrquest_tbl LEFT JOIN citizenuser_tbl ON citizenuser_tbl.citizenuser_id= prayerrquest_tbl.citizenuser_id
                   where religion='advantist' AND comment is not null AND prayerrquest_tbl.parr_id=:eid ";
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
          <th>Reasons</th>
          <td><?php  echo $row->reason;?></td>
        </tr>
        <tr>

          <th>Comment</th>
          <td><?php  echo $row->comment;?></td>
          <th>Date</th>
          <td><?php  echo $row->applyed_on;?></td>
        </tr>
        <tr>

         
         
        </tr>
      </table> 
      <?php 
      $cnt=$cnt+1;
    }
  } ?>
</div>