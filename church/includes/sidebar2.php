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
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
             
               
        </li>
        <?php echo $_SESSION['email'];?>
        <li class="nav-item">
            <a class="nav-link" href="dashboard2.php">
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
                    <li class="nav-item"> <a class="nav-link" href="new_advantist_request.php">New Request</a></li>
                    
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Reports FeedBack</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-database menu-icon"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="feedback_advantist_report.php">FeedBack reports</a></li>
                  
                </ul>
            </div>
        </li>


    </ul>
</nav>
