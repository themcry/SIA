<?php
require_once('../classes/db_connection.php');


$monthlyBookings = [];


$query = "SELECT DATE_FORMAT(check_in, '%Y-%m') AS month, COUNT(*) AS total_bookings FROM Bookings GROUP BY DATE_FORMAT(check_in, '%Y-%m')";
$result = $conn->query($query);

if ($result) {
    
    while ($row = $result->fetch_assoc()) {
        $month = $row['month'];
        $totalBookings = $row['total_bookings'];
        $monthlyBookings[$month] = $totalBookings;
    }
}


echo json_encode($monthlyBookings);


$conn->close();
?>
