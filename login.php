<?php session_start(); error_reporting(0); ?>
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
    <link href="css/login.css" rel="stylesheet">
    <link href="css/common.css" rel="stylesheet">
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
            include './wrappers/header-no-avatar.php';
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
                            <h2 class="login-center-text">Login</h2>
                            <hr>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                    <?php
                                        include './db/connection.php';
                                        include './constant.php';
                                        // error_reporting(0);
                                        if (!empty($_SESSION["accountId"])) {
                                        ?>
                                            <script>
                                                location.replace("index.php")
                                            </script>
                                        <?php
                                        }

                                        if(!empty($_POST['qrUsername']) && !empty($_POST['qrPassword'])) {
                                            $username = $_POST['qrUsername'];
                                            $password = $_POST['qrPassword'];
                                            if ($result = $mysqli -> query("SELECT * FROM accounts
                                            WHERE username = '".$username."'
                                            AND password='".$password."'")) {
                                                $rows = mysqli_num_rows($result);
                                                if($rows == 1) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $_SESSION["username"] = $row['username'];
                                                        $_SESSION["password"] = $row['password'];
                                                        $_SESSION["role"] = $row['role'];
                                                        $_SESSION["accountId"] = $row['id'];
                                                        ?>
                                                            <script>
                                                                location.replace("index.php")
                                                            </script>
                                                        <?php
                                                    }
                                    ?>
                                        <div class="alert alert-success">
                                            You Have <strong>Successfully Logged In.</strong>
                                        </div>
                                    <?php
                                                } else { 
                                    ?>    
                                        <div class="alert alert-danger">
                                            <strong>Login Failed!</strong> Either your email or password was incorrect.
                                        </div>
                                    <?php       }
                                                $result -> free_result();    
                                            }
                                        }
                                    ?>
                                        
                                        <label class="box-title">Username:</label>
                                        <input type="text" name="qrUsername" class="form-control" required value="">
                                        <br>
                                        <label class="box-title">Password:</label>
                                        <input type="password" name="qrPassword" class="form-control" required value="password">
                                        <br>
                                        <div class="grid-center">
                                            <input type="submit" value="Login" class="btn btn-primary form-control" name="submit" />  
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </form>
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
</body>
</html>
