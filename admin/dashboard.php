<?php session_start(); ?>
<?php
    include '../db/connection.php';
    $result = $mysqli -> query("SELECT * FROM sections");
    $totalSections = mysqli_num_rows($result);
    $result = $mysqli -> query("SELECT * FROM schedules");
    $totalSubjects = mysqli_num_rows($result);
    $result = $mysqli -> query("SELECT * FROM students");
    $totalStudents = mysqli_num_rows($result);
    $result = $mysqli -> query("SELECT * FROM teachers");
    $totalTeachers = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>QR Code Scanner</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="../plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="../css/style.min.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
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
            include '../wrappers/header-admin.php';
            include '../wrappers/admin-sidenav.php';
        ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div id="tests" class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Students</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-success"><?php echo $totalStudents; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Sections</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash2"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-purple"><?php echo $totalSections; ?></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Subjects</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash3"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?php echo $totalSubjects; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title">Total Teachers</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <li>
                                    <div id="sparklinedash4"><canvas width="67" height="30"
                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                    </div>
                                </li>
                                <li class="ms-auto"><span class="counter text-info"><?php echo $totalTeachers; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- YEARLY ATTENDANCE STATUS -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-3"><h3 class="box-title">Attendance Yearly Chart</h3></div>
                                <div class="col-md-9">
                                    <ul class="list-inline d-flex ms-auto justify-content-end">
                                        <li class="ps-3">
                                            <h5><i class="fa fa-circle me-1 text-info"></i>Present</h5>
                                        </li>
                                        <li class="ps-3">
                                            <h5><i class="fa fa-circle me-1 text-inverse"></i>Absent</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex ms-auto">
                                    <div class="ps-3"><h4 style="margin-top: 5px;">Select Year:</h4></div>
                                    <div class="ps-3">
                                        <select class="form-control" name="yearChart" id="yearChart" onChange="dashboard(this.value)">
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="ct-visits" style="height: 405px;">
                                <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span
                                        class="chartist-tooltip-value">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include '../wrappers/footer.php' ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/app-style-switcher.js"></script>
    <script src="../plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="../plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="../plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../js/pages/dashboards/dashboard1.js"></script>
    <script>
        /*
        Template Name: Admin Pro Admin
        Author: Wrappixel
        Email: niravjoshi87@gmail.com
        File: js
        */
        let present = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        let absent = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        const date = new Date();
        const currentYear = date.getFullYear();
        $(function () {
            "use strict";
            
            // ============================================================== 
            // Newsletter
            // ============================================================== 

            //ct-visits
            
            var sparklineLogin = function () {
                $('#sparklinedash').sparkline([0, 5, 6, 10, 9, 12, 4], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#7ace4c'
                });
                $('#sparklinedash2').sparkline([0, 5, 6, 10, 9, 12, 4], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#7460ee'
                });
                $('#sparklinedash3').sparkline([0, 5, 6, 10, 9, 12, 4], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#11a0f8'
                });
                $('#sparklinedash4').sparkline([0, 5, 6, 10, 9, 12, 4], {
                    type: 'bar',
                    height: '30',
                    barWidth: '4',
                    resize: true,
                    barSpacing: '5',
                    barColor: '#f33155'
                });
            }
            var sparkResize;
            $(window).on("resize", function (e) {
                clearTimeout(sparkResize);
                sparkResize = setTimeout(sparklineLogin, 500);
            });
            sparklineLogin();
        });
        function dashboard(year) {
            $.ajax({
                type: "POST",
                url: '../js/ajax/dashboard.php',
                data: { year },
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData && jsonData.success) {
                        present = jsonData.present;
                        absent = jsonData.absent;
                        var chr = new Chartist.Line('#ct-visits', {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            series: [jsonData.absent, jsonData.present]
                        }, {
                            top: 0,
                            low: 1,
                            showPoint: true,
                            fullWidth: true,
                            plugins: [
                                Chartist.plugins.tooltip()
                            ],
                            axisY: {
                                labelInterpolationFnc: function (value) {
                                    return (value / 1);
                                }
                            },
                            showArea: true
                        });


                        var chart = [chart];

                    }
                }
            });
        }
        dashboard(currentYear);
    </script>
</body>

</html>
<?php include '../auth.php'; ?>