<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $room_type = $_POST['room_type'];
        $price = $_POST['price'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO room (room_type, price) VALUES ('$room_type', '$price')";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../pages-admin/room.php');
            exit(); 
        } else {
            echo 'Error';
            exit();
        }
    

    $conn->close();
} 
?>
