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
                  $sql="SELECT tblbooking.BookingID,tblbooking.Name,tblbooking.MobileNumber,tblbooking.Email,tblbooking.EventDate,tblbooking.EventStartingtime,tblbooking.EventEndingtime,tblbooking.VenueAddress,tblbooking.EventType,tblbooking.AdditionalInformation,tblbooking.BookingDate,tblbooking.Remark,tblbooking.Status,tblbooking.UpdationDate,tblservice.ServiceName,tblservice.SerDes,tblservice.ServicePrice from tblbooking join tblservice on tblbooking.ServiceID=tblservice.ID  where tblbooking.ID=:invid";
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
                          <th colspan="5" style="text-align: center;color: red;font-size: 20px">Booking Number: <?php  echo $row->BookingID;?></th>
                        </tr>


                        <tr>
                          <th>Name of Client</th>
                          <td><?php  echo $row->Name;?></td>
                          <th>Mobile Number</th>
                          <td><?php  echo $row->MobileNumber;?></td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td><?php  echo $row->Email;?></td>
                          <th>Event Date</th>
                          <td><?php  echo $row->EventDate;?></td>
                        </tr>


                        <tr>
                          <th style="text-align: center;" colspan="2">Service Name</th>
                          <th style="text-align: center;" colspan="2">Service Price</th>
                        </tr>
                        <tr>
                          <td style="text-align: center;" colspan="2"><?php  echo $row->ServiceName;?></td>
                          <td style="text-align: center;" colspan="2"><?php  echo $total= $row->ServicePrice;?></td>

                        </tr>
                        <?php 
                        $grandtotal+=$total;
                        $cnt=$cnt+1;
                      } ?>
                      <tr>
                        <th colspan="2" style="text-align:center;color: blue">Grand Total </th>
                        <td colspan="2" style="text-align: center;"><?php  echo $grandtotal;?></td>
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