<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task_id = $_POST['task_id'];

    $sql = "DELETE FROM housekeeping WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $task_id); 

    if ($stmt->execute()) {
        echo 'Record deleted successfully';
    } else {
        echo 'Error deleting record: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header('Location: ../pages-admin/house.php');
    exit();
}
?>
