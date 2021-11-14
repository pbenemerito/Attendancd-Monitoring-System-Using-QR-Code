<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_SESSION["role"]) && $_SESSION["role"] == 'teacher') {
        $tResult = $mysqli -> query("SELECT * FROM teachers WHERE account_id = ".$_SESSION["accountId"]."");
        $teacherId;
        while ($tRow = mysqli_fetch_assoc($tResult)) {
            $teacherId = $tRow['id'];
        }
        $result = $mysqli -> query("SELECT * FROM schedules WHERE teacher_id = ".$teacherId."");
    } else {
        $result = $mysqli -> query("SELECT * FROM schedules");
    }
    $rows = mysqli_num_rows($result);
    if($rows != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['id']."'>".$row['subject_code']."</option>";
        }
    } else {
        echo "<option></option>";
    }
?>