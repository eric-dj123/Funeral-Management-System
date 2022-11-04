<?php
include('includes/checklogin.php');
check_login();
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
              <h5 class="modal-title" style="float: left;">Between Dates Reports</h5>
            </div>
            <div class="col-md-12 mt-4">
              <form class="forms-sample" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row ">
                  <div class="form-group col-md-6 ">
                    <label for="exampleInputPassword1">From Date</label>
                    <input type="date" id="fromdate" name="fromdate" value="" class="form-control" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputName1">To Date </label>
                    <input type="date" id="todate" name="todate" value="" class="form-control" required="">
                  </div>
                </div>

                <button type="submit" style="float: left;"  name="search" id="submit" class="btn btn-info btn-sm  mb-4">Search</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">

           <!--  start  modal -->
           <div id="editData4" class="modal fade">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">View Payment Cemetery in  details</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="info_update4">
                 <?php @include("view_newpaymentcemetery.php");?>
               </div>
               <div class="modal-footer ">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
        </div>
        <!--   end modal -->
        <?php
        if(isset($_POST['search']) & !empty($_POST['fromdate']))
        {
          ?>
          <div class="table-responsive p-3">
            <?php
            $fdate=$_POST['fromdate'];
            $tdate=$_POST['todate'];
            ?>
            <h5 align="center" style="color:blue">Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
            <hr />
            <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
              <thead>
                <tr>
           
                  <th>ID</th>
                  <th class="d-none d-sm-table-cell">FirstName</th>
                  <th class="d-none d-sm-table-cell">LastName</th>
                  <th class="d-none d-sm-table-cell">PhoneNumber</th>
                  <th class="d-none d-sm-table-cell">Cemetery Name Payed</th>
                  <th class="d-none d-sm-table-cell">Cemetery Category</th>
                  <th class="d-none d-sm-table-cell">Amount</th>
                  <th class="d-none d-sm-table-cell">Date Payed</th>
                 
                  <th class=" Text-center" style="width: 15%;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
               $sql="SELECT * from payementcem_tbl ,citizenuser_tbl,cemetery_tbl where date( 	requested_on) between '$fdate' and '$tdate' AND citizenuser_tbl.citizenuser_id = payementcem_tbl.citizenuser_id AND cemetery_tbl.cemetery_id = payementcem_tbl.cemetery_id AND payementcem_tbl.status='1'";
                $query = $dbh -> prepare($sql);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);

                $cnt=1;
                if($query->rowCount() > 0)
                {
                  foreach($results as $row)
                    {               ?>
                      <tr>
                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->firstname);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->lastname);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->phonenumber);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->cemeteryname);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->category);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->amount);?></td>
                      
                        <td class="font-w600">
                          <span class="badge badge-info"><?php  echo htmlentities($row->requested_on);?></span>
                        </td>
                        
                        <td class=" text-center"><a href="#"  class=" edit_data4" id="<?php echo  ($row->paycem_id); ?>" title="click to edit"><i class="mdi mdi-eye" aria-hidden="true"></i></a>
                        <a href="invoice_generating.php?invid=<?php echo htmlentities ($row->paycem_id);?>"><i class="mdi mdi-printer" aria-hidden="true"></i></a>
                      </tr>
                      <?php
                      $cnt=$cnt+1;
                    }
                  } ?>
                </tbody>
              </table>
            </div>

            <?php
          }else{
            ?>
            <div class="table-responsive p-3">
              <table class="table align-items-center table-flush table-hover table-bordered" id="dataTableHover">
                <thead>
                  <tr>
                  <th>ID</th>
                  <th class="d-none d-sm-table-cell">FirstName</th>
                  <th class="d-none d-sm-table-cell">LastName</th>
                  <th class="d-none d-sm-table-cell">PhoneNumber</th>
                  <th class="d-none d-sm-table-cell">Cemetery Name Payed</th>
                  <th class="d-none d-sm-table-cell">Cemetery Category</th>
                  <th class="d-none d-sm-table-cell">Amount</th>
                  <th class="d-none d-sm-table-cell">Date Payed</th>
                 
                  <th class=" Text-center" style="width: 15%;">Action</th>
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
                    {               ?>
                      <tr>
                      <td class="text-center"><?php echo htmlentities($cnt);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->firstname);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->lastname);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->phonenumber);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->cemeteryname);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->category);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->amount);?></td>
                      
                        <td class="font-w600">
                          <span class="badge badge-info"><?php  echo htmlentities($row->requested_on);?></span>
                        </td>
                        
                        <td class=" text-center"><a href="#"  class=" edit_data4" id="<?php echo  ($row->paycem_id); ?>" title="click to edit"><i class="mdi mdi-eye" aria-hidden="true"></i></a>
                        <a href="invoice_generating.php?invid=<?php echo htmlentities ($row->paycem_id);?>"><i class="mdi mdi-printer" aria-hidden="true"></i></a>
                      
                      </tr>
                      <?php
                      $cnt=$cnt+1;
                    }
                  } ?>
                </tbody>
              </table>
            </div>

            <?php
          } ?>

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
        url:"view_newpaymentcemetery.php",
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