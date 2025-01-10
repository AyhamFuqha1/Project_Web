<?php
session_start(); 
require 'database.php';
$id_course = $_GET['id'];
$email = $_POST['email'];
$email_safe = mysqli_real_escape_string($conn, $email);
$sql = "SELECT id FROM person WHERE email= '$email_safe'";
$b = mysqli_query($conn, $sql);
if (mysqli_num_rows($b) == 0) {
    $_SESSION['er']="Email is not definde";
} 
else {
    $row = mysqli_fetch_assoc($b);
    $idpearson = $row['id'];
    echo "dsads";
    $sql2 = "SELECT id FROM `enrollment table` WHERE id_pearson= '$idpearson' and `id-cource`='$id_course' ";
    $bb = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($bb) == 0) {

        $sql1="INSERT INTO `enrollment table`(`id_pearson`,`id-cource`) VALUES ('$idpearson','$id_course')";
        if(mysqli_query($conn, $sql1)){
            
        }
        else{
            $_SESSION['er']="pearson is alrady Add";
          
        }
    } else {
        $_SESSION['er']="The email is already added";
    
    }


}
header("Location: ../subject_details.php?id=" . $id_course);


?>





