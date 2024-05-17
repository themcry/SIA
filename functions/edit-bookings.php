<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $booking_id = $_POST['booking_id']; // Assume booking_id is passed in the POST request
    $name = $_POST['fullName'];
    $room_id = $_POST['room_id'];

    // Fetch room details
    $sql1 = "SELECT * FROM room WHERE room_id = '".$room_id."'";
    $result = $conn->query($sql1);
    $row = $result->fetch_assoc();

    $room_type = $row['room_type'];
    $check_in = $_POST['checkIn'];
    $check_out = $_POST['checkOut'];
    $guest = $_POST['guest'];

    // Update the booking record
    $sql = "UPDATE `Bookings` SET 
                name = '$name', 
                room_type = '$room_type', 
                room_id = '$room_id', 
                check_in = '$check_in', 
                check_out = '$check_out', 
                guest = '$guest' 
            WHERE id = '$booking_id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../pages-admin/guest.php');
        exit(); 
    } else {
        echo 'Error updating record: ' . $conn->error;
        exit();
    }

    $conn->close();
} 
?>
