<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['fname']) && !empty($_POST['lname'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];
        $college = $_POST['college'];
        $department = $_POST['department'];
        $role = $_POST['role'];
        $ex = $_POST['ex'];

        $checkAccount = $mysqli -> query("SELECT * FROM accounts
                                            WHERE username = '".$email."'");
        $isAccountExist = mysqli_num_rows($checkAccount);
        
        if ($isAccountExist === 0) {
            $accountSql = "INSERT INTO accounts
            (username, password, role)
            VALUES
            ('".$email."', '".$password."', '".$role."')";

            if ($accountResult = $mysqli -> query($accountSql)) {
                    $accountId = $mysqli -> insert_id;
                    $teacherSql = "INSERT INTO teachers
                            (first_name,
                            last_name,
                            middle_initial, 
                            college, 
                            department,
                            account_id, 
                            created_at, 
                            updated_at,
                            ex)
                            VALUES
                            ('".$fname."', 
                            '".$lname."', 
                            '".$mi."', 
                            '".$college."', 
                            '".$department."', 
                            ".$accountId.", 
                            now(),
                            now(),
                            '".$ex."' )";
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
                        'isAccountExist' => false
                    ));
            }
        } else {
            echo json_encode(array('isAccountExist' => true));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>