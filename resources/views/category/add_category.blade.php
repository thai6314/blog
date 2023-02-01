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
    <div class="content" >
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('add.category') }}">
                @csrf
                <h2 >Add Category</h2>
                <div class="form-outline">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" />
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>

            </form>
        </div>
    </div>
</div>
</body>
</html>
