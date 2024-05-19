<?php
session_start(); 
require_once('../classes/db_connection.php');

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
                                <?php
                                $query = "SELECT * FROM supply";
                                $result = mysqli_query($conn, $query);
                                ?>
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
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<tr>
                                                <td>' . $row['id'] . '</td>
                                                <td>' . $row['supp_name'] . '</td>
                                                <td>' . $row['quantity'] . '</td>
                                                <td>' . $row['unit_price'] . '</td>
                                                <td>' . $row['avail_qty'] . '</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSupplyModal'.$row['id'].'">Edit</button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal'.$row['id'].'">Delete</button>
                                                </td>
                                            </tr>';

                                            ?>
                                            <div class="modal fade" id="editSupplyModal<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="editSupplyModalLabel<?php echo $row['id'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSupplyModalLabel<?php echo $row['id'] ?>">Edit Supply</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form method="post" action="../functions/edit_supply.php">
                                        <div class="mb-3">
                                            <label for="supplyName" class="form-label">Supply Name</label>
                                            <input type="text" class="form-control" id="supplyName" name="supp_name" value="<?php echo $row['supp_name'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="unitPrice" class="form-label">Unit Price</label>
                                            <input type="text" class="form-control" id="unitPrice" name="unit_price" value="<?php echo $row['unit_price'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="availableQuantity" class="form-label">Available Quantity</label>
                                            <input type="number" class="form-control" id="availableQuantity" name="avail_qty" value="<?php echo $row['avail_qty'] ?>">
                                        </div>
                                        <input type="hidden" name="supp_id" value="<?php echo $row['id'] ?>">
                                        <button type="submit" class="btn btn-primary">Update Supply</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                                            
                                            <?php 
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <form method="post" action="../functions/add_supply.php">
                                        <div class="mb-3">
                                            <label for="supplyName" class="form-label">Supply Name</label>
                                            <input type="text" class="form-control" id="supplyName" name="supp_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity">
                                        </div>
                                        <div class="mb-3">
                                            <label for="unitPrice" class="form-label">Unit Price</label>
                                            <input type="text" class="form-control" id="unitPrice" name="unit_price">
                                        </div>
                                        <div class="mb-3">
                                            <label for="availableQuantity" class="form-label">Available Quantity</label>
                                            <input type="number" class="form-control" id="availableQuantity" name="avail_qty">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Add Supply</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


          <!-- Delete Modal -->
          <?php 
          $result = mysqli_query($conn, $query);
          ?>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
<div class="modal fade" id="confirmDeleteModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel<?php echo $row['id']; ?>">Confirm Delete</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="../functions/delete_supply.php">
        <div class="modal-body">
          Are you sure you want to delete this record?
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <input type="hidden" name="supp_id" value="<?php echo $row['id']; ?>">
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
</div>
</div>
</div>



                    <?php include('modals-for-admin.php'); ?>


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
                        <script>
        function deleteAccount(id) {
            window.location.href = "../functions/delete-account.php?id="+id;
        }


    </script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
                        <script src="../assets/js/1.js"></script>
</body>

</html>