<?php    
require 'database.php';

$answer = json_decode(file_get_contents("php://input"), true);
$id_student=$answer['id_student'];
$id_question=$answer['id_question'];
$id_answer=$answer['id_answer'];
$id_quiz=$answer['id_quiz'];
$attempt=$answer['numattempt'];
$sql="INSERT INTO `answer-question`(`id_student`,`id_quiz`,`id_question`,`id_answer`,`attempt`) VALUES('$id_student','$id_quiz','$id_question','$id_answer','$attempt')";

if($quer=mysqli_query($conn,$sql)){

}














?>