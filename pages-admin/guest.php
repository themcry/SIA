<?php
session_start(); 
require_once('../classes/db_connection.php');
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}
$query1 = "SELECT * FROM room";
$result1 = $conn->query($query1);

$query2 = "SELECT * FROM Bookings";
$result2 = $conn->query($query2);

$array = [];
while($row3 = $result1->fetch_assoc()) {
    $array[] = $row3;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guest</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.jpg" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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

        <main  style="margin-top: 68px;">
        <div class="container-fluid p-3">
          <div class="card bg-transparent border-0" style="font-size: 14px;">
            <div class="card-body">
          <h2>Guest</h2>
          <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add Task</button>






    
<table class="table">
  <thead>
    <tr>
      <th scope="col">Book ID</th>
      <th scope="col">Name</th>
      <th scope="col">R.Type</th>
      <th scope="col">No.</th>
      <th scope="col">Check In</th>
      <th scope="col">Check Out</th>
      <th scope="col">Guest</th>
      <th scope="col">Status</th>
      <th scope="col">Total</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php while($row = $result2->fetch_assoc()){ 
        if($row['status'] == 0){
            $status = "Reserved";
        }else{
            $status = "In House";
        }
        ?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['room_type']; ?></td>
      <td><?php echo $row['room_id']; ?></td>
      <td><?php echo $row['check_in']; ?></td>
      <td><?php echo $row['check_out']; ?></td>
      <td><?php echo $row['guest']; ?> Person(s)</td>
      <td><?php echo $status; ?></td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
        </svg></button>&nbsp;
        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editGuestModal<?php echo $row['id'];?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
            </svg>
        </button>
        </td>
    
    </tr>
    <div class="modal fade" id="editGuestModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="addTaskModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGuestModalLabel<?php echo $row['id']; ?>">Edit Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../functions/edit-bookings.php">
                        <input type="hidden" name="booking_id" value="<?php echo $row['id'] ?>">
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Name:</label>
                            <input type="text" class="form-control" name="fullName" value="<?php echo $row['name'];?>" required>
                        </div>
                        <div class="mb-3">
                        <label for="roomstatus" class="form-label">Room Type:</label>
                            <select class="form-select" id="roomStatus" name="room_id" required>
                                <?php  foreach($array as $row3) {?>
                                <option value="<?php echo $row3["room_id"]?>"><?php echo $row3["room_type"]?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tasktype" class="form-label">Check In:</label>
                            <input type="date" class="form-control" name="checkIn" value="<?php echo $row['check_in'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Check Out:</label>
                            <input type="date" class="form-control" name="checkOut" value="<?php echo $row['check_out'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Guests:</label>
                            <input type="number" class="form-control" name="guest" value="<?php echo $row['guest'];?>" required>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Edit Guest</button>
                    </form>
                </div>
            </div>
        </div>
                                </div>
    <?php } ?>
  </tbody>
</table>
      </main>
      <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../functions/bookings.php">
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Name:</label>
                            <input type="text" class="form-control" name="fullName">
                        </div>
                        <div class="mb-3">
                        <label for="roomstatus" class="form-label">Room Type:</label>
                            <select class="form-select" id="roomStatus" name="room_id">
                                <?php  foreach($array as $row3) {?>
                                <option value="<?php echo $row3["room_id"]?>"><?php echo $row3["room_type"]?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tasktype" class="form-label">Check In:</label>
                            <input type="date" class="form-control" name="checkIn">
                        </div>
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Check Out:</label>
                            <input type="date" class="form-control" name="checkOut">
                        </div>
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Guests:</label>
                            <input type="number" class="form-control" name="guest">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Add Guest</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php while($row2 = $result2->fetch_assoc()){?>
    <div class="modal fade" id="editGuestModal<?php echo $row2['id']; ?>" tabindex="-1" aria-labelledby="addTaskModalLabel<?php echo $row2['id']; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editGuestModalLabel<?php echo $row2['id']; ?>">Edit Guest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="../functions/bookings.php">
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Name:</label>
                            <input type="text" class="form-control" name="fullName">
                        </div>
                        <div class="mb-3">
                        <label for="roomstatus" class="form-label">Room Type:</label>
                            <select class="form-select" id="roomStatus" name="room_id">
                                <?php  while($row3 = $result1->fetch_assoc()) {?>
                                <option value="<?php echo $row3["room_id"]?>"><?php echo $row3["room_type"]?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tasktype" class="form-label">Check In:</label>
                            <input type="date" class="form-control" name="checkIn">
                        </div>
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Check Out:</label>
                            <input type="date" class="form-control" name="checkOut">
                        </div>
                        <div class="mb-3">
                            <label for="taskdescription" class="form-label" >Guests:</label>
                            <input type="number" class="form-control" name="guest">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Edit Guest</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <!--Billing Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="bookingModalLabel">Current Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <h6>Guest</h6>
              <p>John Doe</p>
            </div>
            <div class="col-md-6">
              <h6>Book ID</h6>
              <p>123456</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h6>Check in</h6>
              <p>Sun, 24 Mar 2024</p>
            </div>
            <div class="col-md-6">
              <h6>Check out</h6>
              <p>Mon, 25 Mar 2024</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h6>Room Type</h6>
              <p>Deluxe</p>
            </div>
            <div class="col-md-6">
              <h6>Room No.</h6>
              <p>Room 20</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h6>Booking Summary</h6>
              <table class="table table-bordered">
                <tr>
                  <th>Room Total (1 night)</th>
                  <td>1000.00</td>
                </tr>
                <tr>
                  <th>Sub Total</th>
                  <td>1600.00</td>
                </tr>
                <tr>
                  <th>Total</th>
                  <td>1440.00</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	<!-- END OF BILLING -->


    <?php include('modals-for-admin.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../assets/js/1.js"></script>
    

    <script>
        function deleteAccount(id) {
            window.location.href = "../functions/delete-account.php?id="+id;
        }


    </script>
</body>
</html>
