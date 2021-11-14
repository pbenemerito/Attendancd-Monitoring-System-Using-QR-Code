<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['sectionName']) && !empty($_POST['sectionCode']) && !empty($_POST['sectionId'])) {
        $sectionName = $_POST['sectionName'];
        $sectionCode = $_POST['sectionCode'];
        $sectionId = $_POST['sectionId'];

        $checkAccount = $mysqli -> query("SELECT * FROM sections
                                            WHERE id = '".$sectionId."'");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 1) {
            $accountSql = "UPDATE sections SET
            section_name = '".$sectionName."', section_code = '".$sectionCode."', updated_at = now()
            WHERE id = '".$sectionId."'";
            $mysqli -> query($accountSql);
            echo json_encode(array(
                'success' => true,
                'sectionName' => $sectionName,
                'sectionCode' => $sectionCode,
                'isAccountExist' => true
            ));
        } else {
            echo json_encode(array('isAccountExist' => false));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>