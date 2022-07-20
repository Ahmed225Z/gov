<?php
    
    require_once('configer/db_config.php');

    if(isset($_POST['status']) && $_POST['status'] == 'add' && isset($_POST['name']) && isset($_POST['address'])){

        $name = htmlspecialchars($_POST['name']);
        $address = htmlspecialchars($_POST['address']);

        $saveStudent = "INSERT INTO `student` (`student_name`,`student_address`) VALUES ('{$name}', '{$address}')";

        if(mysqli_query($conn, $saveStudent)){
            echo "inserted";
        }else{
            echo "insert Error";
        }
        
    }elseif(isset($_POST['status']) && $_POST['status'] == 'deleteStudent' && isset($_POST['id'])){

        $id = trim(strip_tags(filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT)), " \t");
        $deleteQuery = "DELETE FROM `student` WHERE `student_id` = '$id'";

        if(mysqli_query($conn, $deleteQuery)){
            echo "Deleted";
        }else{
            echo "Delete Error";
        }
        
    }
    