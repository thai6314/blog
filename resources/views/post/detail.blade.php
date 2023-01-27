<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="{{ asset('js/comment/comment.js')}}"></script>
    <title>Blog</title>
</head>
<body>
@include('category.categories')
<div class="container" style="margin-top: 30px">
    <div class="border rounded">
        <div class="row" id="post">
            <div class="col-4">
                <img src="{{ $post->photo }}" class="img-fluid"/>
            </div>
            <div class="col-4">
                <a href="{{ route('detail.post', ['id'=>$post->post_id]) }}"><h5
                        class="card-title">{{ $post->title }}</h5></a>
                <p class="card-text">{{ $post->content }}</p>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <input type="text" id="form2Example1" class="form-control" name="comment"
                       placeholder="Enter comment..."/>
                @if ($errors->has('comment'))
                    <p class="text-danger">{{ $errors->first('comment') }}</p>
                @endif
            </div>
            <button id="btnComment" class="btn btn-secondary">Comment</button>
        </div>
    </div>
    <br><br>
</div>
</body>
</html>
