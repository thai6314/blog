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
    <div class="row" style="margin-top:  5%">
        <div class="row">
            <div class="col-4"></div>
            <form class="col-4 border rounded" method="post" action="{{ route('register.admin') }}">
                @csrf
                <h2 class="text-primary">Register</h2>
                <div class="form-outline">
                    <label class="form-label">Email</label>
                    <input type="email" id="form2Example1" class="form-control" name="email" />
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="form-outline">
                    <label class="form-label">Password</label>
                    <input type="password" id="form2Example2" class="form-control" name="password" />
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">Confirm password</label>
                    <input type="password" id="form2Example2" class="form-control" name="confirm_password" />
                    @if ($errors->has('confirm_password'))
                        <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">First name</label>
                    <input type="text" id="form2Example1" class="form-control" name="first_name" />
                    @if ($errors->has('first_name'))
                        <p class="text-danger">{{ $errors->first('first_name') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">Last name</label>
                    <input type="text" id="form2Example1" class="form-control" name="last_name" />
                    @if ($errors->has('last_name'))
                        <p class="text-danger">{{ $errors->first('last_name') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault1" name="gender" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault2" name="gender" checked value="2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="flexRadioDefault3" name="gender" value="3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            Other
                        </label>
                    </div>
                </div>
                <div class="form-outline">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" name="address"></textarea>
                    @if ($errors->has('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
                <br>
                <a href="{{ route('login.admin.form') }}">Login</a>
            </form>
        </div>
    </div>
</body>
</html>
