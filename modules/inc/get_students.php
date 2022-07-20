<?php

    require_once('configer/db_config.php');

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);

    header('Content-type:application/json;charset=utf-8');
    $getStudentsQuery = "SELECT * FROM `student`";
    $res = mysqli_query($conn, $getStudentsQuery);


    $students = array();

    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            $data = array(
                "student_id" => $row['student_id'],
                "student_name" => htmlspecialchars($row['student_name']),
                "student_address" => htmlspecialchars($row['student_address'])
            );

            $students[] = $data;
        }

        echo json_encode($students);
    }