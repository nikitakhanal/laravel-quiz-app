<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  </head>
  <body>

    <nav class="nav justify-content-end bg-body-tertiary mb-2">
      <a class="nav-link" href="admin">Home</a>
      <a class="nav-link" href="logout">Logout</a>
    </nav>

      <div class="container">
        <h1>Welcome {{session('email')}}</h1>
        {{-- {{$message1}} --}}

      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Question</th>
            <th>Difficulty</th>
          </tr>
        </thead>
        <tbody>
            @foreach($question as $question)
          <tr>
            <td scope="row">{{$question->id}}</td>
            <td>{{$question->question}}</td>
            <td>{{$question->difficulty}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Add <i class="fa fa-plus fa-lg"></i> 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Questions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        {{-- form starts here --}}
        <form action="{{URL('/questions')}}" name="question-form" method="POST">
          @csrf
          <div class="form-group">
            <label for="question">Question </label>
            <input class="form-control" type="text" name="question" id="question" placeholder="add question here">
          </div>

          <div class="form-group">
            <label for="correct-answer">Correct Answer </label>
            <input class="form-control" type="text" name="correct-answer" id="correct-answer" placeholder="option 1">
          </div>
          <div class="form-group">
            <label for="answer2">Option 2 </label>
            <input class="form-control" type="text" name="answer2" id="answer2" placeholder="option 2">
          </div>
          <div class="form-group">
            <label for="answer3">Option 3 </label>
            <input class="form-control" type="text" name="answer3" id="answer3" placeholder="option 3">
          </div>
          <div class="form-group">
            <label for="answer4">Option 4 </label>
            <input class="form-control" type="text" name="answer4" id="answer4" placeholder="option 4">
          </div>


          <div class="form-group">
            <label for="difficulty">Difficulty</label>
            <input type="range" name="difficulty" id="difficulty" min="1" max="5" step="1" value="1">
          </div>


          {{-- <div class="form-group">
            <label for="exampleFormControlSelect1">Answers</label>
            <select name="answer" class="form-control" id="answer">
              <option id="answer1" value="">Answer1</option>
              <option id="answer2" value="">Answer2</option>
              <option id="answer3" value="">Answer3</option>
              <option id="answer4" value="">Answer4</option>
            </select>
          </div> --}}
        {{-- </form> --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
      </div>
    </div>
  </div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
  </body>  
</html>