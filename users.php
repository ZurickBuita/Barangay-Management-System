<?php 
    include 'server/Database.php';
    include 'model/Users/UserList.php';
?>

<?php include 'templates/header.php' ?>
    <title>BMS- Users</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Users</h1>
                       <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex  justify-content-between">
                            <h6 class="pt-2 m-0 font-weight-bold text-primary">Users</h6>
                             <button 
                                type="button" 
                                class="btn btn-outline-primary btn-sm" 
                                data-toggle="modal" data-target="#addUser">
                             <i class="fas fa-plus"></i> User
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Username</th>
                                            <th>User Type</th>
                                            <th>Created At</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Username</th>
                                        <th>User Type</th>
                                        <th>Created At</th>
                                        <th></th>
                                    </tfoot>
                                    <tbody>
                                        <?php if(!empty($users)): ?>
                                            <?php foreach($users as $row): ?>
                                            <?php $badge = $row['user_type'] == 'staff' ? 'badge-info' : 'badge-primary'?>
                                             <?php $img = ($row['avatar'] == null) ? "img/undraw_profile.svg" : "storage/user_img/". $row['avatar'] ?>
                                                <tr>
                                                    <td>
                                                         <img class="sidebar-card-illustration mb-2" src="<?=$img?>" width="40" height="40" alt="avatar" loading="lazy" decoding="asynchronous">
                                                        <?=$row["username"]?></td>
                                                    <td>
                                                        <span class="badge <?=$badge?>"><i class="fas fa-user"></i>&nbsp;<?=ucwords($row["user_type"])?>
                                                        </span>
                                                    </td>
                                                    <td><?=date("F j, Y - H:m:a", strtotime($row["created_at"]))?></td>
                                                    <td>
                                                        <button 
                                                            type="button" 
                                                            class="btn btn-sm text-danger"
                                                            data-target="#deleteUser"
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
    include 'templates/Modal/UserModal.php';
    include 'templates/footer.php';
?>