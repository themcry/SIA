<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
        $room_no = $_POST['room_no'];
        $room_status = $_POST['room_status'];
        $task_type = $_POST['task_type'];
        $description = $_POST['description'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO housekeeping (room_no, room_status, task_type, description) VALUES ('$room_no', '$room_status', '$task_type', '$description')";

        if ($conn->query($sql) === TRUE) {

            header('Location: ../pages-admin/house.php');
            exit(); 
        } else {
            echo 'Error';
            exit();
        }
    

    $conn->close();
} 
?>
