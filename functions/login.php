<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['uname'];
  $password = $_POST['psw'];

  if (empty($username)) {
      header("Location: index.php?error=Invalid Username");
	    exit();
  } else if (empty($password)) {
      header("Location: index.php?error=Invalid Password");
      exit();
  }

  $stmt = $conn->prepare("SELECT userid, name, password FROM user_account WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['user_id'] = $row['userid'];
        $_SESSION['user_name'] = $row['name'];
        header('Location: ../pages-admin/Dashboard.php');
        exit(); 
    } else {
      header("Location: index.php?error=Invalid Username or Password");
			exit();
    }
  } else {
    header("Location: index.php?error=Invalid Username or Password");
		exit();
  }
}
