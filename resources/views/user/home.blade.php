<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link  href="{{ asset('css/user/home.css') }}" rel="stylesheet">
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
        <div class="nav-item">
            <a href="{{ route('login.user.form') }}">Login</a>
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
        <div class="page-title">
            <h2>Featured posts of the day</h2>
        </div>
        <div class="group-posts">
            @foreach($posts as $post)
                <div class="group-post">
                    <div class="group-post_image">
                        <img class="image" src="{{ $post->photo }}">
                    </div>
                    <div class="group-post_info">
                        <a href="{{ route('detail.post', ['id'=>$post->post_id]) }}" class="txt-title">{{ $post->title }}</a>
                        <p class="txt-content">{{ $post->content }}</p>
                        <p class="time">{{ $post->created_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>
</html>
