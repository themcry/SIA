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
<style>
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
</style>
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


    
  
      <main  style="margin-top: 68px;">
        <div class="container-fluid p-3">
          <div class="card bg-transparent border-0" style="font-size: 14px;">
            <div class="card-body">
          <h2>Guest</h2>
   
<body>

<div class="card-container">
  <div class="card">
    <h2>To-Do</h2>
    <div class="card-content">
      <p>Room 069 - In Progress - John Doe</p>
      <p>Room 069 - In Progress - John Doe</p>
    </div>
  </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="../assets/js/1.js"></script>
</html>