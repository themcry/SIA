<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['fullName'];
    $room_id = $_POST['room_id'];

    
    $sql1 = "SELECT * FROM room WHERE room_id = '".$room_id."'";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();

    $room_type = $row['room_type'];
    $price = $row['price']; 
    $check_in = $_POST['checkIn'];
    $check_out = $_POST['checkOut'];
    $guest = $_POST['guest'];

    
    $sql = "INSERT INTO `Bookings` (name, room_type, room_id, check_in, check_out, guest, price) VALUES ('$name', '$room_type', '$room_id', '$check_in', '$check_out', '$guest', '$price')";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../pages-admin/guest.php');
        exit();
    } else {
        echo 'Error: ' . $conn->error;
        exit();
    }

    $conn->close();
}
?>
