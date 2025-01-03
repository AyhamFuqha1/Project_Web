document.getElementById("start-quiz").addEventListener("click", function () {
  // طلب وضع ملء الشاشة
  const element = document.documentElement; // الصفحة بالكامل
  if (element.requestFullscreen) {
    element.requestFullscreen();
  } else if (element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen(); // للمتصفحات مثل Safari
  } else if (element.msRequestFullscreen) {
    element.msRequestFullscreen(); // للمتصفحات مثل IE/Edge
  }
});
const button = document.getElementById("start-quiz");
const quizContent = document.getElementById("hid");

button.addEventListener("click", () => {
  quizContent.style.display = "block";
  button.style.display = "none";
});

let questions = [];
let answers = [];
let count = 0;
let id_quiz;
let time;
let timm;
const answer = [];

fetch("/New%20folder%20(3)/handel/enter-quiz.php")
  .then((response) => response.json())
  .then((data) => {
    questions = data.questions;
    answers = data.answers;
    id_quiz = data.id_quiz;
    time = data.time_allow;
    show();
  });

function show() {
  console.log(time.time_allow);
  timm = parseInt(time.time_allow) * 60 * 1000;
  remaning = timm / 1000;
  console.log(remaning);
  document.getElementById("question").innerHTML = questions[count].text;
  const options = document.getElementById("options");
  options.innerHTML = "";
  starttimer();
  setTimeout(endquiz, timm);
  answers.forEach((element, index) => {
    if (element.id_question === questions[count].id) {
      const option = document.createElement("label");
      option.htmlFor = `${element.id}-${element.id_question}`;
      option.innerHTML = `
      <input class="form-check-input" type="radio" name="exampleRadios" id="${element.id}-${element.id_question}" value="option1">
      <p>${element.text}</p>
  `;
      options.appendChild(option);
    }
  });
  count++; 
}

function next() {
  const select = document.querySelector('input[name="exampleRadios"]:checked');
  if (select) {
    const idselect = select.id;
    const [idanswer, idquestion] = idselect.split("-");
    fetch("/New%20folder%20(3)/handel/save-answer.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        id_student: 7,
        id_question: idquestion,
        id_answer: idanswer,
        id_quiz: id_quiz,
      }),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log("Answer saved:", data);
      })
      .catch((error) => console.error("Error saving answer:", error));
  }

  if (count < questions.length) {
    document.getElementById("question").innerHTML = questions[count].text;
    const options = document.getElementById("options");
    options.innerHTML = "";
    answers.forEach((element, index) => {
      if (element.id_question === questions[count].id) {
        const option = document.createElement("label");
        option.htmlFor = `radio-${element.id}`;
        option.innerHTML = `<input class="form-check-input" type="radio" name="exampleRadios" id="radio-${element.id}" value="option1" >
          <p> ${element.text} </p>`;
        options.appendChild(option);
      }
    });
    if (count + 1 === questions.length) {
      document.getElementById("buttonnext").innerHTML = "Finsh Quiz";
    }
  } else {
    endquiz();
  }
  count++;
}

function endquiz() {
  quizContent.style.display = "none";
  button.style.display = "block";
}

function starttimer() {
  const showtime = document.getElementById("timee");
  const interval = setInterval(() => {
    if (remaning <= 0) {
      clearInterval(interval);
    } else {
      const min = Math.floor(remaning / 60);
      const sec = remaning % 60;
      showtime.textContent = `${min}:${sec < 10 ? "0" + sec : sec}`;
    }
    remaning--;
  }, 1000);
}
