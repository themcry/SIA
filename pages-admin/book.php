<?php
session_start(); 

if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
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
                <li class="sidebar-item" class="nav-link active">
                    <a href="../pages-admin/Dashboard.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#front" aria-expanded="false" aria-controls="front">
                        <i class="material-symbols-outlined"> desk </i>
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
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#back" aria-expanded="false" aria-controls="back">
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
                    <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                        data-bs-target="#inventory" aria-expanded="false" aria-controls="inventory">
                        <i class="material-symbols-outlined">inventory</i>
                        <span>inventory</span>
                    </a>
                    <ul id="inventory" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="../pages-admin/supply.php" class="sidebar-link">Supply</a>
                        </li>
                    </ul>
                </li>
                
            </ul>
            <div class="sidebar-footer">
            <a href="#" data-toggle="modal" data-target="#myModal" class="sidebar-link" >
                        <i class="lni lni-cog" onclick="openNav()"></i>
                        <span>Settings</span>
                        <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#manageAccountsModal">Manage Accounts</button>
<!-- The Modal -->
</div>

<a href="#" class="sidebar-link" data-toggle="modal" data-target="#logoutModal">
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
        const bookings = [
            { start: '2024-05-05', end: '2024-05-07', type: 'Deluxe', name: 'John Doe' },
            { start: '2024-05-10', end: '2024-05-12', type: 'Premium', name: 'Jane Smith' }
            // Add more booking data here
        ];

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
                    const startDate = new Date(booking.start);
                    const endDate = new Date(booking.end);
                    return startDate.getDate() <= i && i <= endDate.getDate() &&
                        startDate.getMonth() === month && endDate.getMonth() === month &&
                        startDate.getFullYear() === year && endDate.getFullYear() === year;
                });

                if (booking) {
                    dayCell.classList.add('booking');
                    const bookingIndicator = document.createElement('div');
                    bookingIndicator.classList.add('booking-indicator');
                    const startDate = new Date(booking.start);
                    const endDate = new Date(booking.end);
                    const duration = (endDate.getDate() - startDate.getDate()) + 1;
                    const indicatorHeight = (100 / daysInMonth) * duration;
                    bookingIndicator.style.height = `${indicatorHeight}%`;
                    dayCell.appendChild(bookingIndicator);
                    // Add hover functionality to show booking details
                    dayCell.title = `${booking.name} (${booking.type})`;
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
            bookingDetailsContent.innerHTML = `<p>Name: ${booking.name}</p><p>Type: ${booking.type}</p>`;
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


<!-- The Logout Modal -->
<div class="modal fade" id="logoutModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirm Logout</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <p>Are you sure you want to logout?</p>
      </div>

      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="../functions/logout.php" class="btn btn-primary">Logout</a>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="manageAccountsModal" tabindex="-1" aria-labelledby="manageAccountsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="manageAccountsModalLabel">Manage Accounts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" action="../functions/add_account.php">
                <form id="addAccountForm" style="display: inline-flex; gap: 10px; flex-wrap: wrap;">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                    </div>
                    <button type="submit" class="btn btn-success">Add Account</button>
                </form>


               <!-- List of existing accounts -->
<h5 class="mt-4">Existing Accounts:</h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody id="accountList">
        <?php
        require_once('../classes/db_connection.php');

        $sql = "SELECT id, username FROM accounts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th scope='row'>" . $row["id"] . "</th>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>";
                echo "<button type='button' class='btn btn-primary edit-btn' id='editButton' data-bs-toggle='modal' data-bs-target='#editAccountModal'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/>
                    </svg>";
                echo "</button>";                
                echo "</button>";
                echo "<button type='button' class='btn btn-danger delete-btn'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                    </svg>";
                echo "</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No accounts found</td></tr>";
        }
 $result->close();

 $conn->close();
 ?>
</tbody>
</table>
            </div>
        </div>
    </div>
</div>
      </div>
      <

<!-- Edit Modal -->
<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editAccountForm">
          <input type="hidden" id="editAccountId">
          <div class="mb-3">
            <label for="editUsername" class="form-label">Username</label>
            <input type="text" class="form-control" id="editUsername" required>
          </div>
          <div class="mb-3">
            <label for="editPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="editPassword" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChangesBtn">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <?php
if (isset($_GET['success'])) {
    $successMessage = $_GET['success'];
    echo "<div class='success-message'>$successMessage</div>";
}
?>
            <form method="POST" action="../functions/delete-account.php">
                <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this account?</p>
                <form id="deleteAccountForm">
                    <input type="hidden" id="delete-id" name="id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
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