<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['dataId'])) {
        $dataId = $_POST['dataId'];

        $checkAccount = $mysqli -> query("SELECT * FROM students
                                            WHERE student_id = '".$dataId."'");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 1) {
            $accountSql = "DELETE FROM students WHERE student_id = '".$dataId."'";
            $mysqli -> query($accountSql);
            echo json_encode(array(
                'success' => true,
                'isAccountExist' => true,
                'id' => $dataId
            ));
        } else {
            echo json_encode(array('isAccountExist' => false));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>