

<?php
require('../classes/db_connection.php');

    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
    // $stmt->bind_param("i", $_POST['id']);

    // Execute the statement
    if ($stmt->execute([$id])) {
        // Account deletion successful
        header('Location: ../pages-admin/Dashboard.php?status=deleted');
        exit();
    } else {
        // Account deletion failed
        header("Location: ../pages-admin/Dashboard.php?error=Failed to delete account");
        exit();
    }

?>

