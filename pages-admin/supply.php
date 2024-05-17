<?php
session_start(); 

if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
}
?>
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
                        <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                    </div>
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
      </div>

<!-- Edit Modal -->
<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="editAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAccountModalLabel">Edit Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="POST" action="../functions/account.php">
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