<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>QR Code Scanner</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/header.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php
            include './wrappers/header.php';
        ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper main-body-container" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="start-class">
                                <h2 class="box-title">Scan Your QR Code here for the attendance:</h2>
                                <button id="startClass" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-info">Start Attendance</button>
                                <button id="stopClass" data-bs-toggle="modal" data-bs-target="#stopModal" class="btn btn-danger">Stop Attendance</button>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="box-title">Scan from WebCam:</h3>
                                    <div>
                                        <b>Device has camera: </b>
                                        <span id="cam-has-camera"></span>
                                        <br>
                                        <video style="display: none;" id="qr-video"></video>
                                        <br>
                                    </div>
                                    <br>
                                    <button id="start-button" class="btn btn-success">Start Scanning</button>
                                    <button id="stop-button" class="btn btn-warning stop-button">Stop Scanning</button>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="box-title">Student Details:</h3>
                                    <h3>
                                        <b>Detected QR code ID: </b>
                                        <span id="cam-qr-result">No QR Code found</span>
                                    </h3>
                                    <h3>
                                        <b>Student Name: </b>
                                        <span id="studentName"></span>
                                    </h3>
                                    <h3>
                                        <b>Time In: </b>
                                        <span id="timeIn"></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include './wrappers/footer.php' ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <?php include './wrappers/startAttendance.php'; ?>
    <?php include './wrappers/stopAttendance.php'; ?>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <script type="module" src="js/index.js"></script>
    <script>
        let reloadPage = false;
        $('#addModal').on('hidden.bs.modal', function () {
            if (reloadPage) {
                location.reload();
            }
        });
        $('#stopModal').on('hidden.bs.modal', function () {
            if (reloadPage) {
                location.reload();
            }
        });
        // get all section
        $.ajax({
                type: "POST",
                url: './js/ajax/sections/getAll.php',
                success: function(response)
                {
                    $('#section').append(response);
                }
        });
        
        $('#section').change(function () {
            // get all schedule
            $.ajax({
                    type: "POST",
                    url: './js/ajax/schedule/getAllSchedule.php',
                    data: {sectionId: $('#section').val()},
                    success: function(response)
                    {
                        $('#schedule').html(response);
                        $('#schedContainer').attr('style', 'display: block');
                    }
            });
        });
        $.ajax({
                type: "POST",
                url: './js/ajax/isAttendanceStarted.php',
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData && jsonData.attendanceStarted) {
                        $('#start-button').css('display', '');
                        $('#stop-button').css('display', '');
                        $('#startClass').css('display', 'none');
                        $('#stopClass').css('display', '');
                    } else {
                        $('#start-button').css('display', 'none');
                        $('#stop-button').css('display', 'none');
                        $('#startClass').css('display', '');
                        $('#stopClass').css('display', 'none');
                    }
            }
        });
        $('#addForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: './js/ajax/startAttendance.php',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);
                        $('#successAlert').addClass('d-none');
                        $('#errorAlert').addClass('d-none');
                        if (jsonData && jsonData.success) {
                            $('#addForm')[0].reset();
                            $('#successAlert').removeClass('d-none');
                            reloadPage = true;
                        } else {
                            $('#errorAlert').removeClass('d-none');
                        }
                }
            });
            
        });
        $('#stopForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                    type: "POST",
                    url: './js/ajax/stopAttendance.php',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);
                        $('#successAlertStop').addClass('d-none');
                        $('#errorAlertStop').addClass('d-none');
                        if (jsonData && jsonData.success) {
                            $('#addForm')[0].reset();
                            $('#successAlertStop').removeClass('d-none');
                            reloadPage = true;
                        } else {
                            $('#errorAlertStop').removeClass('d-none');
                        }
                }
            });
            
        });
    </script>
</body>
</html>
