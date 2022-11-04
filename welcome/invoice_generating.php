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

          <div class="row" id="exampl">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <!-- /.card-header -->
                <div class="table-responsive p-3">
                  <?php
                  $invid=$_GET['invid'];
                                
  $sql="SELECT * from paymentwel_tbl,citizenuser_tbl,welcome_tbl where citizenuser_tbl.citizenuser_id = paymentwel_tbl.citizenuser_id AND welcome_tbl.welcome_id = paymentwel_tbl.welcome_id
  AND paymentwel_tbl.status='1' AND paymentwel_tbl.paywel_id=:invid";
                  
                  $query = $dbh -> prepare($sql);
                  $query-> bindParam(':invid', $invid, PDO::PARAM_STR);
                  $query->execute();
                  $results=$query->fetchAll(PDO::FETCH_OBJ);

                  $cnt=1;
                  if($query->rowCount() > 0)
                  {
                    foreach($results as $row)
                    { 
                      ?>
                      <table  border="1" class="table align-items-center table-bordered table-hover">
                        <tr>
                          <th colspan="5" style="text-align: center;color: red;font-size: 20px">Welcome Payment Number: <?php  echo $row->paywel_id;?></th>
                        </tr>


                        <tr>
                          <th>FirstName</th>
                          <td><?php  echo $row->firstname;?></td>
                          <th>LastName</th>
                          <td><?php  echo $row->lastname;?></td>
                        </tr>
                        <tr>
                          <th>phoneNumber</th>
                          <td><?php  echo $row->phonenumber;?></td>
                          <th>Welcome Payed Name</th>
                          <td><?php  echo $row->welcomename;?></td>
                        </tr>


                        <tr>
                          <th style="text-align: center;" colspan="2">Amount</th>
                          <th style="text-align: center;" colspan="2">Date Payed</th>
                        </tr>
                        <tr>
                          <td style="text-align: center;" colspan="2"><?php  echo $row->amount;?></td>
                          <td style="text-align: center;" colspan="2"><?php  echo $total= $row->payed_on;?></td>

                        </tr>
                        <?php 
                       
                      } ?>
                      <tr>
                        <th colspan="2" style="text-align:center;color: blue">Amount</th>
                        <td colspan="2" style="text-align: center;"><?php  echo $row->amount;?>Rwf</td>
                      </tr>

                      <?php 
                      $cnt=$cnt+1;
                    } ?>

                  </table> 
                  <p style="margin-top:1%"  align="center">
                    <i class="mdi mdi-printer fa-2x" style="cursor: pointer; font-size: 30px; "  OnClick="CallPrint(this.value)" ></i>
                  </p>
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
  <script>
    function CallPrint(strid) {
      var prtContent = document.getElementById("exampl");
      var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    }
  </script>
</body>
</html>