<?php 
    include '../../../db/connection.php';

    $result = $mysqli -> query("SELECT * FROM sections");
    $rows = mysqli_num_rows($result);
    if($rows != 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['id']."'>".$row['section_code']."</option>";
        }
    } else {
        echo "<option></option>";
    }
?>