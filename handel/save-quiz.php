<?php
session_start();
require 'database.php';
$data = file_get_contents('php://input');
$quiz = json_decode($data, true);


if ($quiz) {

    $title = $quiz['title'];
    $time = $quiz['time'];
    $datetime = $quiz['datetime'];
    $questions = $quiz['questions'];
    $totalmarks =$quiz['totalmarks'];
    $attempt=$quiz['attempt'];
    $id_course=$quiz['id_coursee'];
    $sql = "INSERT INTO quiz(`title`,`date-time`,`time_allow`,`total-marks`,`number_attempt`,`course_id`)  VALUES ('$title','$datetime','$time','$totalmarks','$attempt','$id_course') ";
    if (mysqli_query($conn, $sql)) {
        $quizId = mysqli_insert_id($conn);
    }

    foreach ($questions as $qu) {
        $textquestion = $qu['textquestion'];
        $marks= $qu['marks'];
        $option = $qu['option'];
        $sql1 = "INSERT INTO question(`text`,`marks`,`id_quiz`)  VALUES ('$textquestion','$marks','$quizId') ";
        if (mysqli_query($conn, $sql1)) {
            $questionid = mysqli_insert_id($conn);
        }
        foreach ($option as $op) {
            $text = $op['text'];
            $correct = $op['correct'];
            $sql2 = "INSERT INTO answer(`text`,`correct`,`id_question`)  VALUES ('$text','$correct','$questionid') ";
            mysqli_query($conn, $sql2);
        }
    }
} else {
    echo "No data received.";
}
?>