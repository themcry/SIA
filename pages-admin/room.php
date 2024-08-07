<?php
session_start(); 
require_once('../classes/db_connection.php');

if (!isset($_SESSION['id'])) {
  header('Location: ../index.php');
  exit();
}

$query = "SELECT room.room_id, COALESCE(housekeeping.room_status, 'clean') AS room_status 
          FROM (SELECT DISTINCT room_id FROM room) AS room 
          LEFT JOIN housekeeping ON room.room_id = housekeeping.room_no
          ORDER BY room.room_id";
$result = $conn->query($query);
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
                        <div class="container">
                               
                                    <div class="row">
                                        <div class="col-6">
                                        Room Status Updates
                                        </div>


                                        <div class="col-6">
                                                    <!-- Add Room -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Add Room
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Room</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form method="post" action="../functions/room.php">

                                                    <!-- <div class="mb-3">
                                                        <label class="form-label">Room Number</label>
                                                        <input type="text" class="form-control" name="room_no">
                                                    </div> -->

                                                    <div class="mb-3">
                                                    <select class="form-select" aria-label="Default select example" name="room_type">
                                                        <option selected>Select Room Type</option>
                                                        <option value="Euro Suite Twin Room">Euro Suite Twin Room</option>
                                                        <option value="Euro Suite Room">Euro Suite Room</option>
                                                        <option value="Standard Room">Standard Room</option>
                                                        <option value="Standard Twin Room<">Standard Twin Room</option>
                                                        <option value="Studio Room">Studio Room</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Price</label>
                                                        <input type="text" class="form-control" name="price">
                                                    </div>
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                     </form>
                                                    </div>
                                                </div>
                                                </div>
                                        </div>


                                    </div><br><br>


                                <div class="room-status">
                                    <?php 
                                    
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            
                                            $statusClass = '';
                                            $statusText = '';

                                            if ($row['room_status'] === 'clean') {
                                                $statusText = 'Clean';
                                                $statusClass = 'status-clean';
                                            } elseif ($row['room_status'] === 'dirty') {
                                                $statusText = 'Dirty';
                                                $statusClass = 'status-dirty';
                                            } elseif ($row['room_status'] === 'under_maintenance') {
                                                $statusText = 'Maintenance';
                                                $statusClass = 'status-maintenance';
                                            }
                                    ?>
                                
                                    <div class="room">
                                        <h2><?php echo $row['room_id']?></h2>
                                        <p>Status: <span id="status<?php echo $row['room_id']; ?>" class="<?php echo $statusClass; ?>"><?php echo $statusText; ?></span></p>
                                    </div>

                                    <?php 
                                    }    
                                        } else {
                                                echo "0 results";
                                            }?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>


            <?php include('modals-for-admin.php'); ?>
<script>
function deleteAccount(id) {
            window.location.href = "../functions/delete-account.php?id="+id;
        }
</script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script src="../assets/js/1.js"></script>
</body>

</html>