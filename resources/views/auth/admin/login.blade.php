
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Blog</title>
</head>
<body>
    <div class="row" style="margin-top:10%">
        <form style="margin:auto" class="col-3 border rounded " method="post" action="{{ route('login.admin') }}">
            @csrf
            <h2 class="text-primary">Login</h2>
            @if (Session::has('message'))
                <div class="alert alert-danger">
                        <h4>{{ Session::get('message') }}</h4>
                </div>
            @endif
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" id="form2Example1" class="form-control" name="email" />
            </div>

            <div class="form-outline">
                <label class="form-label">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" />
            </div>
            <br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
            <br>
            <a href="{{ route('register.admin.form') }}">Register</a><br><br>
        </form>
    </div>
    
</body>
</html>