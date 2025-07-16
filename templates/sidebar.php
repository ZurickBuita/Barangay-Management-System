
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <img 
                        class="rounded-circle" 
                        src="storage/barangay_img/<?php echo htmlspecialchars($_SESSION['brgy_logo']); ?>"
                        width="60"
                        height="60">
                </div>
                <div class="sidebar-brand-text mx-1">BMS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Barangay Official -->
            <li class="nav-item">
                <a class="nav-link py-2 px-3" href="officials.php">
                    <i class="fas fa-user-tie"></i>
                    <span>Barangay Officials</span></a>
            </li>
            <!-- Nav Item - Resident Information -->
            <li class="nav-item">
                <a class="nav-link py-2 px-3" href="resident.php">
                    <i class="fa fa-users"></i>
                    <span>Residents</span></a>
            </li>

            <!-- Nav Item - Business Clearance -->
            <li class="nav-item">
                <a class="nav-link py-2 px-3" href="business_permit.php">
                    <i class="fa fa-file"></i>
                    <span>Business Clearance</span></a>
            </li>

            <!-- Nav Item - Revenue -->
            <li class="nav-item">
                <a class="nav-link py-2 px-3" href="revenue.php">
                    <i class="fas fa-dollar-sign"></i>
                    <span>Revenue</span></a>
            </li>

             <!-- Nav Item - Blotter -->
            <li class="nav-item">
                <a class="nav-link py-2 px-3" href="blotter.php">
                    <i class="fa fa-file"></i>
                    <span>Blotter</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                System
            </div>
             <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" data-toggle="modal" data-target="#editBarangayInfo">Barangay Info</a>
                        <a class="collapse-item" href="purok.php">Purok</a>
                        <a class="collapse-item" href="position.php">Positions</a>
                        <a class="collapse-item" href="officialTerm.php">Official Term</a>
                        <a class="collapse-item" href="chairmanship.php">Chairmanship</a>
                        <a class="collapse-item" href="users.php">Users</a>
                        <a class="collapse-item" href="backup/backup.php">Backup</a>
                        <a class="collapse-item" href="#restore" data-toggle="modal">Restore</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->