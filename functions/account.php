<?php
include('../classes/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['accountID'];
    $username = $_POST['editUsername'];
    $password = $_POST['editPassword'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $conn->prepare("UPDATE accounts SET username = ?, password = ? WHERE id = ?");
    // $stmt->bind_param("ssi", $username, $password, $id);

    if ($stmt->execute([$username, $password, $id])) {
        header('Location: ../pages-admin/Dashboard.php?status=updated');
        exit();
    } else {
        header('Location: ../pages-admin/Dashboard.php?status=error');
        exit();
    }
} else {
    header('Location: ../pages-admin/Dashboard.php?status=error');
    exit();
}
?>