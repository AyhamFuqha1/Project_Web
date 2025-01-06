<?php
require 'database.php';
$id_quiz=15;
$sql="SELECT * FROM question where id_quiz = $id_quiz";
$connext=mysqli_query($conn,$sql);
$questions= mysqli_fetch_all($connext, MYSQLI_ASSOC);


$sql1="SELECT * FROM answer";
$connet=mysqli_query($conn,$sql1);
$answers= mysqli_fetch_all($connet, MYSQLI_ASSOC);

$sql2="SELECT `time_allow`,number_attempt from quiz WHERE id=$id_quiz";
$connett=mysqli_query($conn,$sql2);
$time= mysqli_fetch_assoc($connett);

$sql3 = "SELECT attempt FROM `answer-question` WHERE id_quiz = $id_quiz AND id_student = 7 ORDER BY attempt  DESC";
$connet3=mysqli_query($conn,$sql3);
$attempt= mysqli_fetch_assoc($connet3);
if (!$attempt) {
    $attempt['attempt'] = 0; 
}
echo json_encode(['questions' => $questions, 'answers' => $answers,'id_quiz' => $id_quiz,'time_allow' => $time,'attempt' =>$attempt['attempt'] ]);

 exit;
?>