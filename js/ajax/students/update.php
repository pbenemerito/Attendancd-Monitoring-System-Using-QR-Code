<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['studId']) && !empty($_POST['studentId']) && !empty($_POST['fname']) && !empty($_POST['fname']) && !empty($_POST['section'])) {
        $section = $_POST['section'];
        $studentId = $_POST['studentId'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];
        $ex = $_POST['ex'];
        $degree = $_POST['degree'];
        $college = $_POST['college'];
        $department = $_POST['department'];
        $id = $_POST['studId'];
        
        $check = $mysqli -> query("SELECT * FROM students
                                            WHERE student_id = '".$id."'");
        $isAccountExist = mysqli_num_rows($check);
        
        if ($isAccountExist === 1) {
            $accountSql = "UPDATE students SET
            student_id = '".$studentId."',
            first_name = '".$fname."',
            last_name = '".$lname."',
            middle_initial = '".$mi."', 
            degree = '".$degree."', 
            college = '".$college."', 
            section_id = '".$section."', 
            updated_at = now(),
            ex = '".$ex."', 
            department = '".$department."'
            WHERE student_id = '".$id."'";
            $mysqli -> query($accountSql);
            echo json_encode(array(
                'success' => true,
                'studentId' => $studentId,
                'fname' => $fname,
                'lname' => $lname,
                'mi' => $mi,
                'degree' => $degree,
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