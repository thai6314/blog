<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="{{ asset('css/admin/profile.css') }}" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
<div class="menu">
    <ul class="menu-items">
        <li class="menu-item"><a href="{{ route('profile.admin') }}">Profile</a></li>
        <li class="menu-item"><a href="{{ route('list.category') }}">Categories</a></li>
        <li class="menu-item"><a href="{{ route('list.post') }}">Posts</a></li>
        <li class="menu-item"><a href="#">Comment</a></li>
        <li class="menu-item"><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
</div>
<div class="nav-content">
    <div class="nav">
        <ul class="nav-items">
            <li class="nav-item">
                <img
                    @if(Auth::user() !== null)
                        src="{{ Auth::user()->avatar }}"
                    @endif
                    class="rounded-circle"
                    height="30"
                    loading="lazy"
                />
            </li>
            <li class="nav-item">
                @if(Auth::user() !== null)
                    <span style="font-size: 20px">{{ Auth::user()->first_name . '.' . Auth::user()->last_name }}</span>
                @endif
            </li>
        </ul>
    </div>
<div class="content">
    <div class="row">
        <div class="col-3"></div>
        <form class="col-6 border rounded" method="post" action="{{ route('edit.profile') }}">
            @csrf
            <h2 style="color: darksalmon">Edit profile</h2>
            <div class="form-outline">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}"/>
                @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="form-outline">
                <label class="form-label">First name</label>
                <input type="text"  class="form-control" name="first_name" value="{{ Auth::user()->first_name }}"/>
                @if ($errors->has('first_name'))
                <p class="text-danger">{{ $errors->first('first_name') }}</p>
                @endif
            </div>
            <div class="form-outline">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control" name="last_name" value="{{ Auth::user()->last_name }}"/>
                @if ($errors->has('last_name'))
                <p class="text-danger">{{ $errors->first('last_name') }}</p>
                @endif
            </div>
            <div class="form-outline">
                <label class="form-label">Birth day</label>
                <input type="date" class="form-control" name="birth_day" placeholder="dd-mm-yyyy"  min="1930-01-01" value="{{ Auth::user()->birth_day }}">
                 @if ($errors->has('birth_day'))
                <p class="text-danger">{{ $errors->first('birth_day') }}</p>
                @endif
            </div>
            <div class="form-outline">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    @if (Auth::user()->gender == '1')
                        <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1" value ="1"checked>
                        @else <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault1" >
                    @endif
                    <label class="form-check-label" for="flexRadioDefault1">
                        Male
                    </label>
                </div>
                <div class="form-check">
                    @if (Auth::user()->gender == '2')
                        <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2" value="2" checked>
                        @else <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault2" >
                    @endif
                    <label class="form-check-label" for="flexRadioDefault2">
                        Female
                    </label>
                </div>
                <div class="form-check">
                    @if (Auth::user()->gender == '3')
                        <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault3" value="3" checked>
                        @else <input class="form-check-input" name="gender" type="radio" id="flexRadioDefault3" >
                    @endif
                    <label class="form-check-label" for="flexRadioDefault2">
                        Other
                    </label>
                </div>
            </div>
            <div class="form-outline">
                <div class="form-group">
                    <label for="exampleFormControlTextarea3">Address</label>
                    <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"name="address">{{ Auth::user()->address }}</textarea>
                </div>
            </div>

            <div class="form-outline">
                <label class="form-label" for="customFile">Avatar</label>
                <br>
                <img src="{{ Auth::user()->avatar }}" alt="" id="avatar" class="img-fluid"
                    width="50%"
                >
                <br><br>
                <input type="file" class="form-control" id="customFile" name="avatar"/>

            </div><br>
            <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>
            <br>
        </form>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        document.getElementById('customFile').addEventListener('change', (e) => {
            avatar.src = URL.createObjectURL(e.target.files[0]);
        });

        function preview() {
            console.log(event.target.files[0]);
            avatar.src = URL.createObjectURL(event.target.files[0]);
        }

        function clearImage() {
            document.getElementById('customFile').value = null;
            avatar.src = "";
        }
    </script>
</body>
</html>
