<?php

session_start();
require 'database.php';

// Check if the subject ID exists
$subject_id = intval($_GET['id']);
if (!$subject_id) {
    $_SESSION['error'] = 'Invalid subject ID.';
    header('Location: ../index.php');
    exit;
}

// Get form data
$title = mysqli_real_escape_string($conn, $_POST['title']);
$description = mysqli_real_escape_string($conn, $_POST['description']);


$links = isset($_POST['links']) ? $_POST['links'] : [];


// Process uploaded files
 $img = $_FILES['contentMedia'];

    $uploadDir = '../assets/img/'; 
    $fileName = uniqid() . '-' . basename($img['name']); 
    $filePath = $uploadDir . $fileName;

 
    if (move_uploaded_file($img['tmp_name'], $filePath)) {

        $sql = "INSERT INTO content (subject_id, title, description) VALUES ('$subject_id', '$title', '$description')";
        if (mysqli_query($conn, $sql)) {
           $content_id = mysqli_insert_id($conn);
           foreach ($links as $link) {
           
              $sqlLink = "INSERT INTO links (content_id, url) VALUES ('$content_id', '" . mysqli_real_escape_string($conn, $link) . "')";
              mysqli_query($conn, $sqlLink);
            }
        }
        else {
            $_SESSION['error'] = 'Failed to add content. Please try again.';
        }
        echo "not failed.";
        $sqlMedia = "INSERT INTO media (content_id, file_name) VALUES ('$content_id', '$fileName')";
        mysqli_query($conn, $sqlMedia);

    } else {
        echo "Failed to upload the image.";
    }
    
   

header("location: ../subject_details.php?id=$subject_id");
exit;


?>
