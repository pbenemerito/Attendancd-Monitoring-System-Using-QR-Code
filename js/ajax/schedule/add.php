<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['subjectName']) && !empty($_POST['subjectCode']) && !empty($_POST['units'])) {
        $subjectName = $_POST['subjectName'];
        $subjectCode = $_POST['subjectCode'];
        $units = $_POST['units'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $day = $_POST['day'];
        $semester = $_POST['semester'];
        $sy = $_POST['sy'];
        $room = $_POST['room'];
        $section = $_POST['section'];
        $teacher = $_POST['teacher'];

        $check = $mysqli -> query("SELECT * FROM schedules
                                            WHERE subject_code = '".$subjectCode."'");
        $isAccountExist = mysqli_num_rows($check);
        
        if ($isAccountExist === 0) {
            $sql = "INSERT INTO schedules
            (subject_name, subject_code, units, start_time, end_time, day, room, section_id, teacher_id, created_at, updated_at, semester, school_year)
            VALUES
            ('".$subjectName."', '".$subjectCode."', ".$units.", '".$startTime."', '".$endTime."', '".$day."', '".$room."', 
            ".$section.", ".$teacher.", now(), now(),'".$semester."','".$sy."')";

            $mysqli -> query($sql);
            echo json_encode(array(
                'success' => true,
                'subjectName' => $subjectName,
                'subjectCode' => $subjectCode,
                'isAccountExist' => false
            ));
        } else {
            echo json_encode(array('isAccountExist' => true));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>