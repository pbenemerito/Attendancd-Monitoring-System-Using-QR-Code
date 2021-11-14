<?php 
    include '../../db/connection.php';
    if(!empty($_POST['year'])) {
        $year = $_POST['year'];

        $janP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-01-01' AND created_at <= '".$year."-01-31')");
        $janRowsP = mysqli_num_rows($janP);

        $febP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-02-01' AND created_at <= '".$year."-02-28')");
        $febRowsP = mysqli_num_rows($febP);

        $marP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-03-01' AND created_at <= '".$year."-03-31')");
        $marRowsP = mysqli_num_rows($marP);

        $aprP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-04-01' AND created_at <= '".$year."-04-30')");
        $aprRowsP = mysqli_num_rows($aprP);

        $mayP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-05-01' AND created_at <= '".$year."-05-31')");
        $mayRowsP = mysqli_num_rows($mayP);

        $junP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-06-01' AND created_at <= '".$year."-06-30')");
        $junRowsP = mysqli_num_rows($junP);

        $julP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-07-01' AND created_at <= '".$year."-07-31')");
        $julRowsP = mysqli_num_rows($julP);

        $augP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-08-01' AND created_at <= '".$year."-08-31')");
        $augRowsP = mysqli_num_rows($augP);

        $sepP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-09-01' AND created_at <= '".$year."-09-30')");
        $sepRowsP = mysqli_num_rows($sepP);

        $octP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-10-01' AND created_at <= '".$year."-10-31')");
        $octRowsP = mysqli_num_rows($octP);

        $novP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-11-01' AND created_at <= '".$year."-11-30')");
        $novRowsP = mysqli_num_rows($novP);

        $decP = $mysqli -> query("SELECT id FROM attendances WHERE status = 'present' AND (created_at >= '".$year."-12-01' AND created_at <= '".$year."-12-31')");
        $decRowsP = mysqli_num_rows($decP);



        $janA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-01-01' AND created_at <= '".$year."-01-31')");
        $janRowsA = mysqli_num_rows($janA);

        $febA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-02-01' AND created_at <= '".$year."-02-28')");
        $febRowsA = mysqli_num_rows($febA);

        $marA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-03-01' AND created_at <= '".$year."-03-31')");
        $marRowsA = mysqli_num_rows($marA);

        $aprA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-04-01' AND created_at <= '".$year."-04-30')");
        $aprRowsA = mysqli_num_rows($aprA);

        $mayA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-05-01' AND created_at <= '".$year."-05-31')");
        $mayRowsA = mysqli_num_rows($mayA);

        $junA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-06-01' AND created_at <= '".$year."-06-30')");
        $junRowsA = mysqli_num_rows($junA);

        $julA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-07-01' AND created_at <= '".$year."-07-31')");
        $julRowsA = mysqli_num_rows($julA);

        $augA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-08-01' AND created_at <= '".$year."-08-31')");
        $augRowsA = mysqli_num_rows($augA);

        $sepA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-09-01' AND created_at <= '".$year."-09-30')");
        $sepRowsA = mysqli_num_rows($sepA);

        $octA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-10-01' AND created_at <= '".$year."-10-31')");
        $octRowsA = mysqli_num_rows($octA);

        $novA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-11-01' AND created_at <= '".$year."-11-30')");
        $novRowsA = mysqli_num_rows($novA);

        $decA = $mysqli -> query("SELECT id FROM attendances WHERE status = 'absent' AND (created_at >= '".$year."-12-01' AND created_at <= '".$year."-12-31')");
        $decRowsA = mysqli_num_rows($decA);

        
        echo json_encode(array(
            'success' => true,
            'present' => [$janRowsP, $febRowsP, $marRowsP, $aprRowsP, $mayRowsP, $junRowsP, $julRowsP, $augRowsP, $sepRowsP, $octRowsP, $novRowsP, $decRowsP],
            'absent' => [$janRowsA, $febRowsA, $marRowsA, $aprRowsA, $mayRowsA, $junRowsA, $julRowsA, $augRowsA, $sepRowsA, $octRowsA, $novRowsA, $decRowsA]
        ));
    } 
?>