<?php 
    include 'server/Database.php';
    include 'model/Chairmanship/ChairmanshipList.php';
?>

<?php include 'templates/header.php' ?>
    <title>BMS- Chairmanship</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Chairmanship</h1>
                      <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chairmanship</li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex  justify-content-between">
                            <h6 class="pt-2 m-0 font-weight-bold text-primary">Chairmanship</h6>
                                <button 
                                    type="button" 
                                    class="btn btn-outline-primary btn-sm" 
                                    data-toggle="modal" data-target="#addChairmanship">
                                 <i class="fas fa-plus"></i> Chairmanship
                                </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Title</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th></th>
                                    </tfoot>
                                    <tbody>
                                        <?php if (!empty($chair)): ?>
                                            <?php foreach($chair as $row): ?>
                                                <tr>
                                                    <td><?=$row['title'] ?></td>
                                                    <td><?=date("F j, Y - h:i:a", strtotime($row['created_at']))?></td>
                                                    <td><?=date("F j, Y - h:i:a", strtotime($row['updated_at']))?></td>
                                                    <td>
                                                       <button 
                                                            type="button" 
                                                            class="btn  btn-sm text-primary" 
                                                            data-toggle="modal" 
                                                            data-target="#editChairmanship"
                                                            onclick="viewChairmanship(this)"
                                                            data-id="<?=$row['id']?>"
                                                            data-title="<?=$row['title']?>">
                                                         <i class="fas fa-edit"></i> Edit
                                                        </button>

                                                        <button 
                                                            type="button" 
                                                            class="btn btn-sm text-danger"
                                                            data-target="#deleteChairmanship"
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
    include 'templates/Modal/ChairmanshipModal.php';
    include 'templates/footer.php';
?>