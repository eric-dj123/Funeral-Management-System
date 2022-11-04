<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">
                        <?php echo $_SESSION['firstname'] ." ". $_SESSION['lastname'];?>
                    </span>

                    <span class="text-secondary text-small">FMS</span>

                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        <!-- tearm -->
        <li class="nav-item">
            <a class="nav-link" href="manage_service.php">
                <span class="menu-title">Manage Service</span>
                <i class="mdi mdi-subway menu-icon"></i>
            </a>
        </li>
           
        <!-- end tearm -->
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Payment</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="manage_service_payment.php">Manage Payment</a></li>
                <li class="nav-item"> <a class="nav-link" href="report_payment_service_approve.php">Approved Payment</a></li>
                    <li class="nav-item"> <a class="nav-link" href="report_payment_service_canceled.php">Cancelled Canceled</a></li>
                    
                </ul>
            </div>
        </li>

        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Reports Payment</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-database menu-icon"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="payment_service_report.php">Payment reports</a></li>
                    <li class="nav-item"> <a class="nav-link" href="btndates_report.php">Btndates Reports</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>