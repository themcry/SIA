<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: pages-admin/Dashboard.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <link rel="shortcut icon" type="image/x-icon" href="images/logo.png" />
  <title>Hotel Property Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fontawesome -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <script>
    src = "https://code.jquery.com/jquery-1.10.2.min.js" >
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>



  <style>
    body,
    html {
      height: 100%;
      margin: 0;
    }

    .d-flex {
      display: flex;
    }

    .justify-content-center {
      justify-content: center;
    }

    .align-items-center {
      align-items: center;
    }

    .gradient-custom-2 {
      /* fallback for old browsers */
      background: #FFFF00;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
    }

    @media (min-width: 768px) {
      .gradient-form {
        height: 100vh !important;
      }
    }

    @media (min-width: 769px) {
      .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
      }
    }

    .btn-custom-color {

  border: none;
  background-color: #33b249; 
  color: white;
  transition: background-color 0.3s ease, box-shadow 0.3s ease; 
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.btn-custom-color:hover {
  background-color: #0EDC8D;
  color: white;
  transform: translateY(-2px);
  box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}



    /* Apply the animation to the element */
    .image-container {
      background-image: url('images/logo1.jpg');
      background-size: 459px;
      background-repeat: no-repeat;

    }


    .valid-input {
      border-color: green;
    }

    .invalid-input {
      border-color: red;
    }

    input.form-control:hover {
    border-color: #33b249;
  }
    

    /* Add a hover effect */
  </style>
</head>

<body style="background-color: #16312F;">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
      <div class="card rounded-3 text-black" style="background-color: #FFFDFE;">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-4 mx-md-4">



            
                <div style="text-align: center;">
                  <div style="display: flex; flex-direction: column; align-items: center;">
                    <img src="images/logo.png" width="100px" height="70px">
                    <p style="font-size: 23px;  font-weight: 650; color: #253331;" >Welcome Back!</p>
                    <span style="font-size: 23px; color:#33b249"><strong>Hotel Property Management</strong></span>
                  </div>
                  <!-- <p style="font-size: 25px; margin-top: 10px; font-weight: 650;">Log In</p> -->
                </div>





                </br>



                <form method="post" action="functions/login.php">


                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="username" style="font-weight: 500;">Username</label>
                    <input type="text" class="form-control" name="uname" required placeholder="Username" />

                  </div>

                  <div class="col-sm-15 mb-4">
                    <label for="password" class="form-label fw-bold" style="font-weight: 500;">Password</label>
                    <div class="input-group">
                      <input type="password" class="form-control  border-end-0" id="password" name="psw" required placeholder="Password">
                      <!-- Change the id of the eye icon to togglePassword -->
                      <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                    </div>


                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block fa-lg mb-2 btn-custom-color" type="submit" name="submit" style="font-weight: 650;">Log In</button>




                  </div>

                </form>

              </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center image-container" style="background-image: url('images/eurotel_hotel_cover.jpg'); background-position: center; background-size: cover; background-repeat: no-repeat; animation: zoomIn 1s;">



              <div class="text-white px-3 py-4 p-md-5 mx-md-4">


                </p>
              </div>


            </div>


            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>


  <div class="mb-4">

  </div>
  </div>
  </div>
  </div>

</body>

</html>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  const passwordInput = document.getElementById('password');
  const togglePassword = document.getElementById('togglePassword');

  togglePassword.addEventListener('mouseenter', function() {
    togglePasswordVisibility(passwordInput, true);
  });

  togglePassword.addEventListener('mouseleave', function() {
    togglePasswordVisibility(passwordInput, false);
  });

  function togglePasswordVisibility(inputField, show) {
    const type = show ? 'text' : 'password';
    inputField.setAttribute('type', type);
    togglePassword.innerHTML = show ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
  }
</script>

<!-- <script>
  togglePassword.addEventListener('click', function() {
    togglePasswordVisibility(document.getElementById('password'), togglePassword);
  });

  function togglePasswordVisibility(inputField, toggleButton) {
    const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
    inputField.setAttribute('type', type);
    toggleButton.innerHTML = type === 'password' ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
  }
</script> -->