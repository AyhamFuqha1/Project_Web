<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>

</head>
<body>
<div class="header">
  <div class="log">
    <img src="assets/img/Template_1/logo.svg">
  </div>
  
  <div class="nav">
    <ul> 
      <li><a href="home.html">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="register.php" style="color:rgb(21, 146, 125)">Register</a></li>
      <li><a href="blog.php">Blog</a></li>
    </ul>
    <div class="clear"></div>
  </div>

  <div class="but">
    <button onclick="window.location.href='login.php';">LogIn</button>
</div>

</div>
    <form method="post" action="handel/register.php" class="mt-5" style="margin-top: 5.5rem !important">

    <h3 id="logo">Create New Account !</h3>
   <?php
    if(isset($_SESSION['errors'])){  ?> 
        <div class="alert alert-danger " role="alert" style=" padding: 10px; hight:10px">
    <?php   echo $_SESSION['errors']; ?>
            </div>
    <?php 
    unset($_SESSION['errors']);
    }?>

    <label for="username">Username</label>
    <input type="text" id="username" name="name" placeholder="Type in your username.." autocomplete="off" required /> <br />
  
    
    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Type in your email.."  /> <br />


    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Enter your password.." autocomplete="off" required />
  
    <div class="row">
      <div class="col-auto mt-1">
      <label for="Student">Student</label>
      </div>
      <div class="col-auto">
      <input type="checkbox" id="Student" name="type" class="form-check-input mt-1 pt-1" value="student" onclick="toggleCheckbox('Student', 'Teacher')" />
      </div>
      <div class="col-auto mt-1">
      <label for="Teacher">Teacher</label>
      </div>
      <div class="col-auto">
      <input type="checkbox" id="Teacher" name="type" class="form-check-input mt-1 pt-1" value="teacher" onclick="toggleCheckbox('Teacher', 'Student')" />
      </div>
    </div>


    <input type="submit" name="submit" value="Register" />
  
  </form>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>