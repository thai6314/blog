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
<div class="container border rounded p-4" style="margin-top: 30px">
        <div class="d-flex border rounded" id="post">
            <div class="col-4">
                <img src="{{ $post->photo }}" class="img-fluid"/>
            </div>
            <div class="col-8 ms-2">
                <a href="{{ route('detail.post', ['id'=>$post->post_id]) }}">
                    <h5 class="card-title">{{ $post->title }}</h5></a>
                <p class="card-text pe-2" style="max-width: 800px">{{ $post->content }}</p>
            </div>
        </div>
        <div id="list-comment" ></div>
        <br>
        <div >
            <div class="col">
                <input type="text" id="txtComment" class="form-control " style="height: 70px" name="comment" required
                       placeholder="Enter comment..."/>
                @if ($errors->has('comment'))
                    <p class="text-danger">{{ $errors->first('comment') }}</p>
                @endif
            </div>
            <button id="btnComment" class="btn btn-primary w-100 mt-2">Comment</button>
        </div>
        <input type="hidden" id="post_id" value="{{ $post->post_id }}">
        <input type="hidden" id="user_id" value="{{ Auth::user()->user_id}}">
</div>
@include('layouts.footer')
</body>
</html>
