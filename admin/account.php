<?php session_start(); ?>
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
    <link href="../css/common.css" rel="stylesheet">
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
                        <h4 class="page-title">Account Setting</h4>
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="ol-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" id="addForm" method="post">
                                    <div class="form-group mb-4">
                                        <label for="example-email" class="col-md-12 p-0">Email</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="email" required placeholder="johnathan@admin.com"
                                                class="form-control p-0 border-0" name="email"
                                                id="email">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Password</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="password" required id="password" name="password" value="password" class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">First Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Johnathan" required id="fname" name="fname"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Middle Initial</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="L." required id="mi" name="mi"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Last Name</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Doe" required id="lname" name="lname"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Citizenship</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" placeholder="Filipino" required id="citizenship" name="citizenship"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Birth Date</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="date" required id="bdate" name="bdate"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Gender</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="gender" id="gender" required class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">College</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <input type="text" id="college" required name="college" placeholder="CEN"
                                                class="form-control p-0 border-0">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0">Address</label>
                                        <div class="col-md-12 border-bottom p-0">
                                        <textarea rows="5" id="address" required name="address" class="form-control p-0 border-0"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-sm-12">Role</label>
                                        <div class="col-sm-12 border-bottom">
                                            <select name="role" id="role" required class="form-select shadow-none p-0 border-0 form-control-line">
                                                <option value="teacher">Teacher</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="accountId" id="accountId"
                                                class="form-control p-0 border-0">
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Account</button>
                                        </div>
                                    </div>
                                    <div class="alert alert-success d-none" id="successAlert">
                                        <strong>Success.</strong>
                                    </div>
                                    <div class="alert alert-danger d-none" id="errorAlert">
                                        <strong>Insert Failed!</strong> Email already exist!
                                    </div>
                                    <div class="alert alert-danger d-none" id="accountDontExistAlert">
                                        <strong>Update Failed!</strong> Account Do Not Exist!
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php
                include '../wrappers/footer.php';
                include '../db/connection.php';
                $accountId = $_SESSION["accountId"];
                $result = $mysqli -> query("SELECT * FROM teachers
                                            JOIN accounts
                                            ON teachers.account_id = accounts.id
                                            WHERE accounts.id = '".$accountId."'");
                $rows = mysqli_num_rows($result);
                if($rows == 1) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div id="account" style="display: none" data-attr='<?php echo json_encode($row); ?>'></div>            
            <?php
                    }
                }
            ?>
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
        let data = $('#account').attr("data-attr");
        data = JSON.parse(data);
        $('#email').val(data.username);
        $('#password').val(data.password);
        $('#fname').val(data.first_name);
        $('#mi').val(data.middle_initial);
        $('#lname').val(data.last_name);
        $('#citizenship').val(data.citizenship);
        $('#bdate').val(data.birth_day);
        $('#gender').val(data.gender);
        $('#college').val(data.college);
        $('#role').val(data.role);
        $('#address').html(data.address);
        $('#accountId').val(data.account_id);

        $('#addForm').submit(function(e) {
            e.preventDefault();
            if ($('#accountId').val()) {
                $.ajax({
                        type: "POST",
                        url: '../js/ajax/teachers/updateTeacher.php',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            var jsonData = JSON.parse(response);
                            $('#successAlert').addClass('d-none');
                            $('#errorAlert').addClass('d-none');
                            $('#accountDontExistAlert').addClass('d-none');
                            if (!jsonData.isAccountExist) {
                                $('#accountDontExistAlert').removeClass('d-none');
                            }
                            if (jsonData && jsonData.success && jsonData.isAccountExist) {
                                $('#successAlert').removeClass('d-none');
                                reloadPage = true;
                            }
                    }
                });
            }
            });
    </script>
</body>

</html>
<?php include '../auth.php'; ?>