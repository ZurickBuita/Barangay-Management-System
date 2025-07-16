    <?php 
    include 'server/Database.php';
    include 'model/Business Clearance/BusinessClearanceList.php';
?>
<?php include 'templates/header.php' ?>

    <title>BMS- Business Permit</title>

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
                    <h1 class="h3 mb-0 text-gray-800">Business Clearance</h1>
                    <!-- Breadcrumb -->
                     <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Business Clearance</li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex  justify-content-between">
                            <h6 class="pt-2 m-0 font-weight-bold text-primary">Business Clearance</h6>
                            <button 
                                type="button" 
                                class="btn btn-outline-primary btn-sm" 
                                data-toggle="modal" data-target="#addBusinessClearance">
                             <i class="fas fa-plus"></i> Business Clearance
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Name of Business</th>
                                            <th>Business Owner</th>
                                            <th>Nature</th>
                                            <th>Date Applied</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Name of Business</th>
                                        <th>Business Owner</th>
                                        <th>Nature</th>
                                        <th>Date Applied</th>
                                        <th></th>
                                    </tfoot>
                                    <tbody>
                                        <?php if (!empty($rows)): ?>
                                            <?php foreach($rows as $row): ?>
                                                <tr>
                                                    <td><?= ucwords($row['name']) ?></td>
                                                    <td><?=ucwords($row['owner'])?></td>
                                                    <td><?= $row['nature'] ?></td>
                                                    <td><?= date('F j, Y', strtotime($row['applied'])) ?></td>
                                                    <td>
                                                        <div class="dropdown">
                                                          <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                                                          <div class="dropdown-menu">
                                                            <button 
                                                                data-toggle="modal"
                                                                class="dropdown-item p2-1 text-primary"
                                                                data-target="#editBusinessClearance"
                                                                onclick="viewPermit(this)"
                                                                data-id="<?=$row['id']?>"
                                                                data-name="<?=$row['name']?>"
                                                                data-owner="<?=$row['owner']?>"
                                                                data-nature="<?=$row['nature']?>"
                                                                data-applied="<?=$row['applied']?>">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <button
                                                                class="dropdown-item p2-1 text-danger"
                                                                data-target="#deleteBusinessClearance"
                                                                data-id="<?=$row['id']?>">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                            <a class="dropdown-item p2-1 text-secondary" href="GenerateBusinessClearance.php?id=<?=$row['id']?>"><i class="fas fa-file"></i> Generate PDF</a>
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

<!-- Modal -->
<?php include 'templates/Modal/BusinessClearanceModal.php';?>
<?php include 'templates/footer.php' ?>