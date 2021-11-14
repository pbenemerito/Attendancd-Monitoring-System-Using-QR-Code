<?php
    include '../../db/connection.php';
    if (isset($_POST['studentId'])) {
        $studentId = $_POST['studentId'];
        if ($result = $mysqli -> query("SELECT * FROM students
                                            WHERE student_id = '".$studentId."'")) {

        $rows = mysqli_num_rows($result);
        if($rows != 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo json_encode(
                    array(
                        'firstName' => $row['first_name'],
                        'lastName' => $row['last_name'],
                        'studentId' => $row['student_id'],
                        'middleInitial' => $row['middle_initial'],
                        'birthDay' => $row['birth_day'],
                        'citizenship' => $row['citizenship'],
                        'address' => $row['address'],
                        'college' => $row['college'],
                        'degree' => $row['degree'],
                        'createdAt' => $row['created_at'],
                        'updatedAt' => $row['updated_at'],
                        'fullname' => $row['first_name'].' '.$row['middle_initial'].' '.$row['last_name']
                    )
                );
            }   
        }                                     
    }
    }
?>