<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['dataId'])) {
        $dataId = $_POST['dataId'];

        $checkAccount = $mysqli -> query("SELECT * FROM sections
                                            WHERE id = '".$dataId."'");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 1) {
            $accountSql = "DELETE FROM sections WHERE id = ".$dataId."";
            $mysqli -> query($accountSql);
            echo json_encode(array(
                'success' => true,
                'isAccountExist' => true
            ));
        } else {
            echo json_encode(array('isAccountExist' => false));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>