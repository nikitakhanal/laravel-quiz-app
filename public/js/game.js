(function () {
  // Get the carousel element and add a click event listener
  const carousel = document.querySelector("#quizCarousel");
  const nextbtn = document.querySelector(".carousel-control-next");

  const totalQuestions = document.querySelectorAll(".carousel-item").length;
  let currentQuestion = 1;

  async function getActiveCarousel() {
      // carousel.addEventListener('click', function() {

      // Find the active carousel item
      let activeItem = carousel.querySelector(".carousel-item.active");

      // Get the value of a question within the active item
      let question = document.querySelector(
          ".carousel-item.active .question"
      ).innerText;
      // console.log(question);
      let options = document.querySelectorAll(".carousel-item.active .btn");
      let selectedOption;
      // let data= [];
      let questionId = document.querySelector(
          ".carousel-item.active .questionId"
      ).innerText;
      let playerId = document.querySelector(
          ".carousel-item.active .playerId"
      ).innerText;

      /*** timer ***/
      const timer = document.querySelector(".carousel-item.active .timer");
      // const time1 = document.querySelector('.carousel-item.active .timer :nth-child(1)').innerText;
      // const time2 = document.querySelector('.carousel-item.active .timer :nth-child(2)').innerText;
      // const time3 = document.querySelector('.carousel-item.active .timer :nth-child(3)').innerText;

      // let startingMinute = 1;
      let time = 10; //time is in seconds
      const countdown = setInterval(updateCountdown, 1000);
      function updateCountdown() {
          let minutes = Math.floor(time / 60);
          let seconds = time % 60;
          seconds <= 5
              ? (timer.style.color = "red")
              : (timer.style.color = "white");
          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;
          timer.innerHTML = `${minutes} : ${seconds}`;
          time--;
          if (time < 0) {
              options.forEach((option) => (option.disabled = true));
              clearInterval(countdown);
          }
      }

      options.forEach((option) => {
          option.addEventListener("click", (event) => {
              selectedOption = event.target.innerText; // accessing the clicked option and assigning it to selectedOption

              postData(playerId, questionId, selectedOption);

              options.forEach((option) => {
                  if (option !== event.target) option.disabled = true;
              });

              nextbtn.click();
          });
      });
  }

  // Get the initial '.carousel-item'
  getActiveCarousel();

  nextbtn.addEventListener("click", () => {
      currentQuestion++;
      if (currentQuestion > totalQuestions) {
          console.log("showResult");
          nextbtn.classList.add("d-none");
          showResult();
          return;
      }
      setTimeout(getActiveCarousel, 1000);
  });
})();

async function postData(playerId, questionId, selectedOption) {
  // Only post the data if it's not posted.

  let csrfToken = document.head
      .querySelector('meta[name="csrf-token"]')
      .getAttribute("content");
  const data = { playerId, questionId, selectedOption };
  const res = await fetch("/game/store", {
      method: "POST",
      body: JSON.stringify(data),
      headers: {
          "content-type": "application/json",
          "X-CSRF-Token": csrfToken,
      },
      credentials: "same-origin",
  });

  await res.text();
}

let score = 0;
async function showResult() {
  const res = await fetch("/result");

  const result = await res.json();
  console.log(result);
  
  // Create a map of correct options for easier access
  const correctOptionsMap = new Map();
  result.correct.forEach(correctOption => {
    correctOptionsMap.set(correctOption.questionId, correctOption.option);
  });

  
  
  // Iterate over selected options and match them with the correct options
  result.selected.forEach(selectedOption => {
    const questionId = selectedOption.questionId;
    const selectedOptionValue = selectedOption.selectedOption;
    
    if (correctOptionsMap.has(questionId)) {
      const correctOptionValue = correctOptionsMap.get(questionId);
  
      if (selectedOptionValue === correctOptionValue) {
        score++;
        console.log(`Question ${questionId}: Selected option "${selectedOptionValue}" is correct.`);
      } else {
        console.log(`Question ${questionId}: Selected option "${selectedOptionValue}" is incorrect. The correct option is "${correctOptionValue}".`);
      }
    } else {
      console.log(`you missed this question`);
    }
  });
  const scoreElement = document.getElementById("score");
  // scoreElement.style.backgroundColor = "red"; 
  scoreElement.innerHTML= `your score is ${score}.`;
  
}
