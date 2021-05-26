<!DOCTYPE html>
<html lang="vi">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="container">
            <form action="{{ URL::to('api\messages') }}" method="post" id="testForm">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="exampleInputEmail1">Nội dung tin nhắn</label>
                  <input type="text" class="form-control" name="type" value="text" hidden>
                  <input type="text" class="form-control" name="room_id" value="12" hidden>
                  <input type="text" class="form-control" id="messageInput" name="message" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js" integrity="sha512-q/dWJ3kcmjBLU4Qc47E4A9kTB4m3wuTY7vkFJDTZKjTs8jhyGQnaUrxa0Ytd0ssMZhbNua9hE+E7Qv1j+DyZwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var socket = io('http://localhost:6001');
            socket.on('chat:message', data => {
                console.log(data);
            });

        </script>
    </body>
</html>
