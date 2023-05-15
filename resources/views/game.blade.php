<!doctype html>
<html lang="en">
  <head>
    <title>Game</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/game.css')}}">

  </head>
  <body>
    
    <div id="quizCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
      <div class="carousel-inner">
        @foreach ($result as $index => $field)
        @php $active = ($index == 0) ? 'active' : ''; @endphp
        <div class="carousel-item {{ $active }}" >
                    <div class="wrapper">
                      <div class="timer"> 00:00
                          {{-- <button class="time1">1:00</button>
                          <button class="time2">00:45</button>
                          <button class="time3">00:30</button> --}}
                      </div>
                        {{-- <div class="wrapper" style=" width:80vw"> --}}
                          <h3 class="question">{{ $field->question }}</h3> <br/>
                          <h3 class="questionId" style="display:none";>{{ $field->questionId }}</h3> <br/>
                          <h3 class="playerId" style="display:none";>{{ $playerId }}</h3> <br/>
                          
                          @php
                              $option = $field->options;
                              $options = substr($option, 1, -1);
                              $options = explode("," , $options);
                              $optionId = 1;
                              echo "<div class=\"options\">";
                                foreach ($options as $option) {
                                  echo "<button id=\"$optionId\" class=\"btn btn-block btn-light option\" >".$option."</button>"."<br>";
                                  $optionId++;
                                }
                              echo "</div>";
                            @endphp
                        {{-- </div> --}}
                    </div>
  
            </div>
        @endforeach
          </div>
      <a class="carousel-control-prev" href="#quizCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#quizCarousel" role="button" data-slide="next">
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
    
    <script src="{{asset('js/game.js')}}" defer></script>
  
  </body>
</html>