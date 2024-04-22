<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hotel Property Management System</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo1.jpg" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-image: url('images/1.jpg'); 
            background-size: 100% 100% ;
            background-repeat: no-repeat; 
        }
        .btn-transparent {
            background-color: transparent;
            border-color: transparent;
            color: #fff;
        }
    </style>


</head>
<body>

<button type="button" style="font-size: 30px; height: 70px;" class="btn btn-primary btn-transparent" data-toggle="modal" data-target="#loginModal">Log in</button>


<!-- Modal for Login Admin-->
<div class="modal fade" id="loginModal">
    <div class="modal-dialog modal-dialog-centered modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold text-center">Sign in</h1>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Add your login form here -->
                <form action="#" method="post">
                    <div class="form-group">
                        <i class="fa fa-user"></i>
                        <label class="fw-bold" for="username"></label>
                        <input type="text" class="form-control" name="uname" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <label class="fw-bold" for="password"></label>
                        <input type="password" class="form-control" name="psw" id="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <i id="showPasswordIcon" class="fa fa-eye" onclick="togglePasswordVisibility()"></i>
                        </div>
                    </div>
                    <button type="submit" name="submitBtn" class="btn btn-success mx-auto d-block mt-3" style="width: 270px; height: 50px; font-size: 18px;">Login</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>


</body>
<footer>
</footer>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var passwordIcon = document.getElementById("showPasswordIcon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        }
    }
</script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</html>