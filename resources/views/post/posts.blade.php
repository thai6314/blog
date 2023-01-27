<div class="container" style="margin-top: 30px">
    @foreach($categories as $category)
        @if($category->category_id == $posts[0]->category_id)
            <h2>{{ $category->name }}</h2>
        @endif
    @endforeach
    @foreach($posts as $post)
        <div class="border rounded">
            <div class="row">
                <div class="col-4"style="width: 30%; height: 10%;">
                    <img src="{{ $post->photo }}" class="card-img-top" />
                </div>
                <div class="col-4">
                    <a href="{{ route('detail.post', ['id'=>$post->post_id]) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div><br>
        </div>
    @endforeach
</div>
