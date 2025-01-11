const button = document.getElementById("start-quiz");
const quizContent = document.getElementById("hid");
let questions = [];
let answers = [];
let count = 0;
let id_quiz;
let time;
let timm;
const answer = [];
let done = 1;
let attempt;

fetch("/New%20folder%20(3)/handel/enter-quiz.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify({ idquiz: idquiz, idstudent: idstudent }), // إرسال idquiz
})
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.json();
  })
  .then((data) => {
    // استلام البيانات من PHP
    questions = data.questions;
    answers = data.answers;
    id_quiz = data.id_quiz;
    time = data.time_allow;
    attempt = data.attempt;
    show();
  })
  .catch((error) => {
    console.error("There was a problem with the fetch operation:", error);
  });

/* button.addEventListener("click", () => {
  if(parseInt(attempt) < parseInt(time.number_attempt)){
  quizContent.style.display = "block";
  button.style.display = "none";
  attempt++;
  }
  else{
   prompt("nubmer of attempt is enf");
  }
}); */
let timor;

/* document.addEventListener("DOMContentLoaded", function () {
  const element = document.documentElement; // العنصر الذي سيتم جعله في وضع ملء الشاشة

  // إظهار رسالة تنبيه لتنبيه المستخدم
  if (confirm("Do you want to enter fullscreen mode?")) {
    // إذا ضغط المستخدم على "OK"، يتم الدخول إلى وضع ملء الشاشة
    if (element.requestFullscreen) {
      element.requestFullscreen();
    } else if (element.webkitRequestFullscreen) {
      element.webkitRequestFullscreen(); // Safari
    } else if (element.msRequestFullscreen) {
      element.msRequestFullscreen(); // IE/Edge
    }
  } else {
    // إذا ضغط المستخدم على "Cancel"
    alert("Fullscreen mode canceled.");
  }
}); */
document.addEventListener("DOMContentLoaded", function () {
  const element = document.documentElement; 


  document.addEventListener("click", function () {
      if (element.requestFullscreen) {
          element.requestFullscreen()
              .catch(err => {
                  console.error("Error entering fullscreen:", err);
              });
      } else if (element.webkitRequestFullscreen) {
          element.webkitRequestFullscreen();
      } else if (element.msRequestFullscreen) {
          element.msRequestFullscreen();
      } else {
          alert("Fullscreen mode is not supported in this browser.");
      }
  }, { once: true }); 
});

function show() {
  /* const element = document.documentElement;
  if (element.requestFullscreen) {
    element.requestFullscreen();
  } else if (element.webkitRequestFullscreen) {
    element.webkitRequestFullscreen(); // Safari
  } else if (element.msRequestFullscreen) {
    element.msRequestFullscreen(); // IE/Edge
  } */
  attempt++;
  document.getElementById("bar-time").style.width = `100%`;
  document.getElementById(
    "done"
  ).innerHTML = `Question ${done}/${questions.length}`;
  document.getElementById("bar-question").style.width = `${
    (done * 100) / questions.length
  }%`;

  timm = parseInt(time.time_allow) * 60 * 1000;
  remaning = timm / 1000;
  document.getElementById("question").innerHTML = questions[count].text;
  const options = document.getElementById("options");
  options.innerHTML = "";
  starttimer();
  timor = setTimeout(endquiz, timm);
  answers.forEach((element, index) => {
    if (element.id_question === questions[count].id) {
      console.log("ayham");
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
  done++;
}

function next() {
  document.getElementById("bar-question").style.width = `${
    (done * 100) / questions.length
  }%`;
  document.getElementById(
    "done"
  ).innerHTML = `Question ${done}/${questions.length}`;
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
        id_student: idstudent,
        id_question: idquestion,
        id_answer: idanswer,
        id_quiz: id_quiz,
        numattempt: attempt,
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
        option.htmlFor = `${element.id}-${element.id_question}`;
        option.innerHTML = `<input class="form-check-input" type="radio" name="exampleRadios" id="${element.id}-${element.id_question}" value="option1" >
          <p> ${element.text} </p>`;
        options.appendChild(option);
      }
    });
    if (count + 1 === questions.length) {
      document.getElementById("buttonnext").innerHTML = "Finsh Quiz";
    }
  } else {
    endquiz();
    clearTimeout(timor);
  }
  count++;
  done++;
}

function endquiz() {
  /* if (document.exitFullscreen) {
    document.exitFullscreen(); 
  } else if (document.webkitExitFullscreen) {
    document.webkitExitFullscreen(); 
  } else if (document.msExitFullscreen) {
    document.msExitFullscreen(); 
  } */

  setTimeout(() => {
    clearTimeout(timor);
    fetch("/New%20folder%20(3)/handel/end_quiz.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        attempt: attempt,
        id_student: idstudent,
        id_quiz: id_quiz,
      }),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log("Answer saved:", data);
        window.history.back();
      })
      .catch((error) => console.error("Error saving answer:", error));
  }, 2000);

     
}

function starttimer() {
  const showtime = document.getElementById("timee");
  const interval = setInterval(() => {
    if (remaning <= 0) {
      clearInterval(interval);
    } else {
      const min = Math.floor(remaning / 60);
      const sec = remaning % 60;
      document.getElementById("bar-time").style.width = `${
        (remaning * 100) / (timm / 1000)
      }%`;
      showtime.textContent = `${min}:${sec < 10 ? "0" + sec : sec}`;
      if (sec <= 10 && min == 0) {
        document.getElementById("bar-time").style.backgroundColor = "red";
      }
    }
    remaning--;
  }, 1000);
}
