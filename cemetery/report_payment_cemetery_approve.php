<?php
include('includes/checklogin.php');
check_login();
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
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">Report Of Citizen Payment Approve</h5>    
                    
                </div>
                <!-- /.card-header -->
                <div class="modal fade" id="addsector">
                  <div class="modal-dialog modal-md ">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Register Cemetery</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <!-- <p>One fine body&hellip;</p> -->
                        <?php @include("newservice.php");?>
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
                        <h5 class="modal-title">Edit service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="info_update">
                       <?php @include("update_service.php");?>
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
                      <th>FirstName</th>
                      <th>LastName</th>
                      <th>PhoneNumber</th>
                      <th>Cemetery Name</th>
                      <th>Cemetery Category</th>
                      <th>Amount</th>
                      <th>Restore</th>
                  
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                 $sql="SELECT * from payementcem_tbl,citizenuser_tbl,cemetery_tbl where citizenuser_tbl.citizenuser_id = payementcem_tbl.citizenuser_id AND cemetery_tbl.cemetery_id = payementcem_tbl.cemetery_id
                 AND payementcem_tbl.status='1' ";
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
                          <td><?php  echo htmlentities($row->cemeteryname);?></td>
                          <td><?php  echo htmlentities($row->category);?></td>
                          <td><?php  echo htmlentities($row->amount);?></td>
                          
                          <td class="text-center">
                          <a href="restoreapprovecem.php?paycem_id=<?php echo ($row->paycem_id);?>" onclick="return confirm('Do you really want to Reject Not Receieved Money ?');" title="Block this User">Restore</a> </td>                      
                          </td>.

                        </tr>
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
    $(document).on('click','.edit_data',function(){
      var edit_id=$(this).attr('id');
      $.ajax({
        url:"update_service.php",
        type:"post",
        data:{edit_id:edit_id},
        success:function(data){
          $("#info_update").html(data);
          $("#editData").modal('show');
        }
      });
    });
  });
</script>
</body>
</html>
