<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['accountId']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];
        $college = $_POST['college'];
        $department = $_POST['department'];
        $accountId = $_POST['accountId'];
        $role = $_POST['role'];
        $ex = $_POST['ex'];

        $checkAccount = $mysqli -> query("SELECT * FROM accounts
                                            WHERE id = '".$accountId."'");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 1) {
            $accountSql = "UPDATE accounts SET
            username = '".$email."', password = '".$password."', role = '".$role."'
            WHERE id = '".$accountId."'";
            $mysqli -> query($accountSql);
            $teacherSql = "UPDATE teachers SET
                    first_name = '".$fname."',
                    last_name = '".$lname."',
                    middle_initial = '".$mi."', 
                    college = '".$college."', 
                    department = '".$department."', 
                    updated_at = now(),
                    ex = '".$ex."'
                    WHERE account_id = '".$accountId."'";
            $mysqli -> query($teacherSql);
            echo json_encode(array(
                'success' => true,
                'accountId' => $accountId,
                'email' => $email,
                'password' => $password,
                'fname' => $fname,
                'lname' => $lname,
                'mi' => $mi,
                'college' => $college,
                'isAccountExist' => true
            ));
        } else {
            echo json_encode(array('isAccountExist' => false));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>