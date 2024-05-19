<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['supp_id']; 

    $sql = "DELETE FROM supply WHERE id = ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); 

    if ($stmt->execute()) {
        header('Location: ../pages-admin/supply.php?status=deleted');
        exit();
    } else {
        header("Location: ../pages-admin/supply.php?error=error");
        exit();
    }

}