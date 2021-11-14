<?php
    include '../../db/connection.php';
    session_start();
    if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['section']) && !empty($_POST['schedule'])) {
        $username = $_POST['email'];
        $password = $_POST['password'];
        $section = $_POST['section'];
        $schedule = $_POST['schedule'];
        if ($result = $mysqli -> query("SELECT teachers.id FROM accounts JOIN teachers ON accounts.id = teachers.account_id
        WHERE username = '".$username."'
        AND password='".$password."'")) {

            $rows = mysqli_num_rows($result);
            if($rows == 1) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION["attendanceStarted"] = true;
                    $_SESSION["attendanceSectionId"] = $section;
                    $_SESSION["attendanceTeacherId"] = $row["id"];
                    $_SESSION["attendanceScheduleId"] = $schedule;
                }
                echo json_encode(array('success' => true));
            } else {
                echo json_encode(array('success' => false));
            }
        } else {
            echo json_encode(array('success' => false));
        }
                
    } else {
        echo json_encode(array('success' => false));
    }
    
?>