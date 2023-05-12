(function(){

      // Get the carousel element and add a click event listener
      const carousel = document.querySelector("#quizCarousel");
      
      async function getActiveCarousel(){
        // carousel.addEventListener('click', function() {

          // Find the active carousel item
        let activeItem = carousel.querySelector('.carousel-item.active');
            
        // Get the value of a question within the active item
        let question = document.querySelector('.carousel-item.active .question').innerText;
        // console.log(question);
        let options = document.querySelectorAll('.carousel-item.active .btn');            
        let selectedOption;
        // let data= [];
        let questionId = document.querySelector('.carousel-item.active .questionId').innerText;
        // let playerId = document.querySelector('.carousel-item.active .playerId').innerText;

        /*** timer ***/
        const timer = document.querySelector('.carousel-item.active .timer');
        // const time1 = document.querySelector('.carousel-item.active .timer :nth-child(1)').innerText;
        // const time2 = document.querySelector('.carousel-item.active .timer :nth-child(2)').innerText;
        // const time3 = document.querySelector('.carousel-item.active .timer :nth-child(3)').innerText;

    
          // let startingMinute = 1;
          let time = 10; //time is in seconds
          const countdown = setInterval(updateCountdown, 1000);
          function updateCountdown(){
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;
            seconds <= 5 ? timer.style.color = "red" : timer.style.color = "white"
            minutes = minutes < 10 ? '0'+minutes : minutes;
            seconds = seconds < 10 ? '0'+seconds : seconds;
            timer.innerHTML = `${minutes} : ${seconds}`;
            time--;
            if(time < 0){
              options.forEach(option => option.disabled=true);
              clearInterval(countdown);
            }
          }

          options.forEach(option => {
            option.addEventListener('click', event => {
              // console.log("Player Id: "+playerId);
              console.log(question);
              console.log("Question Id: "+questionId);
              // data.push(question);
              // data.push(questionId);

              // console.log(event.target.innerText); // logs the clicked button element
              selectedOption = event.target.innerText; // accessing the clicked option and assigning it to selectedOption

              console.log(selectedOption);
              // data.push(selectedOption);
              // console.log(data);
              console.log("Option Id: "+event.target.getAttribute('id'));
              options.forEach(option => {
                if(option !== event.target)
                  option.disabled = true;
              })
            // }); 
          });

        });
      }

      // Get the initial '.carousel-item'
      getActiveCarousel();
      
      const nextbtn = document.querySelector(".carousel-control-next");
      const prevbtn = document.querySelector(".carousel-control-prev");

      nextbtn.addEventListener("click", () => {
        setTimeout(getActiveCarousel, 1000);
      });
      prevbtn.addEventListener("click", () => {
        setTimeout(getActiveCarousel, 1000);
      });
    })();