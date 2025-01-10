<?php session_start();
$email7 = isset($_GET['email']) ? $_GET['email'] : '';
$password7 = isset($_GET['passward']) ? $_GET['passward'] : '';

if (isset($_SESSION['register'])) {
  echo "<script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.querySelector('.container');
            container.classList.add('active');
        });
    </script>";
}
unset($_SESSION['register']);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <!--  <link rel="stylesheet" href="assets/css/register.css"> -->
   <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>


  <div class="container" id="container">
    <div class="form-container sign-up">
      <form method="post" action="handel/register.php">
        <h1>Create Account</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>
   
        <?php
        if (isset($_SESSION['error'])) { ?>
          <div class="alert alert-danger " role="alert" style=" padding: 10px; hight:10px">
            <?php echo $_SESSION['error']; ?>
          </div>
          <?php
          unset($_SESSION['error']);
        } ?>
        <input type="text" placeholder="name" name="name">
        <input type="text" placeholder="email" name="email">
        <input type="password" placeholder="password" name="password">
        <div class="row">
          <div class="col-auto mt-1">
            <label for="Student">Student</label>
          </div>
          <div class="col-auto">
            <input type="checkbox" id="Student" name="type" class="form-check-input mt-1 pt-1" style="    height: 22px;" value="student"
              onclick="toggleCheckbox('Student', 'Teacher')" />
          </div>
          <div class="col-auto mt-1">
            <label for="Teacher">Teacher</label>
          </div>
          <div class="col-auto">
            <input type="checkbox" id="Teacher" name="type" class="form-check-input mt-1 pt-1" style="    height: 22px;" value="teacher"
              onclick="toggleCheckbox('Teacher', 'Student')" />
          </div>
        </div>
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in">
      <form method="post" action="handel/login.php">
        <h1>Sign In</h1>
        <div class="social-icons">
          <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
        </div>

        <?php
        if (isset($_SESSION['errors'])) { ?>
          <div class="alert alert-danger " role="alert" style=" padding: 10px; hight:10px">
            <?php echo $_SESSION['errors']; ?>
          </div>
          <?php
          unset($_SESSION['errors']);
        } ?>
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Password" name="passward">
        <a href="#">Forget Your Password?</a>
        <button>Sign In</button>
      </form>
    </div>
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Enter your personal details to use all of site features</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>Register with your personal details to use all of site features</p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/register.js"></script>
</body>

</html>