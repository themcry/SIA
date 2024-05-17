<?php
session_start(); 

if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
}
require_once('../classes/db_connection.php');

// Fetch booking data
$query2 = "SELECT * FROM Bookings";
$result2 = $conn->query($query2);

$bookings = array();
while($row = $result2->fetch_assoc()) {
    $bookings[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.jpg" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/1.css">
    </head>
    <body>
    <style>
    .calendar {
            max-width: 100%;
            margin-top: 20px;
            overflow-x: auto;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #FFFDFE;
        }


        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid #ccc;
        }

        .calendar-body {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            padding: 20px;
        }

        .day-cell {
            padding: 20px; 
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: bold;
            border-radius: 20%;
            margin: 10px;
            font-size: 1.2em; /
        }

        .booking {
            position: relative;
        }

        .booking-indicator {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 10px;
            background-color: #4caf50;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

        .other-month {
            color: #ccc;
        }

        .booking-details {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
            display: none;
        }

        .booking-details h3 {
            margin-bottom: 10px;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
</style>

</head>
<header>
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

        <main style="margin-top: 5px;">
        <div class="container p-3">
            <div class="card bg-transparent border-0" style="font-size: 14px;">
                <div class="card-body">
                    <h2 class="text-center mb-4">Booking</h2>
                    <div class="calendar">
                        <div class="calendar-header">
                            <button id="prevBtn" class="btn btn-light"><i class="material-icons-outlined">Prev</i></button>
                            <h2 id="currentMonthYear" class="text-primary"></h2>
                            <button id="nextBtn" class="btn btn-light"><i class="material-icons-outlined">Next</i></button>
                        </div>
                        <div class="calendar-body" id="calendarBody">
                        </div>
                        <div id="bookingDetails" style="display: none;">
                            <div id="bookingDetailsContent"></div>
                            <button onclick="closeBookingDetails()">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="booking-details" id="bookingDetails">
        <span class="close-btn" onclick="closeBookingDetails()">&times;</span>
        <h3 class="text-center mb-4">Booking Details</h3>
        <div id="bookingDetailsContent"></div>
    </div>

    <script>
        // Embed PHP booking data as JSON
        const bookings = <?php echo json_encode($bookings); ?>;
        
        // Function to generate calendar days
        function generateCalendar(month, year) {
            const calendarBody = document.getElementById('calendarBody');
            calendarBody.innerHTML = ''; // Clear existing calendar
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            for (let i = 1; i <= daysInMonth; i++) {
                const dayCell = document.createElement('div');
                dayCell.classList.add('day-cell', 'bg-light');
                dayCell.textContent = i;

                // Check if there are bookings on this date
                const booking = bookings.find(booking => {
                    const startDate = new Date(booking.check_in);
                    const endDate = new Date(booking.check_out);
                    return startDate.getDate() <= i && i <= endDate.getDate() &&
                        startDate.getMonth() === month && endDate.getMonth() === month &&
                        startDate.getFullYear() === year && endDate.getFullYear() === year;
                });

                if (booking) {
                    dayCell.classList.add('booking');
                    const bookingIndicator = document.createElement('div');
                    bookingIndicator.classList.add('booking-indicator');
                    const startDate = new Date(booking.check_in);
                    const endDate = new Date(booking.check_out);
                    const duration = (endDate.getDate() - startDate.getDate()) + 1;
                    const indicatorHeight = (100 / daysInMonth) * duration;
                    bookingIndicator.style.height = `${indicatorHeight}%`;
                    dayCell.appendChild(bookingIndicator);
                    // Add hover functionality to show booking details
                    dayCell.title = `${booking.name} (${booking.room_type})`;
                }

                dayCell.addEventListener('click', () => {
                    if (booking) {
                        displayBookingDetails(booking);
                    }
                });

                calendarBody.appendChild(dayCell);
            }
        }

        // Display booking details in a popup
        function displayBookingDetails(booking) {
            const bookingDetailsContent = document.getElementById('bookingDetailsContent');
            bookingDetailsContent.innerHTML = `<p>Name: ${booking.name}</p><p>Type: ${booking.room_type}</p>`;
            document.getElementById('bookingDetails').style.display = 'block';
        }

        // Close booking details popup
        function closeBookingDetails() {
            document.getElementById('bookingDetails').style.display = 'none';
        }

        // Initial calendar generation
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();
        generateCalendar(currentMonth, currentYear);
        document.getElementById('currentMonthYear').textContent = new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(new Date(currentYear, currentMonth));

        // Event listeners for previous and next buttons
        document.getElementById('prevBtn').addEventListener('click', () => {
            if (currentMonth === 0) {
                currentMonth = 11;
                currentYear--;
            } else {
                currentMonth--;
            }
            generateCalendar(currentMonth, currentYear);
            document.getElementById('currentMonthYear').textContent = new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(new Date(currentYear, currentMonth));
        });

        document.getElementById('nextBtn').addEventListener('click', () => {
            if (currentMonth === 11) {
                currentMonth = 0;
                currentYear++;
            } else {
                currentMonth++;
            }
            generateCalendar(currentMonth, currentYear);
            document.getElementById('currentMonthYear').textContent = new Intl.DateTimeFormat('en-US', { month: 'long', year: 'numeric' }).format(new Date(currentYear, currentMonth));
        });
    </script>

<?php include('modals-for-admin.php'); ?>

<script>
function deleteAccount(id) {
            window.location.href = "../functions/delete-account.php?id="+id;
        }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../assets/js/1.js"></script>
    <script>
$(document).ready(function(){
    // Add a click event listener to the document and delegate it to the edit and delete buttons
    $(document).on('click', '.edit-btn', function(){
        // Find the closest row containing the edit button
        var row = $(this).closest("tr");
        // Extract the data from the row
        var id = row.find(".id").text();
        var username = row.find(".username").text();
        // Set the values in the edit modal
        $("#editAccountId").val(id);
        $("#editUsername").val(username);
        // Show the edit modal
        $("#editAccountModal").modal('show');
    });

    // Add a click event listener to the delete button with class 'delete-btn'
$(".delete-btn").click(function(){
    // Find the closest row containing the delete button
    var row = $(this).closest("tr");
    // Extract the data from the row
    var id = row.find(".id").text();
    
    // Set the value of the hidden input field with the account ID
    $("#delete-id").val(id);
    
    // Show the delete modal
    $("#deleteAccountModal").modal('show');
});
});

</script>
</body>
</html>