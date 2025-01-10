<?php 
$id_course=intval($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/quiz.css">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="aos/aos.css">
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="hea">
        <span>Create Quiz</span>
    </div>
    <div class="row mt-5 mr-0 ml-0">
        <div class="col-lg-7 continer" data-aos="fade-up">
            <div class="pad1">
                <div class="creat">
                    <span>Quiz Details</span>
                </div>
                <div id="questions-container">
                    <div class="title">
                        <div class="mb-3 p-2">
                            <label for="name" class="form-label">Quiz Title</label>
                            <input type="text" id="des" name="name" class="form-control"
                                placeholder="Enter Quiz Name..." required>
                        </div>
                        <div class="mb-3 p-2">
                            <label for="quiz-datetime" class="form-label">Quiz Date and Time</label>
                            <input type="datetime-local" id="quiz-datetime" name="quiz-datetime" class="form-control"
                                required>
                        </div>
                        <div class="mb-3 p-2">
                            <label for="name" class="form-label">Time Allowed (minutes)</label>
                            <input type="text" id="time" name="name" class="form-control" placeholder="Enter Time..."
                                required>
                        </div>
                        <div class="marks">
                            <span>Number Of Attempt </span>
                            <input type="number" value="1" min="0" id="attempt">
                        </div>


                        <div class="question1 mb-4 p-3 border animate-question" id="question-0">
                            <div class="question d-flex justify-content-between align-items-center">
                                <span>Question Text</span>
                                <button class="btn btn-danger" onclick="removeQuestion('question-0')">Remove
                                    Question</button>
                            </div>
                            <div class="mb-3 p-2">
                                <textarea id="description-0" name="description" class="form-control"
                                    placeholder="Enter Description..." required></textarea>
                            </div>
                            <div class="marks">
                                <span>Marks </span>
                                <input type="number" value="1" min="0" id="marks-0">
                            </div>
                            <div class="question d-flex justify-content-between align-items-center">
                                <span>Options (select correct answer)</span>
                                <button class="btn btn-primary " onclick="addoption('question-0')">Add
                                    Option</button>
                            </div>

                            <div class="option">
                            </div>
                        </div>

                    </div>

                </div>
                <button class="btn btn-primary mb-3 mt-3 w-100" onclick="addquestion()">ADD Question</button>
                <div class="save">
                    <button id="savequiz" class="btn mb-3 mt-5 w-100"
                        style="background-color: #1bbd36; color: white; ">Save Quiz</button>
                </div>
            </div>
        </div>

        <div class="col-lg-2 continer1" data-aos="fade-up">
            <div class="pad2">
                <div class="navv">
                    <span>Quiz Navigation</span>
                    <div class="nav1" id="nav1">
                        <div class="qus" id="box-1"><span>1</span></div>

                    </div>
                </div>
                <div class="time-remaining">
                    <div class="circle-container">

                        <div class="circle">
                            <div class="fill" style="--progress: 60;"></div>
                            <span id="houer">houer</span>


                        </div>

                        <div class="circle">
                            <div class="fill" style="--progress: 40;"></div>
                            <span id="minuts">minuts</span>


                        </div>

                        <div class="circle">
                            <div class="fill" style="--progress: 20;"></div>
                            <span id="second">second</span>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







    <script src="assets/js/newcourse.js"></script>
    <script src="aos/aos.js"></script>
    <script src="assets/js/bb.js"></script>
    <script src="assets/js/quiz.js"></script>
    <script>
        AOS.init();
        let id_course=<?php echo json_encode($id_course);  ?> 
    </script>
</body>

</html>