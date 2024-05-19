<?php
require_once('../classes/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['booking_id'])) {
        $booking_id = $_POST['booking_id'];

        $sql = "DELETE FROM Bookings WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $booking_id);

        if ($stmt->execute()) {
            header('Location: ../pages-admin/guest.php');
            exit();
        } else {
            echo 'Error: ' . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
