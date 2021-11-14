<?php 
    session_start();
    include '../../../db/connection.php';
    if (!empty($_SESSION["accountId"]) && !empty($_POST['studentId']) && !empty($_POST['fname']) && !empty($_POST['fname']) && !empty($_POST['section'])) {
        $section = $_POST['section'];
        $studentId = $_POST['studentId'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mi = $_POST['mi'];
        $ex = $_POST['ex'];
        $degree = $_POST['degree'];
        $college = $_POST['college'];
        $department = $_POST['department'];
        
        $check = $mysqli -> query("SELECT * FROM students
                                            WHERE student_id = '".$studentId."'");
        $isAccountExist = mysqli_num_rows($check);
        
        if ($isAccountExist === 0) {
            $sql = "INSERT INTO students
            (student_id,
            first_name,
            last_name,
            middle_initial,
            college,
            degree,
            section_id,
            updated_at, 
            created_at, ex, department)
            VALUES
            ('".$studentId."', 
            '".$fname."', 
            '".$lname."', 
            '".$mi."', 
            '".$college."', 
            '".$degree."', 
            ".$section.", 
            now(), 
            now(),
            '".$ex."', 
            '".$department."' )";

            $mysqli -> query($sql);
            echo json_encode(array(
                'success' => true,
                'studentId' => $studentId,
                'fname' => $fname,
                'lname' => $lname,
                'mi' => $mi,
                'degree' => $degree,
                'college' => $college,
                'isAccountExist' => false
            ));
        } else {
            echo json_encode(array('isAccountExist' => true));
        }
    } else {
        echo json_encode(array('success' => false));
    }

?>