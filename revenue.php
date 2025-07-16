<?php 
    include 'server/Database.php';
    include 'model/RevenueModel.php';
?>
<?php include 'templates/header.php' ?>

<title>BMS- Barangay Revenues</title>

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
                    <h1 class="h3 mb-0 text-gray-800">Barangay Revenues</h1>
                     <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Revenues</li>
                      </ol>
                    </nav>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="pt-2 m-0 font-weight-bold text-primary">Revenue Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12 text-right">
                                    <a type="button" class="text-danger" onclick="reset()"><b>Reset</b></a>
                                </div>
                                <div class="col">
                                    <label>Minimum Date</label>
                                    <input type="date" class="form-control" placeholder="Enter date" id="min" onchange="filterByMinDate()">
                                </div>
                                <div class="col">
                                    <label>Maximum Date</label>
                                    <input type="date" class="form-control" placeholder="Enter date" id="max" onchange="filterByMaxDate()">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-nowrap">
                                        <tr>
                                            <th>Recipient</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Username</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Recipient</th>
                                            <th>Details</th>
                                            <th>Amount</th>
                                            <th>Username</th>
                                            <th>Created At</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php if (!empty($revenue)): ?>
                                        <?php foreach ($revenue as $row): ?>
                                            <tr>
                                                <td><?= htmlspecialchars($row['name']) ?></td>
                                                <td><?= htmlspecialchars($row['details']) ?></td>
                                                <td>₱<?= number_format($row['amounts'], 2) ?></td>
                                                <td><?= htmlspecialchars($row['user']) ?></td>
                                                <td><?= date("Y-m-d", strtotime($row["created_at"])) ?></td>
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

            <?php include 'templates/footer.php' ?>
            
            <script>
                function filterByMinDate() {
                  const minDateInput = document.getElementById('min').value;
                  const rows = document.querySelectorAll('#dataTable tbody tr');

                  if (!minDateInput) {
                    // If no min date set, show all rows without filtering by min
                    rows.forEach(row => {
                      row.style.display = '';
                    });
                    return;
                  }
                  const minDate = new Date(minDateInput);
                  rows.forEach(row => {
                    const dateCellText = row.cells[4].textContent.trim();
                    const rowDate = new Date(dateCellText);
                    if (rowDate >= minDate) {
                      row.style.display = '';
                    } else {
                      row.style.display = 'none';
                    }
                  });
                }

                function filterByMaxDate() {
                  const maxDateInput = document.getElementById('max').value;
                  const rows = document.querySelectorAll('#dataTable tbody tr');
                  if (!maxDateInput) {
                    // If no max date set, show all rows without filtering by max
                    rows.forEach(row => {
                      row.style.display = '';
                    });
                    return;
                  }
                  const maxDate = new Date(maxDateInput);
                  rows.forEach(row => {
                    const dateCellText = row.cells[4].textContent.trim();
                    const rowDate = new Date(dateCellText);
                    if (rowDate <= maxDate) {
                      row.style.display = '';
                    } else {
                      row.style.display = 'none';
                    }
                  });
                }
                
                function reset() {
                    document.getElementById('min').value = '';
                    document.getElementById('max').value = '';

                    filterByMinDate();
                    filterByMaxDate();
                }
            </script>
        </div>
    </div>
</body>
</html>
