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
<script> src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>



<style>

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
    background-color: #0EDC8D;
    color: white; /* Optionally change the text color */
}

.btn-custom-color:hover {

    background-color:
    #74E291;
    color:white;
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
  /* Add a hover effect */
 
  

    </style>
</head>
<body style="background-color: #A3FFD6;">

  <div class="container py-0 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

           
              <img src="images/logo.png" width="90px" height="60px">
              <span style="font-size: 15px; color:#0EDC8D"> <strong>Hotel Property Management</strong></span>


                            
                            
                           
                
</br>

<div style="text-align: center;">
                <b><p style="font-size: 25px;">Log in</p></b>
</div>

                <form method="post" action="functions/login.php">
                  

                  <div data-mdb-input-init class="form-outline mb-4">
                  <label class="form-label" for="username">Username</label>
                    <input type="text" class="form-control"
                      name="uname" required placeholder="Username" />
                    
                  </div>
  
                   <div class="col-sm-15 mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control  border-end-0" id="password" name="psw" required placeholder="Password">
                        <!-- Change the id of the eye icon to togglePassword -->
                        <span class="input-group-text bg-white border-start-0" id="togglePassword"><i class="fas fa-eye-slash"></i></span>
                    </div>
                    
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg btn-block fa-lg  mb-2 btn-custom-color" type="submit" name="submit">Log In</button>

                  
                    
                  </div>

                </form>

              </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center  image-container" style="background-image: url('images/1.jpg'); background-size: 459px; background-repeat: no-repeat; animation: zoomIn 1s;">

           
           
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
   

     togglePassword.addEventListener('click', function() {
        togglePasswordVisibility(document.getElementById('password'), togglePassword);
    });

    function togglePasswordVisibility(inputField, toggleButton) {
        const type = inputField.getAttribute('type') === 'password' ? 'text' : 'password';
        inputField.setAttribute('type', type);
        toggleButton.innerHTML = type === 'password' ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>';
    }
</script>