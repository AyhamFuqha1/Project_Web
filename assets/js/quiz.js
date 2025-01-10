const question = [
  {
    id: "question-0",
    textquestion: "",
    marks: 1,
    option: [],
  },
];
let title = null;
let time = 0;
let questionCount = 1;
let box = 2;

function addquestion() {

  questionCount++;
  const questionDiv = document.createElement("div");
  questionDiv.className = "question1 mb-4 p-3 border animate-question";
  questionDiv.id = `question-${questionCount}`;

  questionDiv.innerHTML = `
                <div class="question d-flex justify-content-between align-items-center">
                    <span>Question Text</span>
                    <button class="btn btn-danger" onclick="removeQuestion('${questionDiv.id}')">Remove Question</button>
                </div>
                <div class="mb-3 p-2">
                    <textarea id="description-${questionCount}" name="description" class="form-control"
                    placeholder="Enter Description..." required></textarea>
                </div>
                <div class="marks">
                <span>Marks </span>
                <input type="number" value="1" min="0" id="marks-${questionDiv.id}">
                </div>
                <div class="question d-flex justify-content-between align-items-center" >
                <span>Options (select correct answer)</span>
                <button class="btn btn-primary " onclick="addoption('${questionDiv.id}')">Add Option</button>
                </div>
                <div class="option">
                </div>
                
            `;
  question.push({
    id: questionDiv.id,
    textquestion: "",
    marks: 1,
    option: [],
  });

  document.getElementById("questions-container").appendChild(questionDiv);

  const divv = document.createElement("div");
  divv.id = `box-${box}`;
  divv.className = "qus";
  divv.innerHTML = `
               <span>${box}</span>
             `;
  box++;
  const yy = document.getElementById("nav1");
  yy.appendChild(divv);

  console.log(question);
}

function removeQuestion(questionid) {
  if (question.length !== 1) {
    document.getElementById(questionid).remove();

    const index = question.findIndex((q) => q.id === questionid);
    if (index !== -1) {
      question.splice(index, 1);
    }
    console.log(question);

    box--;
    document.getElementById(`box-${box}`).remove();
  } else {
    alert("The number of questions is less than the allowed limit.");
  }
}

function addoption(questionid) {
  const optionn = document.querySelector(`#${questionid} .option`);
  const option = document.createElement("div");
  option.className = "select mb-2 d-flex align-items-center";
  option.innerHTML = ` 
                    <input type="text" name="name" class="form-control mr-2" placeholder="ِAnswer Text..." required>
                    <input type="radio" name="correct-${questionCount}">
                    <button class="btn btn-danger ml-2" onclick="removeOption(this,'${questionid}')">Remove Option</button>
    `;
  optionn.appendChild(option);

  const indexx = question.find((q) => q.id === questionid);
  if (indexx) {
    indexx.option.push({
      text: "",
      correct: false,
    });
  }
  console.log(question);
}

function removeOption(button, questionid) {
  const optionDiv = button.parentElement;
  const optionsContainer = optionDiv.parentElement;

  const qui = question.find((q) => q.id === questionid);
  if (qui) {
    const index = Array.from(optionsContainer.children).indexOf(optionDiv);
    if (index !== -1) {
      qui.option.splice(index, 1);
    }
  }
  optionsContainer.removeChild(optionDiv);
  console.log(question);
}

document.addEventListener("input", (event) => {
  const target = event.target;

  if (target.matches("textarea")) {
    const questionid = target.closest(".question1").id;
    const index = question.find((q) => q.id === questionid);
    if (index != -1) {
      index.textquestion = target.value;
    }
  }

  if (target.matches('input[type="text"]')) {
    if (target.id === "des") {
      title = target.value;
    } else if (target.id === "time") {
      time = parseInt(target.value, 10);
      const houer = document.getElementById("houer");
      const min = document.getElementById("minuts");
      const second = document.getElementById("second");

      if (!isNaN(time)) {
        const hours = Math.floor(time / 60);
        const minutes = time % 60;
        const seconds = 0;

        houer.innerHTML = `hours ${hours}`;
        min.innerHTML = `minutes  ${minutes}`;
        second.innerHTML = `second ${seconds}`;
      } else {
        houer.innerHTML = `hours 0`;
        min.innerHTML = `minutes  0`;
        second.innerHTML = `second 0`;
      }
    } else {
      const optionn = target.closest(".select");
      const parent = optionn.parentElement;
      const questionid = target.closest(".question1").id;
      const qui = question.find((q) => q.id === questionid);
      if (qui) {
        const opt = Array.from(parent.children).indexOf(optionn);
        if (opt !== -1) {
          qui.option[opt].text = target.value;
        }
      }
    }
  }

  if (target.matches('input[type="radio"]')) {
    const queid = target.closest(".question1").id;
    const optionn = target.closest(".select");

    const indexx = question.find((q) => q.id === queid);
    if (indexx) {
      indexx.option.forEach((element, idx) => {
        if (
          idx === Array.from(optionn.parentElement.children).indexOf(optionn)
        ) {
          element.correct = true;
        } else {
          element.correct = false;
        }
      });
    }
  }

   
  if(target.matches('input[type="number"]')){
    if(target.id!=="attempt"){
    const questionid = target.closest(".question1").id;
    const index=question.find((q) => q.id===questionid);
    if(index){
        index.marks=target.value;
    }

  }

  console.log(question);
}
});

document.getElementById("savequiz").addEventListener("click", () => {
  const quizDateTime = document.getElementById("quiz-datetime").value;
  const attempt1 = document.getElementById("attempt").value;
  const totalMarks = question.reduce((sum, current) => sum + parseInt(current.marks, 10), 0);
  fetch("/New%20folder%20(3)/handel/save-quiz.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      title: title,
      time: time,
      questions: question,
      datetime: quizDateTime,
      totalmarks:totalMarks,
      attempt:attempt1,
       id_coursee:id_course, 
    }),
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      alert("Quiz saved successfully!");
    })
    .catch((error) => {
      console.error("Error:", error);
      alert("An error occurred while saving the quiz.");
    }); 
});
