<?php 
    include 'server/Database.php';

     if(!isset($_GET['id']) || empty($_GET['id'])) {
        header("location: 404.php");
    } else {
        $id = $_GET['id'];
        $query = [];
        $result = [];

        // permit
        $query['permit'] = "SELECT * FROM `permit` WHERE id=$id";
        $result['permit'] = $conn->query($query['permit']);
        $permit = $result['permit']->fetch_assoc();

        // officials
        $query['officials'] = "SELECT 
                                O.id AS id,
                                O.resident_id AS resident_id,
                                P.position AS position
                                FROM `officials` AS O
                                INNER JOIN position AS P ON O.position_id = P.id
                                WHERE O.status = 'Active' ORDER BY position";
        $result['officials'] = $conn->query($query['officials']);
        $officials = [];
        while($row = $result['officials']->fetch_assoc()) {
            array_push($officials, $row);
        }
        // official resident id
        $query['residents'] = "SELECT * FROM `residents`";
        $result['residents'] = $conn->query($query['residents']);
        $residents = [];
        while($row = $result['residents']->fetch_assoc()) {
            array_push($residents, $row);
        }

       // Merge officials with residents
        foreach($officials as &$official) { // Use reference to modify the original array
            foreach($residents as $resident) {
                if($official['resident_id'] == $resident['id']) {
                    $official['firstname'] = $resident['firstname'];
                    $official['middlename'] = $resident['middlename'];
                    $official['lastname'] = $resident['lastname'];
                    break; // Break inner loop once a match is found
                }
            }
            if($official['position'] == "Secretary") {
                $secretary = $official['firstname']. " " . substr($official['middlename'], 0, 1) . ". " .$official['lastname'];
            }
            if($official['position'] == "Captain") {
                $captain = $official['firstname']. " " . substr($official['middlename'], 0, 1) . ". " .$official['lastname'];
            }
        }
        unset($official); // Unset reference to avoid accidental modification later

        // Barangay Information
          $query['barangay_info'] = "SELECT * FROM `brgy_info` LIMIT 1";
          $result['barangay_info'] = $conn->query($query['barangay_info']);
          $barangay_info = $result['barangay_info']->fetch_assoc();
          if($barangay_info) {
              $path = "storage/barangay_img/";
              $city_logo = ($barangay_info['city_logo'] != null) ? $path.$barangay_info['city_logo'] : $path. "philippine_logo.png";
              $brgy_logo = ($barangay_info['brgy_logo'] != null) ? $path.$barangay_info['brgy_logo'] : $path. "philippine_logo.png";
          }
    }   
?>
<?php include 'templates/header.php' ?>

    <title>BMS- Generate Business Clearance</title>
    <style>
        @page {
            size: auto;
            margin: 21mm 20mm 20mm 20mm;
        }
        .header_border_container {
            height: 16px !important;
             z-index: 10 !important;
        }
        .header_border1, .header_border2 {
            height: 4px !important;
            width: 85%  !important;
            margin-bottom: 4px !important;
            border-radius: 3px;
            z-index: 10 !important;
        }
        .header_border1 {
            border: 2px solid blue !important;
            top: 0;
            left: 0;
        }
        .header_border2 {
             border: 2px solid red !important;
             bottom: 0;
             right: 0;
        }
        .header-border3 {
             height: 2px !important;
             width: 100% !important;
             border: 2px solid #555 !important;
        }
        .text-time {
          font-family: "Merriweather", serif;
          font-weight: 900;
          font-style: normal;
        }
    }
  </style>
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
                    <h1 class="h3 mb-0 text-gray-800">BUSINESS CLEARANCE</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="resident.php">Resident</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BUSINESS CLEARANCE</li>
                      </ol>
                    </nav>

                    <!-- Begin Page Inner -->
                    <div class="card overflow-auto mb-3">
                         <div class="card-header bg-white d-flex align-items-center justify-content-between" style="min-width: 1000px;">
                            <a onclick="history.go(-1)" class="btn"><i class="fas fa-arrow-left"></i></a> 
                            <button 
                                onclick="printDiv('printThis')" 
                                class="btn btn-primary btn-sm">
                                <i class="fa fa-print"></i> Print Certificate
                            </button>
                        </div>
                        <div class="card-body" id="printThis" style="min-width: 1000px;">
                            <div class="row m-1">
                                <div class="col-12">
                                    <div class="row d-flex align-items-end">
                                        <div class="col-3">
                                            <img src="<?=$city_logo?>" width="190" height="auto" alt="img" loading="eager" decoding="sync">
                                        </div>
                                        <div class="position-relative col-6 text-center">
                                            <img class="position-absolute"
                                                style="top: -8px; right: 0;" 
                                                src="storage/barangay_img/philippine_logo.png" width="120" height="120" alt="img" loading="eager" decoding="sync">
                                            <h5 class="mb-0">Republic of the Philippines</h5>
                                            <h5 class="mb-0">Province of <?=$barangay_info['province']?></h5>
                                            <?php if (stripos($barangay_info['town'], 'city') !== false): ?>
                                                <h5 class="mb-0"><?=$barangay_info['town']?></h5>
                                            <?php else: ?>
                                                <h5 class="mb-0">Municipality of <?=$barangay_info['town']?></h5>
                                            <?php endif; ?>
                                            <h5 class="mb-0">Barangay <b><u><?=$barangay_info['brgy_name']?></u></b></h5>
                                            <h5 class="mb-0"><b>OFFICE OF THE PUNONG BARANGAY</b></h5>
                                            <span><b>Mobile No. <i><?=$barangay_info['number']?></i></b></span>
                                        </div>
                                        <div class="col-3 text-right">
                                            <img src="<?=$brgy_logo?>" width="120" height="auto" alt="img" loading="eager" decoding="sync">
                                        </div>
                                    </div>
                                    <!-- Begin Double Border bottom -->
                                    <div class="mt-2 position-relative header_border_container">
                                        <div class="position-absolute header_border1"></div>
                                        <div class="position-absolute header_border2"></div>
                                    </div>
                                    <!-- End Double Border bottom -->
                                </div>
                                <div class="col-12 p-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <h4><u>OFFICE OF THE BARANGAY CAPTAIN</u></h4>
                                            </div>
                                            <div class="text-center">
                                                <h3 style="font-size:38px;color:darkblue"><b>BARANGAY BUSINESS CLEARANCE</b></h3>
                                            </div>
                                            <h5 class="mt-5"><b>GRANTED TO:</b></h5>
                                            <div class="text-center pt-4">
                                                <h3 class="mt-4 mb-0"><b><?=$permit['owner']?></b></h3>
                                                <hr class="mt-0 mb-0" style="border-top: 2px solid #333; width: 25rem;">
                                                <h5 class="mt-0">NAME OF BUSINESS OR ESTABLISHMENT</h5>
                                            </div>
                                            <div class="text-center pt-4 mb-5">
                                                <h3 class="mt-4 mb-0"><b><?=$permit['name']?></b></h3>
                                                <hr class="mt-0 mb-0" style="border-top: 2px solid black;width: 25rem;">
                                                <h5 class="mt-0">NAME OF BUSINESS OR ESTABLISHMENT</h5>
                                            </div>
                                            <h5 class="mt-5" style="text-indent: 40px;">This clearance is granted in
                                                accordance with section 152 of R.A. 7160 of Barangay Tax Ordinance,
                                                provided however, that the necessary fees are paid to the Barangay
                                                Treasurer.</h5>
                                            <h5 
                                                class="mt-3" 
                                                style="text-indent: 40px;">This is non-transferable and
                                                shall be deemed null and void upon failure by the owner to follow the
                                                said rules and regulations set forth by the Local Government Unit of
                                                <span style="font-size:22px"><?=$barangay_info['town']?>.</h5>
                                            <h5 class="mt-5">Given this <b><?=date("F j, Y")?> </b> at <b>BRGY <?=$barangay_info['brgy_name'] . ", " .$barangay_info['town']?>.</b></h5>
                                        </div>
                                        <div class="col-12">
                                            <div class="p-3 text-right mr-5">
                                                <h3 class=" mb-0 text-uppercase"><b><?=$captain?></b></h3>
                                                <p>PUNONG BARANGAY</p>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-4">
                                            <h5 class="mb-0"><i>CTC No.</i>:_____________</h5>
                                            <h5 class="mb-0"><i>Issued On.</i>:_____________</h5>
                                            <h5 class="mb-0"><i>Isuued at. <b>BRGY <?=$barangay_info['brgy_name'] . ", " .$barangay_info['town']?></b></i>:</h5>
                                            <h5 class="mb-0"><i>OR No.</i>:_____________</h5>
                                        </div>
                                        <p class="ml-3"><i>(This permit, while in force, shall be posted in a conspicious place in the business premises.)</i></p>
                                    </div>
                               
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Inner -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<?php 
 include 'templates/footer.php';
?>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>