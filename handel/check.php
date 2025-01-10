<?php
require 'database.php';
 $answer = json_decode(file_get_contents("php://input"), true);
$id_quiz=$answer['idquiz']; 
$idstudent=$answer['idstudent']; 



$sql2="SELECT number_attempt from quiz WHERE id=$id_quiz";
$connett=mysqli_query($conn,$sql2);
$time= mysqli_fetch_assoc($connett);

$sql3 = "SELECT attempt FROM `answer-question` WHERE id_quiz = $id_quiz AND id_student = $idstudent ORDER BY attempt  DESC";
$connet3=mysqli_query($conn,$sql3);
$attempt= mysqli_fetch_assoc($connet3);
if (!$attempt) {
    $attempt['attempt'] = 0; 
}
echo json_encode([ 'number' => $time,'attempt' =>$attempt['attempt'] ]);

 exit;
?>