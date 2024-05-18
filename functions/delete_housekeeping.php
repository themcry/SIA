<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];

    $sql = "DELETE FROM housekeeping WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $task_id); 

    if ($stmt->execute()) {
        header('Location: ../pages-admin/house.php?status=deleted');
        exit();
    } else {
        header("Location: ../pages-admin/house.php?error=error");
        exit();
    }



}
?>
