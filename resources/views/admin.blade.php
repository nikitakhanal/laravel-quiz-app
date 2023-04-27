<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        body{
            height: 100vh;
            display: flex;  
            flex-direction: column;
            align-items: center;
            justify-content: center;
            /* background-color:rgb(217, 217, 234); */
        }
        .container{
            max-width: 60%;
            background-color: rgb(238, 238, 250); 
            border-radius: 1rem;
            padding: 2rem 4rem;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <div class="container">
        <form method="POST" action="{{route('adminLogin')}}">
          @csrf
            <h2 class="text-center">Admin Login</h2>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary"><a style="color:white; text-decoration:none;">Submit</a></button>

            {{-- <a name="submit" id="submit" class="btn btn-primary" href="{{route('adminLogin')}}" role="button" style="color:white; text-decoration:none">Submit</a> --}}
          </form>
    </div>
    
  </body>
</html>