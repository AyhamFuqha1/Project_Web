<?php    
require 'database.php';
$count=0;
$grade=0;
$answer = json_decode(file_get_contents("php://input"), true);
$attempt=$answer['attempt'];
$id_student=$answer['id_student'];
$id_quiz=$answer['id_quiz'];

$sql1="SELECT id_question,id_answer FROM `answer-question` WHERE id_student=$id_student and id_quiz=$id_quiz and attempt=$attempt";
$connection1=mysqli_query($conn,$sql1);
$result=mysqli_fetch_all($connection1);

foreach($result as $rr){
  $sql2 = "SELECT correct FROM answer WHERE id = $rr[1]";
  $connection2=mysqli_query($conn,$sql2);
  $result2=mysqli_fetch_assoc($connection2);
  if($result2['correct'] == 1){
    $count++;
    $sql3="SELECT marks from question WHERE id=  $rr[0]";
    $connection3=mysqli_query($conn,$sql3);
    $result3=mysqli_fetch_assoc($connection3);
    $grade+=$result3['marks'];
  }
  else{
    
  }
}






$sql="INSERT INTO gardes(`id_student`,`id_quiz`,`grade`,`number_que_correct`,`attempt`) VALUES ('$id_student','$id_quiz','$grade','$count','$attempt')";

if($quer=mysqli_query($conn,$sql)){

}




?>