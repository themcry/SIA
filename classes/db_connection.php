<?php
$servername = "db-sgp-02.sparkedhost.us:3306";
$username = "u116381_f9syMQtUYW";
$password = "y!XW@RCgoG1FFupWnj^y4yRs";
$dbname = "s116381_sia102";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

