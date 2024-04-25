<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housekeeping</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo1.jpg" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/1.css">
    </head>
<!-- <style>
.card-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.card {
  width: 300px;
  height: 200px;
  border: 1px solid black;
  padding: 15px;
  margin: 15px;
  box-sizing: border-box;
}

.card h2 {
  margin: 0;
}

.card-content {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

</style> -->
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
            <a href="#" class="sidebar-link">
                        <i class="lni lni-cog"></i>
                        <span>Setting</span>
                <a href="#" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
      <main >
        <div class="container-fluid p-3">
          <div class="card bg-transparent border-0" style="font-size: 14px;">
            <div class="card-body">
          <h2>Housekeeping</h2>
   
<body>
<div class="container-fluid p-3">
                <div class="card bg-transparent border-0" style="font-size: 14px;">
                    <div class="card-body">
                        <div class="containers">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Task Details</h4>
                                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add Task</button>
                                        </div>
                                        <div class="card-body table-responsive">
                                            <table class="table table-custom">
                                                <thead>
                                                    <tr>
                                                        <th>Task ID</th>
                                                        <th>Room No.</th>
                                                        <th>Task Type</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>213123</td>
                                                        <td>69</td>
                                                        <td>Cleaning</td>
                                                        <td>General Cleaning of the room</td>
                                                        <td>Pending</td>
                                                        <td>
                                                            <a href="" class="btn btn-success btn-sm">Edit</a>
                                                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>987654</td>
                                                            <td>101</td>
                                                            <td>Maintenance</td>
                                                            <td>Fixing broken faucet</td>
                                                            <td>In Progress</td>
                                                            <td>
                                                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>456789</td>
                                                            <td>205</td>
                                                            <td>Laundry</td>
                                                            <td>Washing bed linens</td>
                                                            <td>Completed</td>
                                                            <td>
                                                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>333222</td>
                                                            <td>42</td>
                                                            <td>Repairs</td>
                                                            <td>Repairing broken window</td>
                                                            <td>Pending</td>
                                                            <td>
                                                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>777888</td>
                                                            <td>501</td>
                                                            <td>Cleaning</td>
                                                            <td>General CLeaning</td>
                                                            <td>Completed</td>
                                                            <td>
                                                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                                                <a href="" class="btn btn-danger btn-sm">Delete</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="roomnum" class="form-label">Room Number</label>
                        <input type="text" class="form-control" id="roomId">
                    </div>
                    <div class="mb-3">
                        <label for="roomstatus" class="form-label">Room Status</label>
                        <select class="form-select" id="roomStatus">
                            <option value="clean">Clean</option>
                            <option value="dirty">Dirty</option>
                            <option value="under_maintenance">Under Maintenance</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tasktype" class="form-label">Task Type</label>
                        <select class="form-select" id="taskType">
                            <option value="cleaning">Cleaning</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="repair">Repair</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="taskdescription" class="form-label">Task Description</label>
                        <textarea class="form-control" id="taskDescription" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Task</button>
            </div>
        </div>
    </div>
</div>
    <!-- <div class="card-container">
    <div class="card">
        <h2>To-Do</h2>
        <div class="card-content">
        <p>Room 069 - In Progress - John Doe</p>
        <p>Room 069 - In Progress - John Doe</p>
        </div>
    </div>
    </div> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../assets/js/1.js"></script>
</html>