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
                     <?php @include("view_newpaymentservice.php");?>
                   </div>
                   <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
                    <tr>
                      <th class="text-center">No.</th>
                      <th>FirstName</th>
                      <th>LastName</th>
                      <th>PhoneNumber</th>
                      <th>Service Name</th>
                      <th>Amount</th>
                      <th>Action</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                 $sql="SELECT * from payservice_tbl,citizenuser_tbl,service_tbl where citizenuser_tbl.citizenuser_id = payservice_tbl.citizenuser_id AND service_tbl.service_id = payservice_tbl.service_id
                 AND payservice_tbl.status='1' ";
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
                          <td><?php  echo htmlentities($row->servicename);?></td>
                          
                          <td><?php  echo htmlentities($row->amount);?></td>
                      <td class=" text-center"><a href="#"  class=" edit_data4" id="<?php echo  ($row->payserv); ?>" title="click to edit"><i class="mdi mdi-eye" aria-hidden="true"></i></a>
                        <a href="invoice_generating.php?invid=<?php echo htmlentities ($row->payserv);?>"><i class="mdi mdi-printer" aria-hidden="true"></i></a>
                      </td>

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
<!-- End custom js for this page -->
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data4',function(){
      var edit_id4=$(this).attr('id');
      $.ajax({
        url:"view_newpaymentservice.php",
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
</script>
</body>
</html>
