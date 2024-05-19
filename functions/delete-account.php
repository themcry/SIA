

<?php
require('../classes/db_connection.php');

    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
    // $stmt->bind_param("i", $_POST['id']);

    if ($stmt->execute([$id])) {
       
        header('Location: ../pages-admin/Dashboard.php?status=deleted');
        exit();
    } else {
        
        header("Location: ../pages-admin/Dashboard.php?error=Failed to delete account");
        exit();
    }

?>

