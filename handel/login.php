<?php  
session_start();
require 'database.php';

$email = isset($_POST['email']) ? $_POST['email'] : '';
$passward = isset($_POST['passward']) ? $_POST['passward'] : '';

$sql = "SELECT email, passward, id FROM person WHERE email = '$email'";
$countQuery = mysqli_query($conn, $sql);
$count = mysqli_fetch_assoc($countQuery);

if (mysqli_num_rows($countQuery) > 0) {
    if ($count['passward'] == $passward) {
        header("Location: ../blog.php?id=" . $count['id']);
        $_SESSION["idpearson"]=$count['id'];
        exit();
    } else {
        $_SESSION['errors'] = "Password incorrect";
        header("Location: ../login.php?email=" . $email. "&passward=" .$passward);
        exit();
    }
} else {
    $_SESSION['errors'] = "Email incorrect";
    header("Location: ../login.php?email=" . $email . "&passward=" . $passward);
    exit();
}
?>
