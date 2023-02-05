<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script defer type="text/javascript" src="{{ asset('js/comment/comment.js') }}"></script>
    <link  href="{{ asset('css/post/detail.css') }}" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
<div class="nav">
    <div class="nav-img">
        <img src="https://media.wired.co.uk/photos/60c8730fa81eb7f50b44037e/3:2/w_3329,h_2219,c_limit/1521-WIRED-Cat.jpeg">
    </div>
    <div class="nav-item">
        <a href="#" >Search Post</a>
    </div>
    <div class="nav-item dropdown">
        <div class="nav-item_avatar">
            <img
                @if(Auth::user() !== null)
                    src="{{ Auth::user()->avatar }}"
                @endif
                class="rounded-circle"
                height="30"
                loading="lazy"
                style="margin-left: 60%"
            />
            @if(Auth::user() !== null)
                <span style="font-size: 20px">{{ Auth::user()->first_name . '.' . Auth::user()->last_name }}</span>
            @endif
        </div>
        <div class="nav-item_dropdown">
            <a href="{{ route('profile.user') }}">Profile</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>

    </div>
</div>
<div class="menu">
    <div class="menu-items">
        @foreach($categories as $category)
            <a class="menu-item" href="{{ route('list.posts', ['category_id'=> $category->category_id]) }}">{{ $category->name }}</a>
        @endforeach
    </div>
</div>
    <div class="content">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 border rounded">
                <h2 style="color:darksalmon">Profile</h2>
                <div class="row"style="margin-top: 30px">
                    <div class="col-3 "><label class="form-label">Email</label></div>
                    <div class="col-6">
                        <span>{{ Auth::user()->email }} </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 border-right">
                        <label class="form-label">First name</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->first_name }} </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 border-right">
                        <label class="form-label">Last name</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->last_name }} </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 border-right">
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
                <div class="row">
                    <div class="col-3 border-right">
                        <label class="form-label">Birth day</label>
                    </div>
                    <div class="col-6">
                        @if(isset(Auth::user()->birth_day))
                            <span>{{ Auth::user()->birth_day }} </span>
                        @else <span> </span>
                        @endif
                    </div>
                </div>
                <div class="row ">
                    <div class="col-3 border-right">
                        <label class="form-label">Address</label>
                    </div>
                    <div class="col-6">
                        <span>{{ Auth::user()->address }} </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 border-right">
                        <label class="form-label">Avatar</label>
                    </div>
                    <div class="col-6">
                        @if( isset(Auth::user()->avatar ))
                            <img class="img-fluid" src="{{ Auth::user()->avatar }}" >
                        @else <span> </span>
                        @endif
                    </div>
                </div>
                <a href="{{ route('edit.form.user') }}" class="btn btn-dark" role="button" aria-pressed="true">Edit</a>
                <br>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
            document.getElementById('customFile').addEventListener('change', (e) => {
                console.log(e.target.files[0]);
                avatar.src = URL.createObjectURL(e.target.files[0]);
            })

            function preview() {
                console.log(event.target.files[0]);
                avatar.src = URL.createObjectURL(event.target.files[0]);
            }

            function clearImage() {
                document.getElementById('customFile').value = null;
                avatar.src = "";
            }
        </script>
    </div>
</body>
</html>
