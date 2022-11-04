 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <?php
           
                    ?>
                    <a href="#" class="nav-link">
                        <div class="nav-profile-image">
                            
                        </div>
                        <div class="nav-profile-text d-flex flex-column">
                            <span class="font-weight-bold mb-2"></span>
                            
                        </div>
                        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                    </a>
                    <?php 
                
            ?>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

      
       
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Request Prayer</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-archive menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="new_bookings.php">New Request</a></li>
                    <li class="nav-item"> <a class="nav-link" href="approved_bookings.php">Approved Proved</a></li>
                    <li class="nav-item"> <a class="nav-link" href="cancelled_bookings.php">Cancelled Canceled</a></li>
                </ul>
            </div>
        </li>
        

    </ul>
</nav>