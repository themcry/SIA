<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];
    $room_no = $_POST['room_no'];
    $room_status = $_POST['room_status'];
    $task_type = $_POST['task_type'];
    $description = $_POST['description'];

    $sql = "UPDATE housekeeping SET room_no = ?, room_status = ?, task_type = ?, description = ? WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $room_no, $room_status, $task_type, $description, $task_id);

    if ($stmt->execute()) {
        echo 'Record updated successfully';
    } else {
        echo 'Error updating record: ' . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header('Location: ../pages-admin/house.php');
    exit();
}
?>