<?php
session_start();
$conn= mysqli_connect('localhost','root','','wepadu');
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$type=$_POST['type'];
$sql1="SELECT COUNT(id) as id FROM person WHERE email = '$email' ";
$countQuery=mysqli_query($conn,$sql1);
$count = mysqli_fetch_assoc($countQuery);
$sql="INSERT INTO  person(`name`,`email`,`passward`,`type`) VALUES ('$name','$email','$password','$type')";
 if($count['id']==0){
 if(strlen($name)<5){
    $_SESSION['errors']="Name must between 8-12";
    header("location: ../register.php");
    exit();
}
if(strlen($email)<5){
   $_SESSION['errors']="Email must more 5";
   header("location: ../register.php");
   exit();
}
if(strlen($password)<5){
    $_SESSION['errors']="Passward must more 5";
    header("location: ../register.php");
    exit();
}
if($type==null){
    $_SESSION['errors']="Type must be chosen";
    header("location: ../register.php");
    exit();
}    
if(mysqli_query($conn,$sql)){
    $_SESSION['inserted_id']=mysqli_insert_id($conn);
    header("location: ../blog.php?id=".$_SESSION['inserted_id']);
    exit();
}
 
}
 else{
    $_SESSION['errors']="The email is already there";
    header("location: ../register.php");
 }

?> 