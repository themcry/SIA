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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/1.css">
</head>

<body>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .room-status {
            display: flex;
            flex-wrap: wrap;
        }

        .room {
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .room h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .room p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .room button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .room button:hover {
            background-color: #0056b3;
        }

        .status-clean {
            color: #4caf50;
        }

        .status-dirty {
            color: #f44336;
        }

        .status-maintenance {
            color: #ffa500;
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
                        <div id="mySidebar" class="sidebar">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#changePasswordModal">Change Password</button>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAccountModal">Add Account</button>
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
                        <div class="container">
                                <h1>Room Status Updates</h1>
                                <div class="room-status">
                                    <div class="room">
                                        <h2>Room 01</h2>
                                        <p>Status: <span id="status01" class="status-clean">Clean</span></p>
                                        <button onclick="updateStatus('01')">Toggle Status</button>
                                    </div>
                                    <div class="room">
                                        <h2>Room 11</h2>
                                        <p>Status: <span id="status11" class="status-dirty">Dirty</span></p>
                                        <button onclick="updateStatus('11')">Toggle Status</button>
                                    </div>
                                    <div class="room">
                                        <h2>Room 20</h2>
                                        <p>Status: <span id="status20" class="status-maintenance">Maintenance</span></p>
                                        <button onclick="updateStatus('20')">Toggle Status</button>
                                    </div>
                                    <div class="room">
                                        <h2>Room 16</h2>
                                        <p>Status: <span id="status16" class="status-maintenance">Maintenance</span></p>
                                        <button onclick="updateStatus('16')">Toggle Status</button>
                                    </div>
                                    <div class="room">
                                        <h2>Room 17</h2>
                                        <p>Status: <span id="status17" class="status-maintenance">Maintenance</span></p>
                                        <button onclick="updateStatus('17')">Toggle Status</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <div class="modal fade" id="changePasswordModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="changePasswordForm">
          <div class="form-group">
            <label for="currentPassword">Current Password:</label>
            <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
          </div>
          <div class="form-group">
            <label for="newPassword">New Password:</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
          </div>
          <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Add Account Modal -->
<div class="modal fade" id="addAccountModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Account</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form id="addAccountForm">
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Add Account</button>
        </form>
      </div>

    </div>
  </div>
</div>

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
        <a href="logout.php" class="btn btn-primary">Logout</a>
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
            <script>
                function updateStatus(roomNumber) {
                    var statusElement = document.getElementById("status" + roomNumber);
                    var currentStatus = statusElement.textContent;
                    var newStatus;
                    if (currentStatus === "Clean") {
                        newStatus = "Dirty";
                    } else if (currentStatus === "Dirty") {
                        newStatus = "Maintenance";
                    } else {
                        newStatus = "Clean";
                    }
                    statusElement.textContent = newStatus;
                    statusElement.classList.toggle("status-clean", newStatus === "Clean");
                    statusElement.classList.toggle("status-dirty", newStatus === "Dirty");
                    statusElement.classList.toggle("status-maintenance", newStatus === "Maintenance");
                }
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script src="../assets/js/1.js"></script>
</body>

</html>