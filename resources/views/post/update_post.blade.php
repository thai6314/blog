@extends('index')
@section('main')
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('update.post') }}">
                @csrf
                <h2 class="text-primary">Update Post</h2>
                <div class="form-outline">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" name="post_id" value="{{ $post->post_id }}" readonly/>
                </div>
                <div class="form-outline">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}"/>
                    @if ($errors->has('title'))
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @endif
                </div>

                <div class="form-outline">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea3">content</label>
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="3"
                                  name="content">{{ $post->content }}</textarea>
                    </div>
                </div>

                <div class="form-outline">
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
@endsection
