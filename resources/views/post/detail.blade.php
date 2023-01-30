<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script defer type="text/javascript" src="{{ asset('js/comment/comment.js') }}"></script>

    <title>Blog</title>
</head>
<body>
@include('category.categories')
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
</body>
</html>
