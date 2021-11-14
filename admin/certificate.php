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
    <link href="../css/certificate.css" rel="stylesheet">
</head>

<body>
    <table>
    </table>

    <button onClick="takeSnapShot()">Print pdf</button>
    
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
    <script src="../plugins/bower_components/html2canvas/html2canvas.min.js"></script>
    <script src="../plugins/bower_components/jspdf/jspdf.debug.js"></script>
    <script type="text/javascript">
        function takeSnapShot() {
                    html2canvas(document.getElementById('adminTable'), {scale: 2}).then(function(canvas) {
                        const imgData = canvas.toDataURL('image/png');
                        const doc = new jsPDF();
                        const imgHeight = canvas.height * 208 / canvas.width;
                        doc.addImage(imgData, 0, 0, 208, imgHeight);
                        doc.save('subjects.pdf', {returnPromise: true});
                    });
        }
    </script>
</body>

</html>