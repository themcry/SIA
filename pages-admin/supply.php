<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supply</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.jpg" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/1.css">
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
        <main>
            <div class="container-fluid p-3">

                <div class="card bg-transparent border-0">

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-3">


                        </div>
                        <main>
                            <div class="container-fluid p-3">
                                <div class="card bg-transparent border-0">
                                    <div class="card-body">
                                        <div class="containers">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <p class="h5 mb-0 font-weight-bold text-gray-800"><i class="lni lni-package me-3"></i>Supply</p>
                                                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addSupplyModal">Add Supply</button>
                                                        </div>
                                                        <div class="input-group" style="max-width: 350px; padding: 10px;">
                                                                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                                            </div>
                                                        <table class="supply-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Supply ID</th>
                                                                    <th>Supply Name</th>
                                                                    <th>Quantity</th>
                                                                    <th>Unit Price</th>
                                                                    <th>Available Quantity</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>101</td>
                                                                    <td>Bath Towels</td>
                                                                    <td>100</td>
                                                                    <td>P300.00</td>
                                                                    <td>80</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSupplyModal">Edit</button>
                                                                        <button href="" class="btn btn-danger btn-sm" type="button">Delete</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>102</td>
                                                                    <td>Bed Sheets</td>
                                                                    <td>200</td>
                                                                    <td>P800.50</td>
                                                                    <td>150</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSupplyModal">Edit</button>
                                                                        <button href="" class="btn btn-danger btn-sm" type="button">Delete</button>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>103</td>
                                                                    <td>Pillows</td>
                                                                    <td>50</td>
                                                                    <td>P150.00</td>
                                                                    <td>45</td>
                                                                    <td>
                                                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSupplyModal">Edit</button>
                                                                        <button href="" class="btn btn-danger btn-sm" type="button">Delete</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                        </main>

                        <!-- Add Supply Modal -->
                        <div class="modal fade" id="addSupplyModal" tabindex="-1" aria-labelledby="addSupplyModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSupplyModalLabel">Add Supply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="supplyName" class="form-label">Supply Name</label>
                                                <input type="text" class="form-control" id="supplyName">
                                            </div>
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="quantity">
                                            </div>
                                            <div class="mb-3">
                                                <label for="unitPrice" class="form-label">Unit Price</label>
                                                <input type="text" class="form-control" id="unitPrice">
                                            </div>
                                            <div class="mb-3">
                                                <label for="availableQuantity" class="form-label">Available Quantity</label>
                                                <input type="number" class="form-control" id="availableQuantity">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Add Supply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Supply Modal -->
                        <div class="modal fade" id="editSupplyModal" tabindex="-1" aria-labelledby="editSupplyModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSupplyModalLabel">Edit Supply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="editSupplyName" class="form-label">Supply Name</label>
                                                <input type="text" class="form-control" id="editSupplyName">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editQuantity" class="form-label">Quantity</label>
                                                <input type="number" class="form-control" id="editQuantity">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editUnitPrice" class="form-label">Unit Price</label>
                                                <input type="text" class="form-control" id="editUnitPrice">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editAvailableQuantity" class="form-label">Available Quantity</label>
                                                <input type="number" class="form-control" id="editAvailableQuantity">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                        <!-- script for search -->
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const searchInput = document.getElementById('searchInput');
                                const rows = document.querySelectorAll('.supply-table tbody tr');

                                searchInput.addEventListener('input', function() {
                                    const searchTerm = searchInput.value.trim().toLowerCase();

                                    rows.forEach(row => {
                                        const cells = row.querySelectorAll('td');
                                        let found = false;

                                        cells.forEach(cell => {
                                            if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                                found = true;
                                            }
                                        });

                                        if (found) {
                                            row.style.display = '';
                                        } else {
                                            row.style.display = 'none';
                                        }
                                    });
                                });
                            });
                        </script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                        <script src="../assets/js/1.js"></script>
</body>

</html>