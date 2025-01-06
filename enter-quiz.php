
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
        <span></span>
        <span id="done">12/16</span>
      </div>

      <div class="progress">
        <div class="progress-bar" id="bar-question" style="width:0%; background-color: rgb(25, 0, 255);"></div>
      </div>
    </div>
    <div style=" display: flex; align-items: center;  margin-left: 40%; gap:32px">
      <div class="hea">
        <span>Time</span>
        <span id="timee"></span>
      </div>
      <div class="progress">
        <div class="progress-bar" id="bar-time" style="width:20%; background-color: rgb(25, 0, 255);"></div>
      </div>
    </div>
    <div id="quiz-content">
      <div class="question" >
        <p id="question">
         
        </p>
      </div>
      <div class="only"> <span>Select only one</span></div>
        
      <div class="answer" id="options">
       
        
       
       

      </div>
      <button class="next" onclick="next()" id="buttonnext">Next Question</button>
    </div>
  </div>
  <script src="assets/js/enter-quiz.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>