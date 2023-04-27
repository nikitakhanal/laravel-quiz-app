<!doctype html>
<html lang="en">
  <head>
    <title>Game</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
      .container{
        position: absolute;
        top:25%;
        left:25%;
      }
    </style>

  </head>
  <body>
    <div id="quizCarousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach ($result as $index => $field)
        @php $active = ($index == 0) ? 'active' : ''; @endphp
        <div class="carousel-item {{ $active }}">
                    <div style="background:rgb(59, 59, 110); color:white; height: 80vh;">
                        <div class="container" style=" width:80vw">
                          <h3 class="question">{{ $field->question }}</h3> <br/>
                          <h3 class="questionId" style="display:none";>{{ $field->questionId }}</h3> <br/>
                          @php
                            $option = $field->options;
                            $options = substr($option, 1, -1);
                            $options = explode("," , $options);
                            $optionId = 1;
                              foreach ($options as $option) {
                                echo "<button id=\"$optionId\" class=\"btn btn-block btn-light \" style=\"width: 60% \">".$option."</button>"."<br>";
                                $optionId++;
                              }
                          @endphp
                        </div>
                    </div>
  
            </div>
        @endforeach
          </div>
      <a class="carousel-control-prev" href="#quiz" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#quiz" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    

  

    {{-- <div class="container">
        @foreach($result as $result=>$field)
      <h3>{{$field->Question}}</h3>
      @php
        $option = $field->Options;
        $options = substr($option, 1, -1);
        $options = explode("," , $options);
          foreach ($options as $option) {
            echo "<button class=\"btn btn-block btn-light \" style=\"width: 60% \">".$option."</button>"."<br>";
          }
      @endphp
    @endforeach
    
    </div> --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script>

      (function(){

          // Get the carousel element and add a click event listener
          const carousel = document.querySelector('#quizCarousel');
          carousel.addEventListener('click', function() {

            // Find the active carousel item
            let activeItem = carousel.querySelector('.carousel-item.active');

            // Get the value of a question within the active item
            let question = activeItem.querySelector('.question').innerText;
            let options = activeItem.querySelectorAll('.btn');
            let selectedOption;

            let questionId = activeItem.querySelector('.questionId').innerText;
            
              options.forEach(option => {
                option.addEventListener('click', event => {
                  console.log(question);
                  console.log("Question Id: "+questionId);
                  // console.log(event.target.innerText); // logs the clicked button element
                  selectedOption = event.target.innerText;
                  console.log(selectedOption);
                  console.log("Option Id: "+event.target.getAttribute('id'));
                  options.forEach(option => {
                    if(option !== event.target)
                      option.disabled = true;
                  })
                }); 
              });

          });
        })();
    </script>
  
  </body>
</html>