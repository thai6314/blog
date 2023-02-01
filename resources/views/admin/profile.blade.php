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
                <div class="col-2"></div>
                <div class="col-6 border rounded">
                    <h2>Profile</h2>
                    <div class="row"style="margin-top: 30px; width: 100%">
                        <div ><label class="form-label">Email</label></div>
                        <div class="col-6">
                            <span>{{ Auth::user()->email }} </span>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-2 border-right">
                            <label class="form-label">First name</label>
                        </div>
                        <div class="col-6">
                            <span>{{ Auth::user()->first_name }} </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 border-right">
                            <label class="form-label">Last name</label>
                        </div>
                        <div class="col-6">
                            <span>{{ Auth::user()->last_name }} </span>
                        </div>
                    </div>
                    <br>
                    <div class="row ">
                        <div class="col-2 border-right">
                            <label class="form-label">Gender</label>
                        </div>
                        <div class="col-6">
                            @if(Auth::user()->gender == '1')
                                <span>Male </span>
                            @elseif(Auth::user()->gender == '2')
                                <span>Female </span>
                            @else <span>Other </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 border-right">
                            <label class="form-label">Birth day</label>
                        </div>
                        <div class="col-6">
                            @if(isset(Auth::user()->birth_day))
                                <span>{{ Auth::user()->birth_day }} </span>
                            @else <span> </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 border-right">
                            <label class="form-label">Address</label>
                        </div>
                        <div class="col-6">
                            <span>{{ Auth::user()->address }} </span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-2 border-right">
                            <label class="form-label">Avatar</label>
                        </div>
                        <div class="col-6">
                            @if( isset(Auth::user()->avatar ))
                                <img class="img-fluid" src="{{ Auth::user()->avatar }}"
                                    width="50%"
                                >
                            @else <span> </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <a href="{{ route('edit.form.admin') }}" class="btn btn-dark" role="button" aria-pressed="true">Edit</a>
                    <br>
                </div>
            </div>
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
