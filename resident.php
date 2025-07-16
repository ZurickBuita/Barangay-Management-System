<?php 
    include 'server/Database.php';
    include 'model/Resident/ResidentList.php';
    include 'model/DashboardModel.php'; 
?>
<?php include 'templates/header.php' ?>

    <title>BMS- Residents</title>

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
                    <h1 class="h3 mb-0 text-gray-800">Residents</h1>
                    <!-- Breadcrumb -->
                     <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Residents</li>
                      </ol>
                    </nav>

                       <!-- Content Row -->
                    <div class="row">

                        <!-- Total Male -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Male</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$results['male'];?></div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Female</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$results['female'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Resident -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Resident
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$results['total_resident'];?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Registered Voters -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Registered Voters</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$results['total_voters'];?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fingerprint fa-2x text-gray-300"></i>
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
                          <h6 class="pt-2 m-0 font-weight-bold text-primary">Residents</h6>
                          <div>
                            <button 
                                type="button" 
                                class="btn btn-outline-primary btn-sm" 
                                data-toggle="modal" data-target="#addResident">
                             <i class="fas fa-plus"></i> Resident
                            </button>
                            <a href="model/Resident/ExportResident.php" class="btn btn-outline-success btn-sm"><i class="fa fa-file"></i> Export CSV</a>
                          </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Image</th>
                                            <th>Fullname</th>
                                            <th>National ID</th>
                                            <th>Age</th>
                                            <th>Civil Status</th>
                                            <th>Sex</th>
                                            <th>Purok</th>
                                            <th>Voter</th>
                                            <th>Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Image</th>
                                        <th>Fullname</th>
                                        <th>National ID</th>
                                        <th>Age</th>
                                        <th>Civil Status</th>
                                        <th>Sex</th>
                                        <th>Purok</th>
                                        <th>Voter</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tfoot>
                                    <tbody>
                                    <?php if(!empty($resident)): ?>
                                        <?php foreach($resident as $row): ?>
                                        <?php $badge = $row['is_voter'] == 'no' ? 'badge-info' : 'badge-primary'?>
                                        <?php 
                                            $avatar = ($row['sex'] == "male") ? "undraw_profile.svg" : "undraw_profile_3.svg";
                                            $img = ($row['img'] == null) ? "img/". $avatar : "storage/resident_img/". $row['img'] 
                                        ?>
                                            <tr>
                                                <td>
                                                <img class="sidebar-card-illustration mb-2" src="<?=$img?>" width="50" height="50" alt="avatar" loading="lazy" decoding="asynchronous">
                                                </td>
                                                <td><?= ucwords($row['lastname'].', '.$row['firstname'].' '.$row['middlename']) ?></td>
                                                 <td><?= $row['national_id'] ?></td>
                                                <td><?= $row['age'] ?></td>
                                                <td><?= ucwords($row['civilstatus']) ?></td>
                                                <td><?= ucwords($row['sex']) ?></td>
                                                <td><?= $row['purok'] ?></td>
                                                <td>
                                                    <span class="badge <?=$badge?>">
                                                        <?=ucwords($row['is_voter'])?>
                                                    </span>
                                                </td>
                                                <td><?=date("F j, Y", strtotime($row["created_at"]))?></td>
                                                <td>
                                                <div class="dropdown">
                                                  <button 
                                                        class="btn" 
                                                        type="button" 
                                                        data-toggle="dropdown" 
                                                        aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                  </button>
                                                  <div class="dropdown-menu">
                                                    <button 
                                                        type="button" 
                                                        class="dropdown-item p2-1 text-primary" 
                                                        data-toggle="modal" 
                                                        data-target="#editResident"
                                                        onclick="viewResident(this)"
                                                        data-id="<?=$row['id']?>"
                                                        data-national_id="<?=$row['national_id']?>"
                                                        data-citizenship="<?=$row['citizenship']?>"
                                                        data-firstname="<?=$row['firstname']?>"
                                                        data-middlename="<?=$row['middlename']?>"
                                                        data-lastname="<?=$row['lastname']?>"
                                                        data-birthdate="<?=$row['birthdate']?>"
                                                        data-age="<?=$row['age']?>"
                                                        data-civilstatus="<?=$row['civilstatus']?>"
                                                        data-sex="<?=$row['sex']?>"
                                                        data-is_voter="<?=$row['is_voter']?>"
                                                        data-email="<?=$row['email']?>"
                                                        data-occupation="<?=$row['occupation']?>"
                                                        data-address="<?=$row['address']?>"
                                                        data-is_deceased="<?=$row['is_deceased']?>"
                                                        data-purok_id="<?=$row['purok_id']?>"
                                                        data-is_indigenous="<?=$row['is_indigenous']?>"
                                                        data-salary="<?=$row['salary']?>">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button 
                                                        type="button"
                                                        class="dropdown-item p2-1 text-danger"
                                                        data-target="#deleteResident" 
                                                        data-id="<?=$row['id']?>"><i class="fas fa-trash"></i> Delete
                                                    </button>
                                                    <a 
                                                        class="dropdown-item p2-1 text-secondary" 
                                                        href="GenerateCertificateOfIndigency.php?id=<?=$row['id']?>"><i class="fas fa-file"></i> Certificate of Indigency
                                                    </a>
                                                    <a 
                                                        class="dropdown-item p2-1 text-secondary" 
                                                        href="GenerateBarangayCertificate.php?id=<?=$row['id']?>"><i class="fas fa-file"></i>
                                                    Barangay Clearance
                                                    </a>
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
    include 'templates/Modal/ResidentModal.php';
    include 'templates/footer.php';
?>