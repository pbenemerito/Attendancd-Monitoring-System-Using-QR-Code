<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['sectionName']) && !empty($_POST['sectionCode'])) {
        $sectionName = $_POST['sectionName'];
        $sectionCode = $_POST['sectionCode'];

        $check = $mysqli -> query("SELECT * FROM sections
                                            WHERE section_code = '".$sectionCode."'");
        $isAccountExist = mysqli_num_rows($check);
        
        if ($isAccountExist === 0) {
            $sql = "INSERT INTO sections
            (section_name, section_code, updated_at, created_at)
            VALUES
            ('".$sectionName."', '".$sectionCode."', now(), now())";

            $mysqli -> query($sql);
            echo json_encode(array(
                'success' => true,
                'sectionName' => $sectionName,
                'sectionCode' => $sectionCode,
                'isAccountExist' => false
            ));
        } else {
            echo json_encode(array('isAccountExist' => true));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>