<?php
require_once('../classes/db_connection.php');

// Initialize an array to store monthly booking counts
$monthlyBookings = [];

// Query to fetch monthly booking counts
$query = "SELECT DATE_FORMAT(check_in, '%Y-%m') AS month, COUNT(*) AS total_bookings FROM Bookings GROUP BY DATE_FORMAT(check_in, '%Y-%m')";
$result = $conn->query($query);

// Check if query executed successfully
if ($result) {
    // Fetch each row and store it in the $monthlyBookings array
    while ($row = $result->fetch_assoc()) {
        $month = $row['month'];
        $totalBookings = $row['total_bookings'];
        $monthlyBookings[$month] = $totalBookings;
    }
}

// Output the data as JSON
echo json_encode($monthlyBookings);

// Close the database connection
$conn->close();
?>
