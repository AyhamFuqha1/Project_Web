<?php 
require 'handel/database.php';
 $count=0;
$sql1="SELECT id_question,id_answer FROM `answer-question` WHERE id_student=7 and id_quiz=17 and attempt=3";
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
   // $grade+=$result3['marks']; 
  } 


}
echo $count;

?>