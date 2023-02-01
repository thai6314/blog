<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link  href="{{ asset('css/post/list_post.css') }}" rel="stylesheet">
    <title>Blog</title>
</head>
<body>
<div class="menu">
    <ul class="menu-items">
        <li class="menu-item"><a class="menu-item-link" href="{{ route('profile.admin') }}">Profile</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('list.category') }}">Categories</a></li>
        <li class="menu-item" style="background-color: darksalmon"><a class="menu-item-link" href="{{ route('list.post') }}">Posts</a></li>
        <li class="menu-item"><a class="menu-item-link" href="#">Comment</a></li>
        <li class="menu-item"><a class="menu-item-link" href="{{ route('logout') }}">Logout</a></li>
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
    <div class="container-lg" style="margin-top: 5%">
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('add.post') }}">
                @csrf
                <h2 style="margin-left: 0">Add Post</h2>
                <div class="form-outline">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" />
                    @if ($errors->has('title'))
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>
                <div class="form-outline">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3" name="content"></textarea>
                    </div>
                </div>

                <div class="form-outline">
                    <label class="form-label" for="customFile">Photo</label>
                    <img src="" alt="" id="photo" class="img-fluid">
                    <input type="file" class="form-control" id="customFile" name="photo" />
                </div>
                <br>
                <div class="form-outline ">
                    <label class="form-label" for="customFile">Category</label>
                    <br>
                    <select class="form-select form-select-sm" name="category_id" aria-label=".form-select-sm example">
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id}}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Add</button>

            </form>
        </div>
    </div>
</div>
</body>
</html>
