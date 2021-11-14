<?php 
    include '../../db/connection.php';
    session_start();
    if(!empty($_POST['studentId']) && !empty($_SESSION["attendanceScheduleId"]) 
        && !empty($_SESSION["attendanceTeacherId"]) && !empty($_SESSION["attendanceSectionId"])) {
        
        $student_id = $_POST['studentId'];
        $attendanceSectionId = $_SESSION['attendanceSectionId'];
        $attendanceTeacherId = $_SESSION['attendanceTeacherId'];
        $attendanceScheduleId = $_SESSION['attendanceScheduleId'];

        $checkStudAttendaceRes = $mysqli -> query("SELECT attendances.student_id FROM attendances JOIN students ON students.student_id = attendances.student_id
        WHERE attendances.student_id = '".$student_id."' AND students.section_id = ".$attendanceSectionId." AND attendances.schedule_id = ".$attendanceScheduleId." AND (attendances.created_at <= CURDATE() AND attendances.created_at >= CURDATE())");
        $isDoneAttendance = mysqli_num_rows($checkStudAttendaceRes);
        if ($isDoneAttendance > 0) {
            echo json_encode(array(
                'success' => false,
                'error' => 'Attendance already done!'
            ));
        } else {
            $result = $mysqli -> query("SELECT CONCAT(students.first_name, ' ', students.middle_initial, ' ', students.last_name) AS student_name FROM students
            WHERE student_id = '".$student_id."' AND section_id = ".$attendanceSectionId."");

            $rows = mysqli_num_rows($result);
            if($rows == 1) {
                $tResult = $mysqli -> query("SELECT * FROM schedules WHERE id = ".$attendanceScheduleId."");
                $startTime;
                while ($tRow = mysqli_fetch_assoc($tResult)) {
                    $startTime = $tRow['start_time'];
                }
                $timeinDate = date("Y-m-d").' '.$startTime;
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
                            '".$student_id."',
                            ".$attendanceTeacherId.", 
                            '".$timeinDate."', 
                            'present',
                            now(),
                            now())";
                    $mysqli -> query($sql);
                    $attendanceId = $mysqli -> insert_id;
                    $res = $mysqli -> query("SELECT DATE_FORMAT(time_in, '%Y-%m-%d %h:%i %p') as time_in FROM attendances
                                            WHERE id = ".$attendanceId."");
                    while ($attendanceRow = mysqli_fetch_assoc($res)) {
                        echo json_encode(array(
                            'success' => true,
                            'studentName' => $row['student_name'],
                            'timeIn' => $attendanceRow['time_in'],
                            'studentId' => $student_id
                        ));
                    }
                }
                
            } else {
                echo json_encode(array(
                    'success' => false,
                    'error' => 'You are not in this section'
                ));
            }
        }
    } else {
        echo json_encode(array(
            'success' => false,
            'error' => 'Something went wrong'
        ));
    }
?>