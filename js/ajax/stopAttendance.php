<?php
    include '../../db/connection.php';
    session_start();
    if(!empty($_SESSION["attendanceScheduleId"]) 
        && !empty($_SESSION["attendanceTeacherId"]) && !empty($_SESSION["attendanceSectionId"])) {
        $attendanceSectionId = $_SESSION['attendanceSectionId'];
        $attendanceTeacherId = $_SESSION['attendanceTeacherId'];
        $attendanceScheduleId = $_SESSION['attendanceScheduleId'];
        $username = $_POST['email'];
        $password = $_POST['password'];

        $res = $mysqli -> query("SELECT teachers.id FROM accounts JOIN teachers ON accounts.id = teachers.account_id
        WHERE username = '".$username."'
        AND password='".$password."'");
        $teacherRows = mysqli_num_rows($res);

        if($teacherRows == 1) {
            $tResult = $mysqli -> query("SELECT * FROM schedules WHERE id = ".$attendanceScheduleId."");
            $startTime;
            while ($tRow = mysqli_fetch_assoc($tResult)) {
                $startTime = $tRow['start_time'];
            }
            $timeinDate = date("Y-m-d").' '.$startTime;

            $result = $mysqli -> query("SELECT * FROM students 
            WHERE section_id = ".$attendanceSectionId." AND 
            student_id NOT IN 
            (SELECT student_id FROM attendances 
            WHERE schedule_id = ".$attendanceScheduleId." AND (created_at <= CURDATE() AND created_at >= CURDATE()))");

            $rows = mysqli_num_rows($result);
            if($rows != 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $sql = "INSERT INTO attendances
                    (schedule_id, 
                    student_id, 
                    teacher_id, 
                    time_in, 
                    status, 
                    updated_at, 
                    created_at)
                    VALUES
                    (".$attendanceScheduleId.", 
                    '".$row['student_id']."',
                    ".$attendanceTeacherId.", 
                    '".$timeinDate."', 
                    'absent',
                    now(),
                    now())";
                    $mysqli -> query($sql);
                }
            }
            unset($_SESSION['attendanceStarted']);
            unset($_SESSION['attendanceSectionId']);
            unset($_SESSION['attendanceScheduleId']);
            unset($_SESSION['attendanceTeacherId']);
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }

    } else {
        echo json_encode(array('success' => false));
    }
    

?>