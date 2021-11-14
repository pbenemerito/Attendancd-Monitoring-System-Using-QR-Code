<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_POST["sectionId"])) {
        $sectiondId = $_POST["sectionId"];
        $result = $mysqli -> query("SELECT * FROM schedules WHERE section_id = ".$sectiondId."");
    } else {
        $result = $mysqli -> query("SELECT * FROM schedules");
    }
    $rows = mysqli_num_rows($result);
    if($rows != 0) {
        echo "<option></option>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['id']."'>".$row['subject_code']."</option>";
        }
    } else {
        echo "<option></option>";
    }
?>