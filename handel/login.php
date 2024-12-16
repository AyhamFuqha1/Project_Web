<?php  
session_start();
require 'database.php';


$email=$_POST['email'];
$passward=$_POST['passward'];
$sql="SELECT email,passward,id  from person WHERE email = '$email'";
$countQuery=mysqli_query($conn,$sql);
$count=mysqli_fetch_assoc($countQuery);
if(mysqli_num_rows($countQuery) > 0){
    if($count['passward'] == $passward){
        header("location: ../blog.php?id=".$count['id']);
        exit();
    }
    else{
        $_SESSION['errors']="Password incorrect";
        header("location: ../login.php");
        exit();
    }
}

else{
    $_SESSION['errors']="Email incorrect";
    header("location: ../login.php");
}








?>