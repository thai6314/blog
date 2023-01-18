@extends('index')
@section('main')
    <div class="container-lg" style="margin-top: 30px">
        <div class="row">
            <div class="col-3"></div>
            <form class="col-6 border rounded" method="post" action="{{ route('add.post') }}">
                @csrf
                <h2 class="text-primary">Add Post</h2>
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
@endsection
