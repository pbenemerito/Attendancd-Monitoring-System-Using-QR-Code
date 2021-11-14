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
                        <h4 class="page-title">Attedance Logs</h4>
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
                        <form method="post" autocomplete="off">
                            <div class="filter-container">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="p-0">Subject:</label>
                                            <div class="border-bottom p-0">
                                                <select name="schedule" id="schedule" class="form-control p-0">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="p-0">Section:</label>
                                            <div class="border-bottom p-0">
                                                <select name="section" id="section" class="form-control p-0">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="p-0">Teacher:</label>
                                            <div class="border-bottom p-0">
                                                <input type="text" class="form-control p-0" name="teacher" id="teacher" placeholder="Nemesio Macabale"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="p-0">Student:</label>
                                            <div class="border-bottom p-0">
                                                <input type="text" class="form-control p-0" name="student" id="student" placeholder="Kim Asuncion"/>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="p-0">Status:</label>
                                            <div class="border-bottom p-0">
                                                <select name="status" id="status" class="form-control p-0">
                                                    <option></option>
                                                    <option value="present">Present</option>
                                                    <option value="absent">Absent</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info" name="submit" id="submit" value="Filter" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div style="display: flex; justify-content: space-between;">
                                <div class="grid-start">
                                </div>
                                <div class="grid-end" style="height: 34px;">
                                    <button type="button" onClick=takeSnapShot() style="margin-right: 7px;" class="btn btn-danger">
                                    Print PDF</button>
                                    <button type="button" class="btn btn-success" onclick="tableToExcel('adminTable', 'name', 'attendanceLogs.xls')">
                                    Print Excel</button>
                                </div>
                            </div>
                            <div id="adminTable" class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Student ID</th>
                                            <th class="border-top-0">Student Name</th>
                                            <th class="border-top-0">College</th>
                                            <th class="border-top-0">Degree</th>
                                            <th class="border-top-0">Section</th>
                                            <th class="border-top-0">Subject Name</th>
                                            <th class="border-top-0">Subject Code</th>
                                            <th class="border-top-0">Teacher Name</th>
                                            <th class="border-top-0">Day</th>
                                            <th class="border-top-0">Start Time</th>
                                            <th class="border-top-0">End Time</th>
                                            <th class="border-top-0">Room</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Time IN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include '../db/connection.php';
                                        $rows = 0;
                                        if (isset($_POST['schedule'])) {
                                            $schedId = $_POST['schedule'];
                                            $section = $_POST['section'];
                                            $teacher = $_POST['teacher'];
                                            $student = $_POST['student'];
                                            $status = $_POST['status'];
                                            ?> 
                                            <input type="hidden" id="scId" value="<?php echo $schedId; ?>"> 
                                            <input type="hidden" id="secId" value="<?php echo $section; ?>"> 
                                            <input type="hidden" id="teacherId" value="<?php echo $teacher; ?>"> 
                                            <input type="hidden" id="studentId" value="<?php echo $student; ?>"> 
                                            <input type="hidden" id="statusId" value="<?php echo $status; ?>"> 
                                            <?php
                                            $query = '';
                                            if (!empty($_POST["schedule"]) || !empty($_POST["section"]) 
                                            || !empty($_POST["teacher"]) || !empty($_POST["student"]) || !empty($_POST["status"])) {
                                                $query = 'WHERE';
                                            }
                                            if (!empty($_POST["schedule"])) {
                                                $query = $query." "."sc.subject_code = '".$schedId."' AND";
                                            }
                                            if (!empty($_POST["section"])) {
                                                $query = $query." "."se.id = '".$section."' AND";
                                            }
                                            if (!empty($_POST["status"])) {
                                                $query = $query." "."at.status = '".$status."' AND";
                                            }
                                            if (!empty($_POST["student"])) {
                                                $query = $query." "."(concat(st.first_name , ' ' , st.last_name) LIKE '%".$student."%' OR
                                                concat(st.last_name , ' ' , st.first_name) LIKE '%".$student."%' OR
                                                concat(st.first_name , ' ' , st.last_name, ' ' , st.middle_initial) LIKE '%".$student."%' OR
                                                concat(st.last_name , ' ' , st.first_name, ' ' , st.middle_initial) LIKE '%".$student."%' OR
                                                concat(st.first_name , ' ' , st.middle_initial, ' ' , st.last_name) LIKE '%".$student."%' OR
                                                st.first_name LIKE '%".$student."%' OR st.last_name LIKE '%".$student."') AND";
                                            }
                                            if (!empty($_POST["teacher"])) {
                                                $query = $query." "."(concat(te.first_name , ' ' , te.last_name) LIKE '%".$teacher."%' OR
                                                concat(te.last_name , ' ' , te.first_name) LIKE '%".$teacher."%' OR
                                                concat(te.first_name , ' ' , te.last_name, ' ' , te.middle_initial) LIKE '%".$teacher."%' OR
                                                concat(te.last_name , ' ' , te.first_name, ' ' , te.middle_initial) LIKE '%".$teacher."%' OR
                                                concat(te.first_name , ' ' , te.middle_initial, ' ' , te.last_name) LIKE '%".$teacher."%' OR
                                                te.first_name LIKE '%".$teacher."%' OR te.last_name LIKE '%".$teacher."') AND";
                                            }
                                            $query = substr($query, 0, -3);
                                            
                                            $sql = "SELECT st.student_id,
                                            CONCAT(st.first_name, ' ', st.middle_initial, ' ', st.last_name) AS student_name,
                                            st.college,
                                            st.degree,
                                            se.section_code,
                                            sc.subject_code,
                                            sc.subject_name,
                                            sc.room,
                                            sc.day,
                                            CONCAT(te.first_name, ' ', te.middle_initial, ' ', te.last_name) AS teacher_name,
                                            at.status,
                                            at.time_in,
                                            TIME_FORMAT(sc.start_time, '%h:%i %p') as stDate, TIME_FORMAT(sc.end_time, '%h:%i %p') as etDate
                                            FROM attendances AS at
                                            LEFT JOIN students AS st ON st.student_id = at.student_id
                                            LEFT JOIN schedules AS sc ON sc.id = at.schedule_id
                                            LEFT JOIN teachers AS te ON te.id = at.teacher_id
                                            LEFT JOIN sections AS se ON st.section_id = se.id
                                            ".$query."";
                                            $result = $mysqli -> query($sql);
                                            $rows = mysqli_num_rows($result);
                                        }
                                        if($rows == 0) {
                                    ?>
                                    <tr class="no-data">
                                        <td colspan="11">No data</td>
                                    </tr>
                                    <?php 
                                        } else {
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $row['student_id'] ?></td>
                                            <td><?php echo $row['student_name'] ?></td>
                                            <td><?php echo $row['college'] ?></td>
                                            <td><?php echo $row['degree'] ?></td>
                                            <td><?php echo $row['section_code'] ?></td>
                                            <td><?php echo $row['subject_name'] ?></td>
                                            <td><?php echo $row['subject_code'] ?></td>
                                            <td><?php echo $row['teacher_name'] ?></td>
                                            <td><?php echo $row['day'] ?></td>
                                            <td><?php echo $row['stDate'] ?></td>
                                            <td><?php echo $row['etDate'] ?></td>
                                            <td><?php echo $row['room'] ?></td>
                                            <td><?php echo $row['status'] ?></td>
                                            <td><?php echo $row['time_in'] ?></td>
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
            window.scrollTo(0,0);
            setTimeout(function(){ 
                html2canvas(document.getElementById('adminTable')).then(function(canvas) {
                    const imgData = canvas.toDataURL('image/png');
                    const doc = new jsPDF();
                    const imgHeight = canvas.height * 208 / canvas.width;
                    doc.addImage(imgData, 0, 0, 208, imgHeight);
                    doc.save('attendanceLogs.pdf', {returnPromise: true});
                });
            }, 1000);
        }
        function tableToExcel(table, name, filename) {
                let uri = 'data:application/vnd.ms-excel;base64,', 
                template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><title></title><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>', 
                base64 = function(s) { return window.btoa(decodeURIComponent(encodeURIComponent(s))) },         format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; })}
                
                if (!table.nodeType) table = document.getElementById(table)
                var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

                var link = document.createElement('a');
                link.download = filename;
                link.href = uri + base64(format(template, ctx));
                link.click();
        }
        // get all schedule
        $.ajax({
                type: "POST",
                url: '../js/ajax/schedule/getAllSubjectCode.php',
                success: function(response)
                {
                    $('#schedule').append(response);
                    if ($('#scId').val()) {
                        $('#schedule').val($('#scId').val());
                    }
                }
        });
        // get all section
        $.ajax({
                    type: "POST",
                    url: '../js/ajax/sections/getAll.php',
                    success: function(response)
                    {
                        $('#section').append(response);
                        if ($('#secId').val()) {
                            $('#section').val($('#secId').val());
                        }
                    }
            });
        if ($('#teacherId').val()) {
            $('#teacher').val($('#teacherId').val());
        }
        if ($('#studentId').val()) {
            $('#student').val($('#studentId').val());
        }
        if ($('#statusId').val()) {
            $('#status').val($('#statusId').val());
        }
    </script>
</body>

</html>
<?php include '../auth.php'; ?>