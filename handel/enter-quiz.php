<?php
require 'database.php';
$id_quiz=14;
$sql="SELECT * FROM question where id_quiz = $id_quiz";
$connext=mysqli_query($conn,$sql);
$questions= mysqli_fetch_all($connext, MYSQLI_ASSOC);


$sql1="SELECT * FROM answer";
$connet=mysqli_query($conn,$sql1);
$answers= mysqli_fetch_all($connet, MYSQLI_ASSOC);

$sql2="SELECT `time_allow` from quiz WHERE id=$id_quiz";
$connett=mysqli_query($conn,$sql2);
$time= mysqli_fetch_assoc($connett);

echo json_encode(['questions' => $questions, 'answers' => $answers,'id_quiz' => $id_quiz,'time_allow' => $time]);

 exit;
?>