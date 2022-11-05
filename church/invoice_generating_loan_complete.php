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
<?php @include("includes/head3.php");?>
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php @include("includes/header3.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <?php @include("includes/sidebar3.php");?>
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
                 


                  $sql="SELECT * FROM tbl_borrow LEFT JOIN member_tbl ON member_tbl.member_id= tbl_borrow.userID  WHERE tbl_borrow.status='YES' AND loan_amount='0' AND tbl_borrow.id=:invid";
                 
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
                          <th colspan="5" style="text-align: center;color: red;font-size: 20px">Reference Number: <?php  echo $row->id;?></th>
                        </tr>


                        <tr>
                          <th>Fullname</th>
                          <td><?php  echo $row->fullname;?></td>
                          <th>PhoneNumber</th>
                          <td><?php  echo $row->phone;?></td>
                        </tr>
                        <tr>
                          <th>Amount Request</th>
                          <td><?php  echo $row->Amount;?></td>
                          <th>Date Payed</th>
                          <td class="font-w600">
                          <span class="badge badge-info"><?php  echo htmlentities($row->date_payed);?></span>
                        </td>
                        
                        </tr>




                        </tr>
                        <?php 
                       
                      } ?>
                     
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