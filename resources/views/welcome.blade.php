<!doctype html>
<html lang="en">
  <head>
    <title>Welcome</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user">
    Play
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="userLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="userLabel">Play</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            {{-- form starts --}}
          <form action="{{URL('player')}}" class="userForm" method="POST">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="username">Username: </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="username" id="username">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Start</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </form>
        </div>
      </div>
    </div>
  </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        // (
        //     function(){
        //         const form = document.querySelector(".userForm");
        //         const name = document.querySelector('[name="username"]');
        //         const token = document.querySelector('[name="_token"]');

        //         form.addEventListener("submit", async function(e){
        //             e.preventDefault();

        //             const res = await fetch("/player", {
        //                 method: "POST",
        //                 headers: {
        //                     "content-type" : "application/json",
        //                     "X-CSRF-Token": token.value
        //                 },
        //                 credentials: "same-origin",
        //                 body: JSON.stringify({
        //                     name: name.value
        //                 })
        //             });
        //             const data = await res.text();
        //             document.location.href = data;
        //         })
        //     }
        // )();
    </script>

</body>
</html>