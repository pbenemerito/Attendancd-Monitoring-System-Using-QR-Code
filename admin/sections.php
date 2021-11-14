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
                        <h4 class="page-title">Sections</h4>
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
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="grid-end">
                                <button type="button" id="add" style="margin-right: 7px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Section</button>
                                <button type="button" onClick=takeSnapShot() style="margin-right: 7px;" class="btn btn-danger">
                                Print PDF</button>
                                <button type="button" class="btn btn-success" onclick="tableToExcel('adminTable', 'name', 'sections.xls')">
                                Print Excel</button>
                            </div>
                            <div id="adminTable" class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Section Name</th>
                                            <th class="border-top-0">Section Code</th>
                                            <th class="border-top-0">Create At</th>
                                            <th class="border-top-0">Update At</th>
                                            <th class="border-top-0 hide-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include '../db/connection.php';
                                        $result = $mysqli -> query("SELECT * FROM sections");
                                        $rows = mysqli_num_rows($result);
                                        if($rows == 0) {
                                    ?>
                                    <tr class="no-data">
                                        <td colspan="6">No data</td>
                                    </tr>
                                    <?php 
                                        } else {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['section_name'] ?></td>
                                            <td><?php echo $row['section_code'] ?></td>
                                            <td><?php echo $row['created_at'] ?></td>
                                            <td><?php echo $row['updated_at'] ?></td>
                                            <td class="hide-actions">
                                                <button data-attr='<?php echo json_encode($row); ?>' type="button" class="btn btn-info btn-xs view">View</button>
                                                <button data-attr='<?php echo json_encode($row); ?>' type="button" class="btn btn-warning btn-xs edit">Edit</button>
                                                <button data-attr='<?php echo $row['id']; ?>' type="button" class="btn btn-danger btn-xs deleteModal">Delete</button>
                                            </td>
                                        </tr>
                                        <?php $i++; } } ?>
                                    </tbody>
                                </table>
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
    <?php include './sections/add.php'; ?>
    <?php include './sections/view.php'; ?>
    <?php include './sections/delete.php'; ?>
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
    <script src="../plugins/bower_components/html2canvas/html2canvas.min.js"></script>
    <script src="../plugins/bower_components/jspdf/jspdf.debug.js"></script>
    <script type="text/javascript">
        function takeSnapShot() {
                    $('.hide-actions').hide();
                    html2canvas(document.getElementById('adminTable')).then(function(canvas) {
                        const imgData = canvas.toDataURL('image/png');
                        const doc = new jsPDF();
                        const imgHeight = canvas.height * 208 / canvas.width;
                        doc.addImage(imgData, 0, 0, 208, imgHeight);
                        doc.save('sections.pdf', {returnPromise: true});
                    });
                    $('.hide-actions').show();
        }
        function tableToExcel(table, name, filename) {
                $("#adminTable th:last-child, #adminTable td:last-child").remove();
                let uri = 'data:application/vnd.ms-excel;base64,', 
                template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><title></title><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>', 
                base64 = function(s) { return window.btoa(decodeURIComponent(encodeURIComponent(s))) },         format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })}
                
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

                var link = document.createElement('a');
                link.download = filename;
                link.href = uri + base64(format(template, ctx));
                link.click();
                location.reload();
        }
        $(document).ready(function() {
            const addModal = new bootstrap.Modal(document.getElementById('addModal'), {
                keyboard: false
            })
            const viewModal = new bootstrap.Modal(document.getElementById('viewModal'), {
                keyboard: false
            })
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'), {
                keyboard: false
            })
            let reloadPage = false;
            $('#addForm').submit(function(e) {
                e.preventDefault();
                if ($('#sectionId').val()) {
                    $.ajax({
                            type: "POST",
                            url: '../js/ajax/sections/update.php',
                            data: $(this).serialize(),
                            success: function(response)
                            {
                                var jsonData = JSON.parse(response);
                                $('#successAlert').addClass('d-none');
                                $('#errorAlert').addClass('d-none');
                                $('#dontExistAlert').addClass('d-none');
                                if (!jsonData.isAccountExist) {
                                    $('#dontExistAlert').removeClass('d-none');
                                }
                                if (jsonData && jsonData.success && jsonData.isAccountExist) {
                                    $('#successAlert').removeClass('d-none');
                                    reloadPage = true;
                                }
                        }
                    });
                } else {
                    $.ajax({
                            type: "POST",
                            url: '../js/ajax/sections/add.php',
                            data: $(this).serialize(),
                            success: function(response)
                            {
                                var jsonData = JSON.parse(response);
                                $('#successAlert').addClass('d-none');
                                $('#errorAlert').addClass('d-none');
                                $('#dontExistAlert').addClass('d-none');  
                                if (jsonData && jsonData.success && !jsonData.isAccountExist) {
                                    $('#addForm')[0].reset();
                                    $('#successAlert').removeClass('d-none');
                                    reloadPage = true;
                                }
                                if (jsonData.isAccountExist) {
                                    $('#errorAlert').removeClass('d-none');
                                }
                        }
                    });
                }
                
            });
            $('#addModal').on('hidden.bs.modal', function () {
                if (reloadPage) {
                    location.reload();
                }
            });
            $('#deleteModal').on('hidden.bs.modal', function () {
                if (reloadPage) {
                    location.reload();
                }
            });

            $('#add').click(function () {
                $('#addForm')[0].reset();
                $('#sectionId').val('');
                $('#modalTitleLabel').html('Add Section');
            });
            $('.deleteModal').click(function () {
                const dataId = $(this).attr("data-attr");
                deleteModal.show();
                $('#delete').attr('data-id', dataId);
            });
            $('#delete').click(function () {
                const dataId = $(this).attr("data-id");
                $.ajax({
                        type: "POST",
                        url: '../js/ajax/sections/delete.php',
                        data: { dataId },
                        success: function(response)
                        {
                            $('#deleteSuccessAlert').addClass('d-none');
                            $('#deleteErrorAlert').addClass('d-none');
                            var jsonData = JSON.parse(response);
                            if (jsonData && jsonData.success && jsonData.isAccountExist) {
                                reloadPage = true;
                                $('#deleteSuccessAlert').removeClass('d-none');
                                $('#isDelete').addClass('d-none');
                            }
                            if (jsonData && !jsonData.isAccountExist) {
                                $('#deleteErrorAlert').removeClass('d-none');
                                $('#isDelete').addClass('d-none')
                            }
                    }
                });
            });
            $('.edit').click(function () {
                let data = $(this).attr("data-attr");
                data = JSON.parse(data);
                addModal.show();
                $('#modalTitleLabel').html('Update Section');
                $('#sectionName').val(data.section_name);
                $('#sectionCode').val(data.section_code);
                $('#sectionId').val(data.id);
            });
            $('.view').click(function () {
                const data = JSON.parse($(this).attr("data-attr"));
                viewModal.show();
                $('#viewSName').html(data.section_name);
                $('#viewSCode').html(data.section_code);
            });
        });
    </script>
</body>

</html>
<?php include '../auth.php'; ?>