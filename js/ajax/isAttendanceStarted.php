<?php 
    session_start();
    if (!empty($_SESSION["attendanceStarted"])) {
        if ($_SESSION["attendanceStarted"]) {
            echo json_encode(array('attendanceStarted' => true));
        } else {
            echo json_encode(array('attendanceStarted' => false));
        }
    } else {
        echo json_encode(array('attendanceStarted' => false));
    }
?>