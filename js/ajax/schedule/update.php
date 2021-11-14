<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['subjectName']) && !empty($_POST['scheduleId']) && !empty($_POST['units'])) {
        $subjectName = $_POST['subjectName'];
        $units = $_POST['units'];
        $scheduleId = $_POST['scheduleId'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];
        $day = $_POST['day'];
        $semester = $_POST['semester'];
        $sy = $_POST['sy'];
        $room = $_POST['room'];
        $section = $_POST['section'];
        $teacher = $_POST['teacher'];

        $checkAccount = $mysqli -> query("SELECT * FROM schedules
                                            WHERE id = ".$scheduleId."");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 1) {
            $accountSql = "UPDATE schedules SET
            subject_name = '".$subjectName."', 
            units = ".$units.",
            start_time = '".$startTime."',
            end_time = '".$endTime."',
            day = '".$day."',
            room = '".$room."',
            section_id = ".$section.",
            teacher_id = ".$teacher.",
            updated_at = now(),
            semester = '".$semester."',
            school_year = '".$sy."'
            WHERE id = '".$scheduleId."'";
            $mysqli -> query($accountSql);
            echo json_encode(array(
                'success' => true,
                'subjectName' => $subjectName,
                'isAccountExist' => true
            ));
        } else {
            echo json_encode(array('isAccountExist' => false));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>