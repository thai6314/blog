@extends('index')
@section('main')
    <div class="container" style="margin-top: 30px">
        <h2>List Post</h2><a href="{{ route('add.post') }}" class="btn btn-primary">New Post</a><br><br>

        @foreach($posts as $post)
            <div class="card-sm">
                <img src="{{ $post->photo }}" class="card-img-top" style="width: 30%; height: 10%"/>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <a href="{{ route('update.post.form', ['id'=>$post->post_id]) }}" class="btn btn-primary">Update</a>
                    <a href="{{ route('delete.post', ['id'=>$post->post_id]) }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
