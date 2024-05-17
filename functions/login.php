<?php
session_start();
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT id, username, password FROM accounts WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
 
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];

                header('Location: ../pages-admin/Dashboard.php');
                exit();
            } else {
           
                header("Location: ../index.php?error=Invalid Password");
                exit();
            }
        } else {
         
            header("Location: ../index.php?error=User not found");
            exit();
        }
    } else {
        
        header("Location: ../index.php?error=Username or password not provided");
        exit();
    }
} else {

    header("Location: ../index.php");
    exit();
}
?>
