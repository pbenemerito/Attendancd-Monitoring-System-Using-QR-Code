<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['accountId'])) {
        $accountId = $_POST['accountId'];

        $checkAccount = $mysqli -> query("SELECT * FROM accounts
                                            WHERE id = '".$accountId."'");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 1) {
            $accountSql = "DELETE FROM accounts WHERE id = ".$accountId."";
            $mysqli -> query($accountSql);
            $teacherSql = "DELETE FROM teachers WHERE account_id = ".$accountId."";
            $mysqli -> query($teacherSql);
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