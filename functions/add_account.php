<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {

            header('Location: ../pages-admin/Dashboard.php?status=success&message=Account added successfully');
            exit(); 
        } else {
     
            header('Location: ../pages-admin/Dashboard.php?status=error&message=' . urlencode('Error adding account: ' . $conn->error));
            exit();
        }
    } else {
        
        header('Location: ../pages-admin/Dashboard.php?status=error&message=Username or password is missing');
        exit();
    }

    $conn->close();
} else {
 
    header('Location: ../pages-admin/Dashboard.php?status=error&message=Invalid request method');
    exit();
}
?>
