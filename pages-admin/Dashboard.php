<?php
session_start(); 
require_once('../classes/db_connection.php');
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.jpg" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/1.css">
    
    <!-- LineIcons -->
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-grid-alt"></i>
                </button>
                <div class="sidebar-logo">
                    <img src="../images/logo.png" alt="Logo">
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="../pages-admin/Dashboard.php" class="sidebar-link active">
                        <i class="lni lni-grid-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#front" aria-expanded="false">
                        <i class="material-symbols-outlined">desk</i>
                        <span>Front-Desk</span>
                    </a>
                    <ul id="front" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="../pages-admin/guest.php" class="sidebar-link">Guest</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../pages-admin/book.php" class="sidebar-link">Booking</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#back" aria-expanded="false">
                        <i class="material-symbols-outlined">support_agent</i>
                        <span>Back-Office</span>
                    </a>
                    <ul id="back" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="../pages-admin/house.php" class="sidebar-link">Housekeeping</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../pages-admin/room.php" class="sidebar-link">Room</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#inventory" aria-expanded="false">
                        <i class="material-symbols-outlined">inventory</i>
                        <span>Inventory</span>
                    </a>
                    <ul id="inventory" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="../pages-admin/supply.php" class="sidebar-link">Supply</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#manageAccountsModal">
                    <i class="lni lni-cog"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>

    <main style="height: 100vh; overflow: hidden;">
        <div class="container-fluid p-3">
            <div class="card bg-transparent border-0">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <p class="h5 mb-0 font-weight-bold text-gray-800"><i class="fa-solid fa-chart-line me-3"></i>Dashboard</p>
                    </div>
                    <!-- Content Row -->
                    <div class="row g-2">

                    <?php
// Get today's date in the format yyyy-mm-dd
$today_date = date("Y-m-d");

// Query to get today's bookings
$query = "SELECT COUNT(*) AS today_bookings_count FROM Bookings WHERE DATE(check_in) = '$today_date'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $today_bookings_count = $row['today_bookings_count'];
} else {
    $today_bookings_count = 0;
}
?>
<!-- Today Booking Card -->
<div class="card-column mb-2">
    <div class="card border-0 border-4 border-start border-primary shadow h-100 py-2 bg-primary">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-s font-weight-bold text-white text-uppercase mb-1">Today Bookings</div>
                    <div class="h1 mb-0 font-weight-bold text-white"><?php echo $today_bookings_count; ?></div>
                </div>
                <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                        <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>






           <!-- Vacant Room Card -->
<?php 
$query = "SELECT COUNT(*) AS vacant_rooms_count FROM room";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $vacant_rooms_count = $row['vacant_rooms_count'];
} else {
    $vacant_rooms_count = 0;
}
?>
<div class="card-column mb-2">
    <div class="card border-0 border-4 border-start border-info shadow h-100 py-2 bg-info">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-small font-weight-bold text-white text-uppercase mb-1">Vacant Rooms</div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h1 mb-0 mr-3 font-weight-bold text-white"><?php echo $vacant_rooms_count; ?></div> <!-- Display the vacant rooms count here -->
                        </div>
                    </div>
                </div>
                <div class="col-auto align-items-center mt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-segmented-nav" viewBox="0 0 16 16">
                        <path d="M0 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v2a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm6 3h4V5H6zm9-1V6a1 1 0 0 0-1-1h-3v4h3a1 1 0 0 0 1-1"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>


           <!-- Query to get the total number of bookings -->
<?php 
$query = "SELECT COUNT(*) as total_bookings FROM Bookings";
$result = $conn->query($query); 

if ($result->num_rows > 0) {
    // Fetch the total bookings count
    $row = $result->fetch_assoc();
    $total_bookings = $row['total_bookings'];
} else {
    $total_bookings = 0;
}
?>

<!-- Total Bookings Card -->
<div class="card-column mb-2">
    <div class="card border-0 border-4 border-start border-warning shadow h-100 py-2 bg-warning">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-small font-weight-bold text-white text-uppercase mb-1">Total Bookings</div>
                    <div class="h1 mb-0 font-weight-bold text-white"><?php echo $total_bookings; ?></div>
                </div>
                <div class="col-auto align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-layers-half" viewBox="0 0 16 16">
                        <path d="M8 0a.5.5 0 0 0-.252.066l-7 4a.5.5 0 0 0 0 .868l7 4a.5.5 0 0 0 .504 0l7-4a.5.5 0 0 0 0-.868l-7-4A.5.5 0 0 0 8 0zm6.752 4L8 7.467 1.248 4 8 .533 14.752 4zM.045 8.768a.5.5 0 0 1 .682-.183L8 12.199l7.273-3.614a.5.5 0 1 1 .499.864l-7.5 3.75a.5.5 0 0 1-.473 0l-7.5-3.75a.5.5 0 0 1-.183-.682z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

                        
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header bg-transparent py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total Booking of Year/Month</h6>
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                    <canvas id="monthlyBookingsChart" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
    </main>
    <?php include('modals-for-admin.php'); ?>
    <!-- jQuery (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzBa9P30+Y65nT3oB4JUUIsdRRAKkIVkIbo4rxQpEwE5" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyfIhG6j6KbU5l5U07ikChcb6ILm1fM92lw68i3EnfF5Nq3o5xgQAK+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Custom JS -->
    <script src="../assets/js/1.js"></script>

    <script>
    // Function to fetch data from PHP script
    async function fetchMonthlyBookingData() {
        const response = await fetch('../functions/get_booking_data.php');
        const data = await response.json();
        return data;
    }

    // Function to create chart
    async function createChart() {
        // Fetch data
        const monthlyBookingData = await fetchMonthlyBookingData();

        // Get canvas element
        const ctx = document.getElementById('monthlyBookingsChart').getContext('2d');

        // Create chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: Object.keys(monthlyBookingData), // Month names
                datasets: [{
                    label: 'Total Bookings',
                    data: Object.values(monthlyBookingData), // Total bookings count
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Bar color
                    borderColor: 'rgba(54, 162, 235, 1)', // Border color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y.toLocaleString();
                                }
                                return label;
                            },
                            title: function(context) {
                                return context.dataset.label || '';
                            }
                        }
                    }
                }
            }
        });
    }

    // Call createChart function when the page is loaded
    document.addEventListener('DOMContentLoaded', createChart);

        function deleteAccount(id) {
            window.location.href = "../functions/delete-account.php?id="+id;
        }


    </script>
</body>
</html>
