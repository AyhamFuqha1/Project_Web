
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Full Screen Quiz</title>
  <link href="assets/css/enter-quiz.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
</head>

<body>
  <button class="next" id="start-quiz">Start Quiz</button>
  <div class="quiz-container" id="hid">
    <div style=" display: flex; align-items: center;  margin-left: 40%; gap:15px; margin-bottom: 10px;">
      <div class="hea">
        <span>Question</span>
        <span>12/16</span>
      </div>

      <div class="progress">
        <div class="progress-bar" style="width:20%"></div>
      </div>
    </div>
    <div style=" display: flex; align-items: center;  margin-left: 40%; gap:40px">
      <div class="hea">
        <span>Time</span>
        <span id="timee">12:50</span>
      </div>
      <div class="progress">
        <div class="progress-bar" style="width:20%"></div>
      </div>
    </div>
    <div id="quiz-content">
      <div class="question" >
        <p id="question">
         
        </p>
      </div>
      <div class="answer" id="options">
        <div class="only"> <span>Select only one</span></div>
        
       
       

      </div>
      <button class="next" onclick="next()" id="buttonnext">Next Question</button>
    </div>
  </div>
  <script src="assets/js/enter-quiz.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>