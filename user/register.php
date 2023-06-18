<?php require_once('../config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>


<head>
  
  <style>
    body {
      /* background-image: url('../dist/img/Back.png'); */
      background-size: cover;
      background-position: center;
      height: unset !important;
      background-color: red;
    }

    .center-box {
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
      /* height: 550px; */
      width: 400px;
      background-color: #FFE8C0;
      
    }

    .form-control {
      border: none;
      border-bottom: 1px solid #da70d6;
      
    }

    .col-12 {
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .login-box {
      margin: 20px 0px;
    }

    .card-header .text-center {
      font-size: 5px;
    }
  </style>
</head>

<body class="hold-transition login-page  light-mode">



  <script>
    start_loader()
  </script>
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary center-box">
      <div class="card-header text-center">
        <p href="" class="h1" style="font-size:30px;"><b>Register</b></p>
      </div>
      <img src="../dist/img/Deskhub (new logo).png" alt="" srcset="" style="height: 70px; width:70px; margin-left: 40%; ">
      <div class="card-body" style="background-color: #FFE8C0;">
        <!-- <p class="login-box-msg">Welcome!</p> -->

        <form id="register-user-frm" action="" method="post">
          <!-- <span style="font-size:10px; color: #03989e;">FIRST NAME</span> -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" autofocus name="firstname" placeholder="First Name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <!-- <span style="font-size:10px; color: #03989e;">LAST NAME</span> -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" autofocus name="lastname" placeholder="Last Name" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <!-- <span style="font-size:10px; color: #03989e;">EMAIL</span> -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" autofocus name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <!-- <span style="font-size:10px; color: #03989e;">PASSWORD</span> -->
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- <span style="font-size:10px; color: #03989e;">CONTACT NO.</span> -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="contact" placeholder="Contact No." required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <!-- <span style="font-size:10px; color: #03989e;">ADDRESS</span> -->
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="address" placeholder="Home Address" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button style="font-weight:bold; background-image: linear-gradient(to right,  #FFDE59 27%, #FF914D 100%)" type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
          <p class="login-box-msg">Already have an account? <a style="color: #FF914D; font-weight: 600; " href="login.php">Login</a> instead.</p>
          <div class="col-8">
            <a style="color: #FF914D; font-weight: 600; text-decoration: underline;" href="<?php echo base_url ?>">Go to Homepage</a>
          </div>
        </form>
        <!-- /.social-auth-links -->

        <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function() {
      end_loader();
    })
  </script>

      

  
</body>

</html>
