<?php 
    include 'server/Database.php';
    include 'model/Blotter/BlotterList.php'; 
?>
<?php include 'templates/header.php' ?>

    <title>BMS- Blotter</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'templates/sidebar.php' ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include 'templates/navbar.php' ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                     <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800">Blotter</h1>
                     <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blotter</li>
                      </ol>
                    </nav>

                       <!-- Content Row -->
                    <div class="row">

                        <!-- Total Male -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Active Case</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$results['active_case'];?></div>
                                            <span class="text-gray-500">Total number of active case</span>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Settled Case</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$results['settled_case'];?></div>
                                            <span class="text-gray-500">Total number of settled case</span>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-flag fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Resident -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Scheduled Case
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$results['scheduled_case'];?></div>
                                                </div>
                                            </div>
                                            <span class="text-gray-500">Total number of scheduled case</span>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex  justify-content-between">
                          <h6 class="pt-2 m-0 font-weight-bold text-primary">Blotter/Incident</h6>
                          <div>
                               <button 
                                    type="button" 
                                    class="btn btn-outline-primary btn-sm" 
                                    data-toggle="modal" data-target="#addBlotter">
                                 <i class="fas fa-plus"></i> Blotter/Incident
                                </button>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Complainant</th>
                                            <th>Respondent</th>
                                            <th>Victim(s)</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                      <tr>
                                        <th>Complainant</th>
                                        <th>Respondent</th>
                                        <th>Victim(s)</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th></th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php if(!empty($blotter)): ?>
                                            <?php foreach($blotter as $row): ?>
                                                <?php
                                                    $color;
                                                    switch ($row['status']) {
                                                        case 'Active':
                                                            $color = "primary";
                                                            break;
                                                        case 'Scheduled':
                                                            $color = "info";
                                                            break;
                                                        case 'Settled':
                                                            $color = "success";
                                                            break;
                                                    }
                                                ?>
                                                <tr>
                                                    <td><?=$row["complainant"]?></td>
                                                    <td><?=$row["respondent"]?></td>
                                                    <td><?=$row["victim"]?></td>
                                                    <td>
                                                        <span class="badge badge-<?=$color?>"><?=$row["status"]?></span>
                                                    </td>
                                                    <td><?=date("F j, Y - h:i:a", strtotime($row["created_at"]))?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                          <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                          <div class="dropdown-menu">
                                                            <button 
                                                                data-toggle="modal"
                                                                class="dropdown-item p2-1 text-primary"
                                                                data-target="#editBlotter"
                                                                onclick="viewBlotter(this)"
                                                                data-id="<?=$row['id']?>"
                                                                data-complainant="<?=$row['complainant']?>"
                                                                data-respondent="<?=$row['respondent']?>"
                                                                data-victim="<?=$row['victim']?>"
                                                                data-status="<?=$row['status']?>"
                                                                data-type="<?=$row['type']?>"
                                                                data-date="<?=$row['date']?>"
                                                                data-time="<?=$row['time']?>"
                                                                data-location="<?=$row['location']?>"
                                                                data-details="<?=$row['details']?>">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <button
                                                                class="dropdown-item p2-1 text-danger"
                                                                data-target="#deleteBlotter"
                                                                data-id="<?=$row['id']?>">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                            <a class="dropdown-item p2-1 text-secondary" href="GenerateBlotterReport.php?id=<?=$row['id']?>"><i class="fas fa-file"></i> Generate PDF</a>
                                                          </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php 
    include 'templates/Modal/BlotterModal.php';
    include 'templates/footer.php';
?>
