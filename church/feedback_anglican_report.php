<?php

// Code for deleting product from cart
if(isset($_GET['delid']))
{
  $rid=intval($_GET['delid']);
  $sql="delete from tblservice where ID=:rid";
  $query=$dbh->prepare($sql);
  $query->bindParam(':rid',$rid,PDO::PARAM_STR);
  $query->execute();
  echo "<script>alert('Data deleted');</script>"; 
  echo "<script>window.location.href = 'manage_service.php'</script>";
}
?>
<?php
session_start();
include('dbconfig.php');
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
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head4.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header4.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar4.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h1 class="modal-title" style="float: left;">Report For Anglican Feedback</h1>    
                  
           
                    
                    </div>
                    <!-- /.card-header -->
                    
                  <div id="editData4" class="modal fade">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">View Report in  details</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body" id="info_update4">
                         <?php @include("view_newanglicanreport.php");?>
                       </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><!-- 
                        <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!--  start  modal -->
                <div id="editData" class="modal fade">
                  <div class="modal-dialog ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Write FeedBack</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update">
                       <?php @include("update_service4.php");?>
                     </div>
                     <div class="modal-footer ">
                      <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
              </div>
              <!--   end modal -->
              <div class="card-body table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead>
                    <tr>
                      <th class="text-center">No.</th>
                      <th>Firstname</th>
                      <th class="">Lastname</th>
                      <th class="">Phonenumber</th>

                      <th class="">Reason</th>
                      <th class="" style="width: 15%;">Applyed on</th>
                      <th class="" style="width: 15%;">Feedback</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                   $sql="SELECT * FROM prayerrquest_tbl LEFT JOIN citizenuser_tbl ON citizenuser_tbl.citizenuser_id= prayerrquest_tbl.citizenuser_id
                   where religion='anglican' AND comment is not null";
                    $query = $dbh -> prepare($sql);
                    
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                      foreach($results as $row)
                      {    
                        ?>
                        <tr>
                          <td class="text-center"><?php echo htmlentities($cnt);?></td>
                          <td><?php  echo htmlentities($row->firstname);?></td>
                          <td><?php  echo htmlentities($row->lastname);?></td>
                          <td><?php  echo htmlentities($row->phonenumber);?></td>
                          <td><?php  echo htmlentities($row->reason);?></td>
                          <td><?php  echo htmlentities($row->applyed_on);?></td>
                          <td class=" text-center"><a href="#"  class=" edit_data4" id="<?php echo  ($row->parr_id); ?>" title="click to edit"><i class="mdi mdi-eye" aria-hidden="true"></i></a>
                        <a href="invoice_generating_anglican.php?invid=<?php echo htmlentities ($row->parr_id);?>"><i class="mdi mdi-printer" aria-hidden="true"></i></a>
                      </td>
                        <?php 
                        $cnt=$cnt+1;
                      }
                    } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:../../partials/_footer.html -->
      <?php @include("includes/footer.php");?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php @include("includes/foot.php");?>
<!-- End custom js for this page -->

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data4',function(){
      var edit_id4=$(this).attr('id');
      $.ajax({
        url:"view_newanglicanreport.php",
        type:"post",
        data:{edit_id4:edit_id4},
        success:function(data){
          $("#info_update4").html(data);
          $("#editData4").modal('show');
        }
      });
    });
  });
</script>
</body>
</html>
