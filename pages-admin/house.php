<?php
session_start(); 
require_once('../classes/db_connection.php');

if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
}


$query = "SELECT * FROM housekeeping";
$result = $conn->query($query);


$query1 = "SELECT * FROM room";
$result1 = $conn->query($query1);

$query2 = "SELECT * FROM housekeeping";
$result2 = $conn->query($query2);

?>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
                <div class="card bg-transparent border-0" style="font-size: 14px;">
                    <div class="card-body">
                        <h4>Housekeeping</h4>

                        <body>
                            <div class="container-fluid p-3">
                                <div class="card bg-transparent border-0" style="font-size: 14px;">
                                    <div class="card-body">
                                        <div class="containers">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h5>Task Details</h5>
                                                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addTaskModal">Add Task</button>
                                                        </div>
                                                        <div class="card-body table-responsive">
                                                            <div class="input-group mb-3" style="max-width: 350px;">
                                                                <input type="text" class="form-control" id="searchInput" placeholder="Search...">
                                                            </div>
                                                            <table class="table table-custom">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Room No.</th>
                                                                        <th>Room Status</th>
                                                                        <th>Task Type</th>
                                                                        <th>Description</th>
                                                                        <th>Status</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php 
                                                                    
                                                                     if ($result->num_rows > 0) {
                                                                        while($row = $result->fetch_assoc()) {

                                                                        if ($row["status"] == 0){
                                                                            $status = "Pending";
                                                                        } elseif($row["status"] == 1){
                                                                            $status = "In Progress";
                                                                        } else {
                                                                            $status = "Completed";
                                                                        }
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $row['room_no']?></td>
                                                                     
                                                                        <td><?php echo $row['room_status']?></td>
                                                                        <td><?php echo $row['task_type']?></td>
                                                                        <td><?php echo $row['description']?></td>
                                                                        <td><?php echo $status?></td>
                                                                        <td>
                                                                            <button href=""  class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal<?php echo $row['task_id'];?>">Edit</button>
                                                                            <button href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTaskModal<?php echo $row['task_id'];?>">Delete</button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php 
                                                                        }    
                                                                            } else {
                                                                                    echo "0 results";
                                                                                }?>
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
                            <!-- Add task Modal -->
                            <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="../functions/housekeeping.php">
                                                <div class="mb-3">
                                                <label for="roomstatus" class="form-label">Room No</label>
                                                    <select class="form-select" id="roomStatus" name="room_no">
                                                    <?php  while($row1 = $result1->fetch_assoc()) {?>
                                                        <option value="<?php echo $row1["room_id"]?>"><?php echo $row1["room_id"]?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="roomstatus" class="form-label">Room Status</label>
                                                    <select class="form-select" id="roomStatus" name="room_status">
                                                        <option value="clean">Clean</option>
                                                        <option value="dirty">Dirty</option>
                                                        <option value="under_maintenance">Under Maintenance</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tasktype" class="form-label">Task Type</label>
                                                    <select class="form-select" id="taskType" name="task_type">
                                                        <option value="cleaning">Cleaning</option>
                                                        <option value="maintenance">Maintenance</option>
                                                        <option value="repair">Repair</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="taskdescription" class="form-label" >Task Description</label>
                                                    <textarea class="form-control" id="taskDescription" rows="3" name="description"></textarea>
                                                </div>
                                          
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Add Task</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- edit task modal -->
                            <?php  while($row2 = $result2->fetch_assoc()) {?>
                            <div class="modal fade" id="editTaskModal<?php echo $row2['task_id'];?>" tabindex="-1" aria-labelledby="editTaskModalLabel<?php echo $row2['task_id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form method="post" action="../functions/edit_housekeeping.php">    
                                          
                                            <div class="mb-3">
                                                 
                                                <label for="roomstatus<?php echo $row2['task_id'];?>" class="form-label">Room No</label>
                                                    <input type="text" class="form-control" id="roomStatus" name="room_no" value="<?php echo $row2['room_no']; ?>" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="roomstatus" class="form-label">Room Status</label>
                                                    <select class="form-select" id="roomStatus" name="room_status" value="<?php echo $row2['room_task']?>">
                                                        <option value="clean" <?php if ($row2['room_status'] == 'clean') echo 'selected'; ?>>Clean</option>
                                                        <option value="dirty" <?php if ($row2['room_status'] == 'dirty') echo 'selected'; ?>>Dirty</option>
                                                        <option value="under_maintenance" <?php if ($row2['room_status'] == 'under_maintenance') echo 'selected'; ?>>Under Maintenance</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="tasktype" class="form-label">Task Type</label>
                                                    <select class="form-select" id="taskType" name="task_type" value="<?php echo $row2['task_type']?>">
                                                        <option value="cleaning" <?php if ($row2['task_type'] == 'cleaning') echo 'selected'; ?>>Cleaning</option>
                                                        <option value="maintenance" <?php if ($row2['task_type'] == 'maintenance') echo 'selected'; ?>>Maintenance</option>
                                                        <option value="repair" <?php if ($row2['task_type'] == 'repair') echo 'selected'; ?>>Repair</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="taskdescription<?php echo $row2['task_id']; ?>" class="form-label" >Task Description</label>
                                                    <textarea class="form-control" id="taskDescription<?php echo $row2['task_id']; ?>" rows="3" name="description"><?php echo $row2['description']; ?></textarea>
                                                </div>
                                                <input type="hidden" id="editTaskId" value="<?php echo $row2["task_id"]?>"name="task_id">
                                             
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                        
                                        </form>
                                    </div>
                                </div>
                            </div>





                              <!-- Delete Modal -->
                              <div class="modal fade" id="deleteTaskModal<?php echo $row2['task_id']?>" tabindex="-1" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteTaskModalLabel">Confirm Delete Task</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="../functions/delete_housekeeping.php">    

                                        <div class="modal-body">
                                            Are you sure you want to delete this task?
                                            <input type="hidden" id="editTaskId" value="<?php echo $row2["task_id"]?>"name="task_id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" onclick="deleteTask">Delete</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                          
                            <script>
                                // script for search bar
                                document.addEventListener('DOMContentLoaded', function() {
                                    const searchInput = document.getElementById('searchInput');
                                    const rows = document.querySelectorAll('.table-custom tbody tr');

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
                            <!-- <div class="card-container">
<div class="card">
<h2>To-Do</h2>
<div class="card-content">
<p>Room 069 - In Progress - John Doe</p>
<p>Room 069 - In Progress - John Doe</p>
</div>
</div>
</div> -->

<?php include('modals-for-admin.php'); ?>


<script>
function deleteAccount(id) {
            window.location.href = "../functions/delete-account.php?id="+id;
        }
</script>
                        </body>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
                        <script src="../assets/js/1.js"></script>

</html>