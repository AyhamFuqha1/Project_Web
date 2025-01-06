<?php session_start(); 
$email7 = isset($_GET['email']) ? $_GET['email'] : '';
$password7 = isset($_GET['passward']) ? $_GET['passward'] : '';
?>
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
      <li><a href="register.php">Register</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
    <div class="clear"></div>
  </div>

</div>
    <form method="post" action="handel/login.php" class="mt-5" style="margin-top: 6.5rem !important">
    <h3 id="logo">Login !</h3>

   <?php
    if(isset($_SESSION['errors'])){  ?> 
        <div class="alert alert-danger " role="alert" style=" padding: 10px; hight:10px">
    <?php   echo $_SESSION['errors']; ?>
            </div>
    <?php 
    unset($_SESSION['errors']);
    }?>

    <label for="username">Email</label>
    <input type="text" id="email" name="email" placeholder="Type in your email.."  value="<?php echo $email7; ?>"/> <br />

    <label for="password">Password</label>
    <input type="password" id="passward" name="passward" placeholder="Enter your password.." value="<?php  echo $password7; ?>" required />

    <input type="submit" name="submit" value="Login" />
  
  </form>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>