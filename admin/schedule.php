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
                        <h4 class="page-title">Schedules</h4>
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
                                <button id="add" data-bs-toggle="modal" style="margin-right: 7px;" data-bs-target="#addModal" type="button" class="btn btn-primary">Add Schedule</button>
                                <button type="button" onClick=takeSnapShot() style="margin-right: 7px;" class="btn btn-danger">
                                Print PDF</button>
                                <button type="button" class="btn btn-success" onclick="tableToExcel('adminTable', 'name', 'schedules.xls')">
                                Print Excel</button>
                            </div>
                            <div id="adminTable" class="table-responsive">
                            <table id="tableId" class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Schedule ID</th>
                                            <th class="border-top-0">Subject Name</th>
                                            <th class="border-top-0">Subject Code</th>
                                            <th class="border-top-0">Units</th>
                                            <th class="border-top-0">Start Time</th>
                                            <th class="border-top-0">End Time</th>
                                            <th class="border-top-0">Day</th>
                                            <th class="border-top-0">Semester</th>
                                            <th class="border-top-0">School Year</th>
                                            <th class="border-top-0">Room</th>
                                            <th class="border-top-0">Section</th>
                                            <th class="border-top-0">Teacher</th>
                                            <th class="border-top-0 hide-actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include '../db/connection.php';
                                        $result = $mysqli -> query("SELECT sc.id, sc.subject_name, sc.subject_code, sc.units,
                                        TIME_FORMAT(sc.start_time, '%h:%i %p') as stDate, TIME_FORMAT(sc.end_time, '%h:%i %p') as etDate,
                                        sc.start_time, sc.end_time, sc.day,
                                        sc.room, sc.section_id, sc.created_at, sc.updated_at, se.section_code,
                                        te.first_name, te.last_name, sc.teacher_id, sc.school_year, sc.semester
                                        FROM schedules as sc 
                                        JOIN sections as se ON se.id = sc.section_id
                                        JOIN teachers as te ON te.id = sc.teacher_id ");
                                        $rows = mysqli_num_rows($result);
                                        if($rows == 0) {
                                    ?>
                                    <tr class="no-data">
                                        <td colspan="14">No data</td>
                                    </tr>
                                    <?php 
                                        } else {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['id'] ?></td>
                                            <td><?php echo $row['subject_name'] ?></td>
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <td><?php echo $row['units'] ?></td>
                                            <td><?php echo $row['stDate'] ?></td>
                                            <td><?php echo $row['etDate'] ?></td>
                                            <td><?php echo $row['day'] ?></td>
                                            <td><?php echo $row['semester'] ?></td>
                                            <td><?php echo $row['school_year'] ?></td>
                                            <td><?php echo $row['room'] ?></td>
                                            <td><?php echo $row['section_code'] ?></td>
                                            <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
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
    <?php include './schedule/add.php'; ?>
    <?php include './schedule/view.php'; ?>
    <?php include './schedule/delete.php'; ?>
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
                        doc.save('schedules.pdf', {returnPromise: true});
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
                if ($('#scheduleId').val()) {
                    $.ajax({
                            type: "POST",
                            url: '../js/ajax/schedule/update.php',
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
                            url: '../js/ajax/schedule/add.php',
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
                $('#scheduleId').val('');
                $('#modalTitleLabel').html('Add Schedule');
            });
            $('.deleteModal').click(function () {
                const dataId = $(this).attr("data-attr");
                deleteModal.show();
                $('#delete').attr('data-id', dataId);
            });
            $('#add').click(function () {
                $('#subjectCode').removeAttr('disabled');
                $('#subjectCode').removeAttr('style', 'cursor: no-drop');
            });
            $('#delete').click(function () {
                const dataId = $(this).attr("data-id");
                $.ajax({
                        type: "POST",
                        url: '../js/ajax/schedule/delete.php',
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
                $('#modalTitleLabel').html('Update Schedule');
                $('#subjectName').val(data.subject_name);
                $('#subjectCode').val(data.subject_code);
                $('#subjectCode').attr('disabled', true);
                $('#subjectCode').attr('style', 'cursor: no-drop');
                $('#units').val(data.units);
                $('#startTime').val(data.start_time);
                $('#endTime').val(data.end_time);
                $('#day').val(data.day);
                $('#semester').val(data.semester);
                $('#sy').val(data.school_year);
                $('#room').val(data.room);
                $('#section').val(data.section_id);
                $('#teacher').val(data.teacher_id);
                $('#scheduleId').val(data.id);
            });
            $('.view').click(function () {
                const data = JSON.parse($(this).attr("data-attr"));
                viewModal.show();
                $('#viewSName').html(data.subject_name);
                $('#viewSCode').html(data.subject_code);
                $('#viewUnits').html(data.units);
                $('#viewStTime').html(data.stDate);
                $('#viewEtTime').html(data.etDate);
                $('#viewDay').html(data.day);
                $('#viewSemester').html(data.day);
                $('#viewSy').html(data.semester);
                $('#viewRoom').html(data.room);
                $('#viewSection').html(data.section_code);
                $('#viewTeacher').html(data.first_name + ' ' + data.last_name);
            });
             // get all sections
            $.ajax({
                    type: "POST",
                    url: '../js/ajax/sections/getAll.php',
                    success: function(response)
                    {
                        $('#section').append(response);
                    }
            });
             // get all teachers
             $.ajax({
                    type: "POST",
                    url: '../js/ajax/teachers/getAll.php',
                    success: function(response)
                    {
                        $('#teacher').append(response);
                    }
            });
        });
    </script>
</body>

</html>
<?php include '../auth.php'; ?>