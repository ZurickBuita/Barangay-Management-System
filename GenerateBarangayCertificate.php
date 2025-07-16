<?php 
    include 'server/Database.php';

    if(!isset($_GET['id']) || empty($_GET['id'])) {
        header("location: 404.php");
    } else {
        $id = $_GET['id'];
        $query = [];
        $result = [];
        // resident
        $query['resident'] = "SELECT * FROM `residents` WHERE id=$id LIMIT 1";
        $result['resident'] = $conn->query($query['resident']);
        $resident = $result['resident']->fetch_assoc();
        $resident_fullname = ucwords($resident['firstname']. " ". substr($resident['middlename'], 0, 1). '. ' .$resident['lastname']);

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

    <title>BMS- Generate Barangay Certificate</title>
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
                    <h1 class="h3 mb-0 text-gray-800">Barangay Certificate</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb bg-transparent m-0 mb-3 p-0">
                        <li class="breadcrumb-item"><a href="dashboard.php"> <i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="resident.php">Resident</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barangay Certificate</li>
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
                                <div class="col-12">
                                    <div class="row pt-4 pb-2">
                                        <div class="col-3 text-center px-2 py-3" style="border:2px dotted #555">
                                            <h6 class="text-danger text-nowrap m-0">BARANGAY OFFICIALS</h6>

                                            <?php if(!empty($officials)): ?>
                                                <?php foreach($officials as $row): ?>
                                                    <?php
                                                        $fullname = $row['firstname']. " " . substr($row['middlename'], 0, 1) . ". " .$row['lastname'];
                                                    ?>
                                                    <h6 class="mt-3 fw-bold mb-0 text-uppercase text-primary"><i>HON. <?=$fullname?></i></h6>
                                                    <h6 class="mb-2 text-uppercase"><b><?=$row['position']?></b></h6>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </div>
                                        <div class="col-9">
                                            <div class="row px-4">
                                                <div class="col-12 text-center">
                                                    <h6>OFFICE OF THE BARANGAY CAPTAIN</h6>
                                                    <h2><b>BARANGAY CLEARANCE</b></h2>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="mt-5 text-justify">TO WHOM IT MAY CONCERN:</h5>
                                                    <h5 class="mt-3 text-justify" style="text-indent: 40px;">This is to certify that <b><?=$resident_fullname?></b>, is a permanent resident of BRGY <b><?=$barangay_info['brgy_name']?></b> and that he/she is known to me to be of good moral character.</h5>
                                                    <h5 class="mt-3 text-justify" style="text-indent: 40px;">This certification/clearance is hereby issued to the above-named person for whatever legal purpose it may serve him/her best.</h5>
                                                    <h5 class="mt-3 text-justify">Given this <b><?=date('F j, Y')?></b>.</h5>
                                                </div>
                                                <div class="col-12"  style="margin-top: 15em;">
                                                    <h5>NOT VALID WITHOUT SEAL:</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6"></div>
                                        <div class="col-6 d-flex justify-content-end text-uppercase">
                                            <div>
                                                <h4><?=$captain?></h4>
                                                <h6 class="text-center">PUNONG BARANGAY</h6>
                                            </div>
                                        </div>
                                         <div class="col-6 d-flex justify-content-start text-uppercase">
                                            <div>
                                                <h4><?=$secretary?></h4>
                                                <h6 class="text-center">BARANGAY SECRETARY</h6>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex flex-wrap justify-content-end">
                                             <div class="p-3 text-center">
                                                <div class="border mb-3" style="height:150px;width:290px">
                                                    <p class="mt-5 mb-0 pt-5">Right Thumb Mark</p>
                                                </div>
                                                <h4 class="text-uppercase"><?=$resident_fullname?></h4>
                                                <p>Tax Payer's Signature</p>
                                            </div>
                                        </div>
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