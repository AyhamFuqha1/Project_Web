<?php  
session_start();
require 'handel/database.php';

$id = $_GET['id'];
$name = $_POST['name'];
$des = $_POST['description'];
$year= $_POST['year'];
$img = $_FILES['img'];



    $uploadDir = 'assets/img/'; 
    $fileName = uniqid() . '-' . basename($img['name']); // اسم فريد للملف
    $filePath = $uploadDir . $fileName;

 
    if (move_uploaded_file($img['tmp_name'], $filePath)) {
        $sql = "INSERT INTO course(`name`, `description`, `img`,`year`,`pearson_id`) VALUES('$name', '$des','$fileName','$year','5')";
        $countQuery = mysqli_query($conn, $sql);
        $idc=mysqli_insert_id($conn);
        $sql1 = "INSERT INTO `enrollment table`(`id-cource`, `id_pearson`) VALUES('$idc','$id')";
        $countQuery2 = mysqli_query($conn, $sql1);

    } else {
        echo "Failed to upload the image.";
    }

    header("location: blog.php?id=$id");


?>
