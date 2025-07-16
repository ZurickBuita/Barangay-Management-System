<?php 
    include 'server/Database.php';
    include 'model/officials/OfficialList.php';
?>
<?php include 'templates/header.php' ?>

    <title>BMS- Officials</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Barangay Officials</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barangay Officials</li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex  justify-content-between">
                            <h6 class="pt-2 m-0 font-weight-bold text-primary">Barangay Officials</h6>
                            <button 
                                type="button" 
                                class="btn btn-outline-primary btn-sm" 
                                data-toggle="modal" data-target="#addOfficial">
                             <i class="fas fa-plus"></i> Official
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Fullname</th>
                                            <th>Chairmanship</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Term</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Fullname</th>
                                        <th>Chairmanship</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Term</th>
                                        <th></th>
                                    </tfoot>
                                    <tbody>
                                        <?php if (!empty($official)): ?>
                                            <?php foreach($official as $row): ?>
                                            <?php 
                                                $badge = $row['status'] == 'Active' ? 'bg-primary' : 'bg-info';
                                            ?>
                                             <tr>
                                                <td>
                                                    <?php foreach($residents as $res): ?>
                                                        <?php if($row['resident_id'] == $res['id']): ?>
                                                            <?= ucwords($res['lastname'].', '.$res['firstname'].' '.$res['middlename']) ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                </td>
                                                <td><?=$row['chairmanship']?></td>
                                                <td><?=$row['position']?></td>
                                                <td>
                                                    <span class="badge <?=$badge?> text-light"><?=$row['status']?></span>
                                                </td>
                                                <td><?=date("F Y", strtotime($row['start_term'])) . '-' . date("F Y", strtotime($row['end_term']))?></td>
                                                <td>
                                                    <button 
                                                        type="button" 
                                                        class="btn  btn-sm text-primary" 
                                                        data-toggle="modal" 
                                                        data-target="#editOfficial"
                                                        onclick="viewOfficial(this)"
                                                        data-id="<?=$row['id']?>"
                                                        data-status="<?=$row['status']?>"
                                                        data-chairmanship_id="<?=$row['chairmanship_id']?>"
                                                        data-position_id="<?=$row['position_id']?>"
                                                        data-term_id="<?=$row['term']?>"
                                                        data-resident_id="<?=$row['resident_id']?>">
                                                     <i class="fas fa-edit"></i> Edit
                                                    </button>

                                                    <button 
                                                        type="button" 
                                                        class="btn btn-sm text-danger"
                                                        data-target="#deleteOfficial"
                                                        data-id="<?=$row['id']?>">
                                                     <i class="fas fa-trash"></i> Delete
                                                    </button>
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
 include 'templates/Modal/OfficialModal.php';
 include 'templates/footer.php';
?>