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
    <div class="content" >
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('update.post') }}">
                @csrf
                <h2 style="margin:10px 0 0 0">Update Post</h2>
                <div class="form-outline" hidden>
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" name="post_id" value="{{ $post->post_id }}" readonly/>
                </div>
                <div class="form-outline mt-2">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
                    @if ($errors->has('title'))
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="form-outline mt-2">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3">Content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"
                                  name="content">{{ $post->content }}</textarea>
                    </div>
                </div>

                <div class="form-outline mt-2">
                    <label class="form-label" for="customFile">Photo</label>
                    <input type="file" class="form-control" id="customFile" name="photo"/><br>
                    <img src="{{ $post->photo }}" alt="" id="photo" class="img-fluid"
                         style="width: 300px; height: 180px">
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-block mb-4">Save</button>

            </form>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>
